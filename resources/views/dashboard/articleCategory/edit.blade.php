@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Category'; @endphp

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
                    <form action="{{ route('articleCategory.update', $row->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_title" id="ar_title"
                                        class="form-control @error('ar_title') is-invalid @enderror"
                                        value="{{ old('ar_title', $row->ar_title) }}"
                                        placeholder="Enter category title in Arabic">
                                    @error('ar_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_title" id="en_title"
                                        class="form-control @error('en_title') is-invalid @enderror"
                                        value="{{ old('en_title', $row->en_title) }}"
                                        placeholder="Enter category title in English">
                                    @error('en_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="border-top pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('articleCategory.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back to Categories
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    <span class="me-1">💾</span> Update Category
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

                reader.onload = function(e) {
                    display.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
