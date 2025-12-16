(() => {
    const widget = document.querySelector('[data-flexible-search]');
    if (!widget) {
        return;
    }

    const endpoint = widget.dataset.endpoint;
    const statusEl = widget.querySelector('[data-search-status]');
    const searchButton = widget.querySelector('[data-search-submit]');
    const dropdowns = Array.from(widget.querySelectorAll('.smart-dropdown'));
    const facultyBlocks = Array.from(widget.querySelectorAll('[data-requires-faculty]'));

    const cache = new Map();
    const state = {
        destination: null,
        university: null,
        faculty: null,
        department: null,
        specialization: null,
    };

    const inputs = {
        destination: widget.querySelector('[data-selected="destination"]'),
        university: widget.querySelector('[data-selected="university"]'),
        faculty: widget.querySelector('[data-selected="faculty"]'),
        department: widget.querySelector('[data-selected="department"]'),
        specialization: widget.querySelector('[data-selected="specialization"]'),
    };

    document.addEventListener('click', (event) => {
        if (!widget.contains(event.target)) {
            closeDropdowns();
        }
    });

    dropdowns.forEach((dropdown) => {
        const trigger = dropdown.querySelector('[data-dropdown-trigger]');
        trigger?.addEventListener('click', async (event) => {
            event.preventDefault();
            event.stopPropagation();

            if (dropdown.dataset.disabled === 'true') {
                return;
            }

            const willOpen = !dropdown.classList.contains('open');
            closeDropdowns();

            if (willOpen) {
                try {
                    await fetchData();
                    dropdown.classList.add('open');
                } catch (error) {
                    // status element already shows the failure message
                }
            }
        });

        dropdown.querySelector('[data-dropdown-list]')?.addEventListener('click', (event) => {
            const button = event.target.closest('button[data-id]');
            if (!button) {
                return;
            }
            event.preventDefault();

            const type = dropdown.dataset.dropdown;
            const item = {
                id: Number(button.dataset.id),
                slug: button.dataset.slug || '',
                label: button.textContent.trim(),
                ar_name: button.dataset.arName || '',
                en_name: button.dataset.enName || '',
            };

            applySelection(type, item);
        });

        dropdown.querySelector('[data-dropdown-search]')?.addEventListener('input', (event) => {
            const term = event.target.value.toLowerCase();
            dropdown.querySelectorAll('button[data-id]').forEach((button) => {
                const label = button.textContent.toLowerCase();
                button.style.display = label.includes(term) ? 'block' : 'none';
            });
        });
    });

    searchButton?.addEventListener('click', () => {
        const target = state.faculty ?? state.university ?? state.destination;
        if (!target) {
            alert('يرجى اختيار بلد أو جامعة أو كلية أولاً');
            return;
        }

        const slugOrId = target.slug || target.id;
        if (!slugOrId) {
            alert('لا يمكن التوجيه بدون بيانات صحيحة.');
            return;
        }

        const path = state.faculty
            ? '/faculties/'
            : state.university
                ? '/universities/'
                : '/destinations/';

        window.location.href = `${path}${slugOrId}`;
    });

    function currentFilters() {
        return {
            destination_id: state.destination?.id ?? null,
            university_id: state.university?.id ?? null,
            faculty_id: state.faculty?.id ?? null,
        };
    }

    async function fetchData(force = false) {
        const key = JSON.stringify(currentFilters());

        if (!force && cache.has(key)) {
            render(cache.get(key), true);
            setStatus('✅ تم تحميل البيانات من الذاكرة.');
            return cache.get(key);
        }

        setStatus('⏳ جاري تحميل البيانات...');

        try {
            const response = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(currentFilters()),
            });

            if (!response.ok) {
                throw new Error('Request failed');
            }

            const data = await response.json();
            cache.set(key, data);
            render(data);
            setStatus('✅ تم تحميل البيانات');

            return data;
        } catch (error) {
            console.error(error);
            setStatus('⚠️ حدث خطأ أثناء التحميل');
            throw error;
        }
    }

    function render(payload, fromCache = false) {
        updateDropdown('destination', payload.destinations || []);
        updateDropdown('university', payload.universities || []);
        updateDropdown('faculty', payload.faculties || []);

        if (state.faculty) {
            updateDropdown('department', payload.departments || []);
            updateDropdown('specialization', payload.specializations || []);
        } else {
            clearDropdown('department', 'قم باختيار كلية أولاً.');
            clearDropdown('specialization', 'قم باختيار كلية أولاً.');
        }

        toggleAdvanced(Boolean(state.faculty));
        highlightSelections();

        if (!fromCache) {
            autoSelectRelated(payload);
        }
    }

    function updateDropdown(type, items) {
        const dropdown = widget.querySelector(`[data-dropdown="${type}"]`);
        if (!dropdown) {
            return;
        }

        const list = dropdown.querySelector('[data-dropdown-list]');
        list.innerHTML = '';

        if (!items.length) {
            const fallback = type === 'department' || type === 'specialization'
                ? 'قم باختيار كلية أولاً.'
                : 'لا توجد بيانات متاحة.';
            list.innerHTML = `<div class="text-muted small px-2 py-1">${fallback}</div>`;
            return;
        }

        items.forEach((item) => {
            const label = item.ar_name || item.en_name || item.label || '';
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'smart-dropdown__item';
            button.dataset.id = item.id;
            button.dataset.slug = item.slug || '';
            button.dataset.arName = item.ar_name || '';
            button.dataset.enName = item.en_name || '';
            button.setAttribute('role', 'option');
            button.textContent = label;
            list.appendChild(button);
        });
    }

    function clearDropdown(type, message) {
        const dropdown = widget.querySelector(`[data-dropdown="${type}"]`);
        if (!dropdown) {
            return;
        }
        const list = dropdown.querySelector('[data-dropdown-list]');
        list.innerHTML = `<div class="text-muted small px-2 py-1">${message}</div>`;
        dropdown.dataset.disabled = type === 'department' || type === 'specialization' ? 'true' : 'false';
    }

    function applySelection(type, item, shouldFetch = true, shouldClose = true) {
        const label = item.label || item.ar_name || item.en_name || '';
        const normalized = {
            id: Number(item.id),
            slug: item.slug || '',
            label,
        };

        state[type] = normalized;
        updateLabel(type, label);
        persistValue(type, normalized.id);

        if (type === 'destination') {
            resetSelections('university', 'faculty', 'department', 'specialization');
        } else if (type === 'university') {
            resetSelections('faculty', 'department', 'specialization');
        } else if (type === 'faculty') {
            resetSelections('department', 'specialization');
        } else if (type === 'department') {
            resetSelections('specialization');
        }

        highlightSelections();
        toggleAdvanced(Boolean(state.faculty));

        if (shouldClose) {
            closeDropdowns();
        }

        if (shouldFetch && ['destination', 'university', 'faculty'].includes(type)) {
            fetchData(true);
        }
    }

    function resetSelections(...types) {
        types.forEach((type) => {
            state[type] = null;
            persistValue(type, '');
            const dropdown = widget.querySelector(`[data-dropdown="${type}"]`);
            dropdown?.querySelector('[data-dropdown-label]')?.textContent = dropdown?.dataset?.placeholder || '';
        });
    }

    function updateLabel(type, label) {
        const dropdown = widget.querySelector(`[data-dropdown="${type}"]`);
        dropdown?.querySelector('[data-dropdown-label]')?.textContent = label || dropdown?.dataset?.placeholder || '';
    }

    function persistValue(type, value) {
        if (inputs[type]) {
            inputs[type].value = value ?? '';
        }
    }

    function toggleAdvanced(visible) {
        facultyBlocks.forEach((block) => block.classList.toggle('is-visible', visible));
        ['department', 'specialization'].forEach((type) => {
            const dropdown = widget.querySelector(`[data-dropdown="${type}"]`);
            if (dropdown) {
                dropdown.dataset.disabled = visible ? 'false' : 'true';
            }
        });
    }

    function highlightSelections() {
        dropdowns.forEach((dropdown) => {
            const type = dropdown.dataset.dropdown;
            dropdown.querySelectorAll('button[data-id]').forEach((button) => {
                const active = state[type]?.id === Number(button.dataset.id);
                button.classList.toggle('is-active', active);
            });
        });
    }

    function autoSelectRelated(payload) {
        if (!state.destination && (payload.destinations || []).length === 1) {
            applySelection('destination', payload.destinations[0], false, false);
        }

        if (!state.university && (payload.universities || []).length === 1) {
            applySelection('university', payload.universities[0], false, false);
        }
    }

    function closeDropdowns() {
        dropdowns.forEach((dropdown) => dropdown.classList.remove('open'));
    }

    function setStatus(message) {
        if (statusEl) {
            statusEl.textContent = message;
        }
    }
})();
