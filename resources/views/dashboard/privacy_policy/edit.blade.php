@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Privacy Policy'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header card-header-primary">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="card-title text-dark mb-1">{{ $pageTitle }}</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('privacy-policy.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Privacy Policy Content (Arabic) <span
                                            class="text-danger">*</span></label>
                                    <textarea name="ar_content" id="ar_content" class="form-control @error('ar_content') is-invalid @enderror"
                                        rows="8" placeholder="Enter Privacy Policy content in Arabic">{{ old('ar_content', $data->ar_content) }}</textarea>
                                    @error('ar_content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Privacy Policy Content (English) <span
                                            class="text-danger">*</span></label>
                                    <textarea name="en_content" id="en_content" class="form-control @error('en_content') is-invalid @enderror"
                                        rows="8" placeholder="Enter Privacy Policy content in English">{{ old('en_content', $data->en_content) }}</textarea>
                                    @error('en_content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border-top pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('privacy-policy.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <span class="me-1">💾</span> Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <style>
        .slider-thumbnail {
            transition: all 0.3s ease !important;
        }

        .slider-thumbnail:hover {
            transform: scale(1.05) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
        }

        .image-preview-container {
            position: relative;
            display: inline-block;
        }
    </style>

    <script>
        function previewNewImage(input) {
            const preview = document.getElementById('newImagePreview');
            const display = document.getElementById('newImageDisplay');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    display.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
