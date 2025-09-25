@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Hero Section'; @endphp

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

                    <form action="{{route('hero.update', $hero->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Title <span class="text-danger">*</span></label>
                                    <input type="title_ar"
                                        name="title_ar"
                                        id="title_ar"
                                        class="form-control @error('title_ar') is-invalid @enderror"
                                        value="{{ old('title_ar', $hero->title_ar) }}"
                                        placeholder="Enter Email">
                                    @error('title_ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Title <span class="text-danger">*</span></label>
                                    <input type="title_en"
                                        name="title_en"
                                        id="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror"
                                        value="{{ old('title_en', $hero->title_en) }}"
                                        placeholder="Enter Email">
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic First Description <span class="text-danger">*</span></label>
                                    <textarea name="first_description_ar"
                                              id="first_description_ar" 
                                              class="form-control dataTables_filter @error('first_description_ar') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in Arabic">{{ old('first_description_ar', $hero->first_description_ar) }}</textarea>
                                    @error('first_description_ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">                           
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English First Description <span class="text-danger">*</span></label>
                                    <textarea name="first_description_en" 
                                              id="first_description_en" 
                                              class="form-control @error('first_description_en') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in English">{{ old('first_description_en', $hero->first_description_en) }}</textarea>
                                    @error('first_description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Second Description <span class="text-danger">*</span></label>
                                    <textarea name="second_description_ar" 
                                              id="second_description_ar" 
                                              class="form-control @error('second_description_ar') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in Arabic">{{ old('second_description_ar', $hero->second_description_ar) }}</textarea>
                                    @error('second_description_ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Second Description <span class="text-danger">*</span></label>
                                    <textarea name="second_description_en" 
                                              id="second_description_en" 
                                              class="form-control @error('second_description_en') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in English">{{ old('second_description_en', $hero->second_description_en) }}</textarea>
                                    @error('second_description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Image</label>
                            
                            @if($hero->image)
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
                                                         style="width: 150px; height: 100px; object-fit: cover; cursor: pointer; transition: all 0.3s ease;"
                                                         src="{{ asset('hero/' . $hero->image) }}" 
                                                         alt="Current Vision Image"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal{{ $hero->id }}">
                                                </div>
                                                <small class="text-muted d-block mt-1">Click to preview full size</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Image Modal --}}
                                <div class="modal fade" id="imageModal{{ $hero->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $hero->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ $hero->id }}">
                                                    <i class="fas fa-image me-2"></i>Vision Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('hero/' . $hero->image) }}" 
                                                     class="img-fluid rounded" 
                                                     alt="Full Size Vision Image"
                                                     style="max-height: 70vh; object-fit: contain;">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <div class="text-muted small">
                                                    <i class="fas fa-info-circle me-1"></i>
                                                    Vision Image: {{ $hero->image }}
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    <i class="fas fa-times me-1"></i>Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="border rounded p-3 bg-light">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span style="font-size: 2rem;">📸</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <label class="form-label mb-2 fw-semibold">
                                            {{ $hero->image ? 'Change Image (Optional)' : 'Upload New Image' }}
                                        </label>
                                        <input type="file" 
                                               name="image" 
                                               id="image" 
                                               class="form-control @error('image') is-invalid @enderror"
                                               accept="image/*"
                                               onchange="previewNewImage(this)">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                                            {{ $hero->image ? ' • Leave empty to keep current image' : '' }}
                                        </small>
                                        
                                        {{-- New Image Preview --}}
                                        <div id="newImagePreview" class="mt-3" style="display: none;">
                                            <p class="mb-2 fw-bold text-success small">New Image Preview:</p>
                                            <img id="newImageDisplay" class="rounded border" style="max-width: 150px; max-height: 100px; object-fit: cover;" alt="New Image Preview">
                                        </div>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="border-top pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('hero.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back to Hero Section
                                </a>
                                
                                <button type="submit" class="btn btn-primary px-4">
                                    <span class="me-1">💾</span> Update Slider
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