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
                    <form action="{{ route('newArticle.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Slug (only for admin) --}}
                        @if(auth()->user()->role == 'super-admin' || auth()->user()->role == 'admin')
                        <div class="row">
                            <label class="form-label fw-bold">Slug</label>
                            <input type="text" name="ar_slug" id="ar_slug"
                                class="form-control @error('ar_slug') is-invalid @enderror"
                                value="{{ old('ar_slug') }}" placeholder="Enter Slug">
                            @error('ar_slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        {{-- Titles --}}
                        <div class="row mt-3">
                                <label class="form-label fw-bold">Title <span class="text-danger">*</span></label>
                                <input type="text" name="ar_title" id="ar_title"
                                    class="form-control @error('ar_title') is-invalid @enderror"
                                    value="{{ old('ar_title') }}" placeholder="Enter Title" required>
                                <div class="form-text"><span id="ar_title_count">0</span> chars</div>
                                @error('ar_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        {{-- Texts --}}
                        <div class="row mt-3">
                            <label class="form-label fw-bold">Text <span class="text-danger">*</span></label>
                            <textarea name="ar_text" id="ar_text" class="form-control ckeditor @error('ar_text') is-invalid @enderror"
                                rows="6" placeholder="Article Text" required>{{ old('ar_text') }}</textarea>
                            @error('ar_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Meta  --}}
                            <div class="row mt-3">
                                <label class="form-label fw-bold">Meta Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="ar_tag_title" id="ar_tag_title"
                                    class="form-control @error('ar_tag_title') is-invalid @enderror"
                                    value="{{ old('ar_tag_title') }}" placeholder="Meta Title" required>
                                <div class="form-text"><span id="ar_tag_title_count">0</span> chars</div>
                                @error('ar_tag_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="row mt-3">
                                <label class="form-label fw-bold">Meta Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="ar_tag_desc" id="ar_tag_desc" class="form-control @error('ar_tag_desc') is-invalid @enderror"
                                    rows="3" placeholder="Meta Description" required>{{ old('ar_tag_desc') }}</textarea>
                                <div class="form-text"><span id="ar_tag_desc_count">0</span> chars</div>
                                @error('ar_tag_desc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        {{-- Scripts --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Article Script 1</label>
                                <textarea name="blog_script" id="blog_script" class="form-control @error('blog_script') is-invalid @enderror"
                                    rows="3" placeholder="Blog script in Arabic">{{ old('blog_script') }}</textarea>
                                @error('blog_script')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Article Script 2</label>
                                <textarea name="blog_second_script" id="blog_second_script"
                                    class="form-control @error('blog_second_script') is-invalid @enderror" rows="3"
                                    placeholder="Blog second script in Arabic">{{ old('blog_second_script') }}</textarea>
                                @error('blog_second_script')
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
                                <input type="file" name="main_image" id="main_image"
                                    class="form-control @error('main_image') is-invalid @enderror" accept="image/*"
                                    required>
                                <small class="text-muted d-block mt-1">Accepted: JPG, JPEG, PNG, WEBP</small>
                                @error('main_image')
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
                                        <option value="{{ $category->id }}" @selected(old('new_article_sub_catrgory_id') == $category->id)>
                                            {{ $category->ar_title }}
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
                            <a href="{{ route('newArticle.index') }}" class="btn btn-outline-secondary">
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
                ['ar_title', 'ar_title_count'],
                ['ar_tag_title', 'ar_tag_title_count'],
                ['ar_tag_desc', 'ar_tag_desc_count'],
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
