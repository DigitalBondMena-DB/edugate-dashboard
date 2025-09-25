@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Counter'; @endphp

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

                    <form action="{{ route('counters.update', $counter->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Email --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Title <span class="text-danger">*</span></label>
                                    <input type="title_ar"
                                        name="title_ar"
                                        id="title_ar"
                                        class="form-control @error('title_ar') is-invalid @enderror"
                                        value="{{ old('title_ar', $counter->title_ar) }}"
                                        placeholder="Enter Email">
                                    @error('title_ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Title <span class="text-danger">*</span></label>
                                    <input type="title_en"
                                        name="title_en"
                                        id="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror"
                                        value="{{ old('title_en', $counter->title_en) }}"
                                        placeholder="Enter Email">
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Count <span class="text-danger">*</span></label>
                                    <input type="count"
                                        name="count"
                                        id="count"
                                        class="form-control @error('count') is-invalid @enderror"
                                        value="{{ old('count', $counter->count) }}"
                                        placeholder="Enter Email">
                                    @error('count')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>





                        

                        <div class="border-top pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('counters.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <span class="me-1">💾</span> Update Counter
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
            box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
        }
        .image-preview-container { position: relative; display: inline-block; }
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
