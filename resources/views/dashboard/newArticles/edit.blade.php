@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Article'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @if (Session::has('flash_message'))
                <div class="alert alert-success mb-3">{{ Session::get('flash_message') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header card-header-primary">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('newArticle.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- ================= Slug (only for admin) ================= --}}
                        @if(auth()->user()->role == 'super-admin' || auth()->user()->role == 'admin')
                        <div class="row">
                            <label class="form-label fw-bold">Slug</label>
                            <input type="text" name="ar_slug" id="ar_slug"
                                class="form-control @error('ar_slug') is-invalid @enderror"
                                value="{{ old('ar_slug', $row->ar_slug) }}" placeholder="Enter Slug">
                            @error('ar_slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        {{-- ================= Titles ================= --}}
                                <div class="row mt-3">
                                    <label class="form-label fw-bold text-dark">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_title"
                                        class="form-control @error('ar_title') is-invalid @enderror"
                                        value="{{ old('ar_title', $row->ar_title) }}" placeholder="Enter Title">
                                    @error('ar_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted d-block mt-1">Total characters: <span
                                            id="ar_title_count">0</span></small>
                                </div>

                        {{-- ================= Texts ================= --}}
                        <div class="row mt-3">
                            <label class="form-label fw-bold text-dark">Text <span
                                    class="text-danger">*</span></label>
                            <textarea name="ar_text" rows="6" class="form-control ckeditor @error('ar_text') is-invalid @enderror"
                                placeholder="Enter Text">{{ old('ar_text', $row->ar_text) }}</textarea>
                            @error('ar_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- ================= Meta (Meta) ================= --}}
                        <div class="row mt-3">
                                    <label class="form-label fw-bold text-dark">Meta Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_tag_title"
                                        class="form-control @error('ar_tag_title') is-invalid @enderror"
                                        value="{{ old('ar_tag_title', $row->ar_tag_title) }}"
                                        placeholder="Enter Meta Title">
                                    @error('ar_tag_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted d-block mt-1">Total characters: <span
                                            id="ar_tag_title_count">0</span></small>
                        </div>

                        <div class="row mt-3">
                            <label class="form-label fw-bold text-dark">Meta Description <span
                                    class="text-danger">*</span></label>
                            <textarea name="ar_tag_desc" rows="4" class="form-control @error('ar_tag_desc') is-invalid @enderror"
                                placeholder="Enter Meta Description">{{ old('ar_tag_desc', $row->ar_tag_desc) }}</textarea>
                            @error('ar_tag_desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-1">Total characters: <span
                                    id="ar_tag_desc_count">0</span></small>
                        </div>
                        {{-- ================= Scripts (single) ================= --}}
                        <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Article Script 1</label>
                            <textarea name="blog_script" rows="4" class="form-control @error('blog_script') is-invalid @enderror"
                                placeholder="Paste script here">{{ old('blog_script', $row->blog_script) }}</textarea>
                            @error('blog_script')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Article Script 2</label>
                            <textarea name="blog_second_script" rows="4"
                                class="form-control @error('blog_second_script') is-invalid @enderror" placeholder="Paste second script here">{{ old('blog_second_script', $row->blog_second_script) }}</textarea>
                            @error('blog_second_script')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        {{-- ================= Category / Status ================= --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Sub Category <span
                                            class="text-danger">*</span></label>
                                    <select name="new_article_sub_catrgory_id"
                                        class="form-select @error('new_article_sub_catrgory_id') is-invalid @enderror">
                                        <option value="">Select sub category</option>
                                        @foreach ($categoreies as $category)
                                            <option value="{{ $category->id }}"
                                                {{ (int) old('new_article_sub_catrgory_id', $row->new_article_sub_catrgory_id) === (int) $category->id ? 'selected' : '' }}>
                                                {{ $category->ar_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('new_article_sub_catrgory_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="">Select status</option>
                                        <option value="1"
                                            {{ (string) old('status', $row->status) === '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0"
                                            {{ (string) old('status', $row->status) === '0' ? 'selected' : '' }}>Not Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- ================= Schedule ================= --}}
                        @php
                            $datePart = null;
                            $timePart = null;
                            if (!empty($row->schedule_date)) {
                                try {
                                    $dt = \Carbon\Carbon::parse($row->schedule_date, 'Africa/Cairo');
                                    $datePart = $dt->format('Y-m-d');
                                    $timePart = $dt->format('H:i');
                                } catch (\Exception $e) {
                                }
                            }
                        @endphp

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Publish Date</label>
                                    <input type="date" name="schedule_date" id="schedule_date"
                                        class="form-control @error('schedule_date') is-invalid @enderror"
                                        value="{{ old('schedule_date', $datePart) }}" placeholder="Select publish date">
                                    @error('schedule_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label class="form-label fw-bold text-dark">Publish Time</label>
                                    <input type="time" name="schedule_time" id="schedule_time"
                                        class="form-control @error('schedule_time') is-invalid @enderror"
                                        value="{{ old('schedule_time', $timePart) }}" placeholder="Select publish time">
                                    @error('schedule_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small id="timeError" class="text-danger" style="display:none;">Time must be now or later
                                    when date is today.</small>
                            </div>
                        </div>

                        {{-- ================= Main Image ================= --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Image</label>
                            @if ($row->main_image)
                                <div class="mb-3">
                                    <div class="border rounded p-3 bg-light">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <span style="font-size: 1.5rem;">🖼️</span>
                                            </div>
                                            <div class="position-relative">
                                                <p class="mb-2 fw-bold text-muted">Current Image:</p>
                                                <div class="position-relative image-preview-container">
                                                    <img class="rounded border shadow-sm slider-thumbnail"
                                                        style="width: 150px; height: 100px; object-fit: cover; cursor: pointer;"
                                                        src="{{ asset('newArticle/' . $row->main_image) }}"
                                                        alt="Current Image" data-bs-toggle="modal"
                                                        data-bs-target="#imageModalBanner">
                                                </div>
                                                <small class="text-muted d-block mt-1">Click to preview full size</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal --}}
                                <div class="modal fade" id="imageModalBanner" tabindex="-1"
                                    aria-labelledby="imageModalLabelBanner" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabelBanner">
                                                    <i class="fas fa-image me-2"></i> Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('newArticle/' . $row->main_image) }}"
                                                    class="img-fluid rounded" alt="Full Size  Image"
                                                    style="max-height: 70vh; object-fit: contain;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="border rounded p-3 bg-light">
                                <div class="d-flex align-items-center">
                                    <div class="me-3"><span style="font-size: 2rem;">📸</span></div>
                                    <div class="flex-grow-1">
                                        <label class="form-label mb-2 fw-semibold">
                                            {{ $row->main_image ? 'Change Image (Optional)' : 'Upload New Image' }}
                                        </label>
                                        <input type="file" name="main_image" id="main_image"
                                            class="form-control @error('main_image') is-invalid @enderror"
                                            accept="image/*" onchange="previewNewImage(this)">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                                        </small>
                                        <div id="newImagePreview" class="mt-3" style="display: none;">
                                            <p class="mb-2 fw-bold text-success small">New Image Preview:</p>
                                            <img id="newImageDisplay" class="rounded border"
                                                style="max-width: 150px; max-height: 100px; object-fit: cover;"
                                                alt="New Image Preview">
                                        </div>
                                    </div>
                                </div>
                                @error('main_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="border-top pt-4 d-flex justify-content-between">
                            <a href="{{ route('newArticle.index') }}" class="btn btn-outline-secondary">← Back</a>
                            <button type="submit" class="btn btn-primary px-4">💾 Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('page_js')
        <script>
            // ===== Click on preview box/image to open file picker =====
            const fileInput = document.getElementById('main_image');
            const previewImg = document.getElementById('mainPreview');
            const previewBox = document.getElementById('mainPreviewBox');

            function openPicker() {
                if (fileInput) fileInput.click();
            }
            previewBox?.addEventListener('click', openPicker);
            previewImg?.addEventListener('click', openPicker);

            // ===== Live preview on file select =====
            fileInput?.addEventListener('change', function(e) {
                const file = e.target.files?.[0];
                if (!file || !previewImg) return;
                const url = URL.createObjectURL(file);
                previewImg.src = url;
                previewImg.style.display = 'block';
            });

            // ===== Optional client hint for time on same day =====
            const dateInput = document.getElementById('schedule_date');
            const timeInput = document.getElementById('schedule_time');
            const timeError = document.getElementById('timeError');

            function validateTime() {
                if (!dateInput || !timeInput || !timeError) return;
                const d = dateInput.value,
                    t = timeInput.value;
                if (!d || !t) {
                    timeError.style.display = 'none';
                    return;
                }
                const now = new Date();
                const pad = n => String(n).padStart(2, '0');
                const today = `${now.getFullYear()}-${pad(now.getMonth()+1)}-${pad(now.getDate())}`;
                const nowHM = `${pad(now.getHours())}:${pad(now.getMinutes())}`;
                timeError.style.display = (d === today && t < nowHM) ? 'inline' : 'none';
            }
            dateInput?.addEventListener('change', validateTime);
            timeInput?.addEventListener('input', validateTime);

            // ===== Character counters =====
            function bindCharCount(selector, counterId) {
                const el = document.querySelector(selector);
                const out = document.getElementById(counterId);
                if (!el || !out) return;
                const update = () => {
                    out.textContent = (el.value || '').length;
                };
                el.addEventListener('input', update);
                // init
                update();
            }

            document.addEventListener('DOMContentLoaded', () => {
                bindCharCount('input[name="ar_title"]', 'ar_title_count');
                bindCharCount('input[name="ar_tag_title"]', 'ar_tag_title_count');
                bindCharCount('textarea[name="ar_tag_desc"]', 'ar_tag_desc_count');
            });
        </script>
    @endpush

    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }

        #mainPreviewBox {
            transition: box-shadow .2s ease;
        }

        #mainPreviewBox:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, .12);
        }
    </style>
@endsection
