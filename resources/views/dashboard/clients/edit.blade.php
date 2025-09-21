@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Slider'; @endphp

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
                    <form action="{{ route('sliders.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="ar_title" 
                                           id="ar_title" 
                                           class="form-control @error('ar_title') is-invalid @enderror" 
                                           value="{{ old('ar_title', $row->ar_title) }}"
                                           placeholder="Enter slider title in Arabic">
                                    @error('ar_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="en_title" 
                                           id="en_title" 
                                           class="form-control @error('en_title') is-invalid @enderror" 
                                           value="{{ old('en_title', $row->en_title) }}"
                                           placeholder="Enter slider title in English">
                                    @error('en_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Description <span class="text-danger">*</span></label>
                                    <textarea name="ar_paragraph" 
                                              id="ar_paragraph" 
                                              class="form-control @error('ar_paragraph') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in Arabic">{{ old('ar_paragraph', $row->ar_paragraph) }}</textarea>
                                    @error('ar_paragraph')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Description <span class="text-danger">*</span></label>
                                    <textarea name="en_paragraph" 
                                              id="en_paragraph" 
                                              class="form-control @error('en_paragraph') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in English">{{ old('en_paragraph', $row->en_paragraph) }}</textarea>
                                    @error('en_paragraph')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Slider Image</label>
                            
                            @if($row->image)
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
                                                         src="{{ asset('sliders/' . $row->image) }}" 
                                                         alt="Current Slider Image"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal{{ $row->id }}">
                                                </div>
                                                <small class="text-muted d-block mt-1">Click to preview full size</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Image Modal --}}
                                <div class="modal fade" id="imageModal{{ $row->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $row->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ $row->id }}">
                                                    <i class="fas fa-image me-2"></i>Slider Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('sliders/' . $row->image) }}" 
                                                     class="img-fluid rounded" 
                                                     alt="Full Size Slider Image"
                                                     style="max-height: 70vh; object-fit: contain;">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <div class="text-muted small">
                                                    <i class="fas fa-info-circle me-1"></i>
                                                    Image: {{ $row->image }}
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
                                            {{ $row->image ? 'Change Image (Optional)' : 'Upload New Image' }}
                                        </label>
                                        <input type="file" 
                                               name="image" 
                                               id="image" 
                                               class="form-control @error('image') is-invalid @enderror"
                                               accept="image/*"
                                               onchange="previewNewImage(this)">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, PNG, GIF (Max: 2MB)
                                            {{ $row->image ? ' • Leave empty to keep current image' : '' }}
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
                                <a href="{{ route('sliders.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back to Sliders
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