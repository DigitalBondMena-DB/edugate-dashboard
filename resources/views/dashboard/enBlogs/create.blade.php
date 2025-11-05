@extends('dashboard.layouts.master')

@php $pageTitle = 'Add Article'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header card-header-primary">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('enBlog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Titles --}}
                        <div class="row">
                                <label class="form-label fw-bold">Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" placeholder="Enter Title">
                                <div class="form-text"><span id="title_count">0</span> chars</div>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>


                        {{-- Texts --}}
                        <div class="row  mt-3">

                            <label class="form-label fw-bold">Text</label>
                            <textarea name="text" id="text" class="form-control ckeditor @error('text') is-invalid @enderror"
                                rows="6" placeholder="Article Text">{{ old('text') }}</textarea>
                            @error('text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Meta  --}}
                        <div class="row  mt-4">
                                <label class="form-label fw-bold">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title"
                                    class="form-control @error('meta_title') is-invalid @enderror"
                                    value="{{ old('meta_title') }}" placeholder="Meta Title">
                                <div class="form-text"><span id="meta_title_count">0</span> chars</div>
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="row mt-3">
                                <label class="form-label fw-bold">Meta Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="meta_description" id="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                                    rows="3" placeholder="Meta description in Arabic" required>{{ old('meta_description') }}</textarea>
                                <div class="form-text"><span id="meta_description_count">0</span> chars</div>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        {{-- Scripts --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Article Script 1</label>
                                <textarea name="script_1" id="script_1" class="form-control @error('script_1') is-invalid @enderror"
                                    rows="3" placeholder="Blog script in Arabic">{{ old('script_1') }}</textarea>
                                @error('script_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Article Script 2</label>
                                <textarea name="script_2" id="script_2"
                                    class="form-control @error('script_2') is-invalid @enderror" rows="3"
                                    placeholder="Blog second script in Arabic">{{ old('script_2') }}</textarea>
                                @error('script_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Schedule --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Publish Date</label>
                                <input type="date" name="schedule_date" id="schedule_date"
                                    class="form-control @error('schedule_date') is-invalid @enderror"
                                    value="{{ old('schedule_date') }}">
                                @error('schedule_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Publish Time</label>
                                <input type="time" name="schedule_time" id="schedule_time"
                                    class="form-control @error('schedule_time') is-invalid @enderror"
                                    value="{{ old('schedule_time') }}">
                                <div id="timeError" class="text-danger small mt-1" style="display:none;">Cannot select
                                    time before the current time</div>
                                @error('schedule_time')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Media --}}
                        <div class="row mt-3">
                                <label class="form-label fw-bold">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" accept="image/*"
                                    required>
                                <small class="text-muted d-block mt-1">Accepted: JPG, JPEG, PNG, WEBP</small>
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                        </div>

                        {{-- Category & Status --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Sub Category <span class="text-danger">*</span></label>
                                <select name="new_article_sub_catrgory_id"
                                    class="form-control @error('new_article_sub_catrgory_id') is-invalid @enderror"
                                    required>
                                    <option value="">Select a Category</option>
                                    @foreach ($categoreies as $category)
                                        @if($category->en_title == '' || $category->en_title == null)
                                        @continue
                                        @endif
                                        <option value="{{ $category->id }}" @selected(old('new_article_sub_catrgory_id') == $category->id)>
                                            {{ $category->en_title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('new_article_sub_catrgory_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror"
                                    required>
                                    <option value="">Select a Status</option>
                                    <option value="1" @selected(old('status') === '1')>Active</option>
                                    <option value="0" @selected(old('status') === '0')>Not Active</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="border-top pt-4 mt-4 d-flex justify-content-between align-items-center">
                            <a href="{{ route('enBlog.index') }}" class="btn btn-outline-secondary">
                                <span class="me-1">←</span> Back to Articles
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <span class="me-1">💾</span> Create Article
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Small helpers --}}
    @push('page_js')
        <script>
            // Char counters
            const counters = [
                ['title', 'title_count'],
                ['meta_title', 'meta_title_count'],
                ['meta_description', 'meta_description_count'],
            ];
            counters.forEach(([inputId, counterId]) => {
                const el = document.getElementById(inputId);
                const out = document.getElementById(counterId);
                if (el && out) {
                    const update = () => out.textContent = el.value.length;
                    el.addEventListener('input', update);
                    update();
                }
            });

            // Schedule defaults + validation
            function pad(n) {
                return n.toString().padStart(2, '0');
            }

            function today() {
                const d = new Date();
                return `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}`;
            }

            function nowHM() {
                const d = new Date();
                return `${pad(d.getHours())}:${pad(d.getMinutes())}`;
            }

            const dInput = document.getElementById('schedule_date');
            const tInput = document.getElementById('schedule_time');
            const tErr = document.getElementById('timeError');

            if (dInput && !dInput.value) {
                dInput.value = today();
                dInput.min = today();
            }
            if (tInput && !tInput.value) {
                tInput.value = nowHM();
            }

            function validateTime() {
                if (!dInput || !tInput) return;
                const sameDay = dInput.value === today();
                const invalid = sameDay && tInput.value < nowHM();
                tErr.style.display = invalid ? 'block' : 'none';
                if (invalid) tInput.value = nowHM();
            }
            dInput && dInput.addEventListener('change', validateTime);
            tInput && tInput.addEventListener('input', validateTime);
        </script>
    @endpush
@endsection
