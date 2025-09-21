@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit About'; @endphp

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

                    <form action="{{route('about.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Story <span class="text-danger">*</span></label>
                                    <textarea name="ar_story" 
                                              id="ar_story" 
                                              class="form-control @error('ar_story') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in Arabic">{{ old('ar_story', $about->ar_story) }}</textarea>
                                    @error('ar_story')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Story <span class="text-danger">*</span></label>
                                    <textarea name="en_story" 
                                              id="en_story" 
                                              class="form-control @error('en_story') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in English">{{ old('en_story', $about->en_story) }}</textarea>
                                    @error('en_story')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Story Image</label>
                            
                            @if($about->story_image)
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
                                                         src="{{ asset('about/' . $about->story_image) }}" 
                                                         alt="Current Story Image"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal{{ 1 }}">
                                                </div>
                                                <small class="text-muted d-block mt-1">Click to preview full size</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Image Modal --}}
                                <div class="modal fade" id="imageModal{{ 1 }}" tabindex="-1" aria-labelledby="imageModalLabel{{ 1 }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ 1 }}">
                                                    <i class="fas fa-image me-2"></i>Story Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('about/' . $about->story_image) }}" 
                                                     class="img-fluid rounded" 
                                                     alt="Full Size Story Image"
                                                     style="max-height: 70vh; object-fit: contain;">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <div class="text-muted small">
                                                    <i class="fas fa-info-circle me-1"></i>
                                                    Story Image: {{ $about->story_image }}
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
                                            {{ $about->story_image ? 'Change Image (Optional)' : 'Upload New Image' }}
                                        </label>
                                        <input type="file" 
                                               name="story_image" 
                                               id="story_image" 
                                               class="form-control @error('story_image') is-invalid @enderror"
                                               accept="image/*"
                                               onchange="previewNewImage(this)">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                                            {{ $about->story_image ? ' • Leave empty to keep current image' : '' }}
                                        </small>
                                        
                                        {{-- New Image Preview --}}
                                        <div id="newImagePreview" class="mt-3" style="display: none;">
                                            <p class="mb-2 fw-bold text-success small">New Image Preview:</p>
                                            <img id="newImageDisplay" class="rounded border" style="max-width: 150px; max-height: 100px; object-fit: cover;" alt="New Image Preview">
                                        </div>
                                    </div>
                                </div>
                                @error('story_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Achievement Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="ar_achevement_title" 
                                           id="ar_achevement_title" 
                                           class="form-control @error('ar_achevement_title') is-invalid @enderror" 
                                           value="{{ old('ar_achevement_title', $about->ar_achevement_title) }}"
                                           placeholder="Enter slider title in Arabic">
                                    @error('ar_achevement_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Achievement Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="en_achevement_title" 
                                           id="en_achevement_title" 
                                           class="form-control @error('en_achevement_title') is-invalid @enderror" 
                                           value="{{ old('en_achevement_title', $about->en_achevement_title) }}"
                                           placeholder="Enter slider title in English">
                                    @error('en_achevement_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Achievement Text <span class="text-danger">*</span></label>
                                    <textarea name="ar_achevement_text" 
                                              id="ar_achevement_text" 
                                              class="form-control @error('ar_achevement_text') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in Arabic">{{ old('ar_achevement_text', $about->ar_achevement_text) }}</textarea>
                                    @error('ar_achevement_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Achievement Text <span class="text-danger">*</span></label>
                                    <textarea name="en_achevement_text" 
                                              id="en_achevement_text" 
                                              class="form-control @error('en_achevement_text') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in English">{{ old('en_achevement_text', $about->en_achevement_text) }}</textarea>
                                    @error('en_achevement_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Mission <span class="text-danger">*</span></label>
                                    <textarea name="ar_mission" 
                                              id="ar_mission" 
                                              class="form-control @error('ar_mission') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in Arabic">{{ old('ar_mission', $about->ar_mission) }}</textarea>
                                    @error('ar_mission')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Mission <span class="text-danger">*</span></label>
                                    <textarea name="en_mission" 
                                              id="en_mission" 
                                              class="form-control @error('en_mission') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in English">{{ old('en_mission', $about->en_mission) }}</textarea>
                                    @error('en_mission')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Mission Image</label>
                            
                            @if($about->mission_image)
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
                                                         src="{{ asset('about/' . $about->mission_image) }}" 
                                                         alt="Current Mission Image"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal{{ 2 }}">
                                                </div>
                                                <small class="text-muted d-block mt-1">Click to preview full size</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Image Modal --}}
                                <div class="modal fade" id="imageModal{{ 2 }}" tabindex="-1" aria-labelledby="imageModalLabel{{ 2 }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ 2 }}">
                                                    <i class="fas fa-image me-2"></i>Mission Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('about/' . $about->mission_image) }}" 
                                                     class="img-fluid rounded" 
                                                     alt="Full Size Mission Image"
                                                     style="max-height: 70vh; object-fit: contain;">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <div class="text-muted small">
                                                    <i class="fas fa-info-circle me-1"></i>
                                                    Mission Image: {{ $about->mission_image }}
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
                                            {{ $about->mission_image ? 'Change Image (Optional)' : 'Upload New Image' }}
                                        </label>
                                        <input type="file" 
                                               name="mission_image" 
                                               id="mission_image" 
                                               class="form-control @error('mission_image') is-invalid @enderror"
                                               accept="image/*"
                                               onchange="previewNewImage(this)">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                                            {{ $about->mission_image ? ' • Leave empty to keep current image' : '' }}
                                        </small>
                                        
                                        {{-- New Image Preview --}}
                                        <div id="newImagePreview" class="mt-3" style="display: none;">
                                            <p class="mb-2 fw-bold text-success small">New Image Preview:</p>
                                            <img id="newImageDisplay" class="rounded border" style="max-width: 150px; max-height: 100px; object-fit: cover;" alt="New Image Preview">
                                        </div>
                                    </div>
                                </div>
                                @error('mission_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Vision <span class="text-danger">*</span></label>
                                    <textarea name="ar_vision" 
                                              id="ar_vision" 
                                              class="form-control @error('ar_vision') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in Arabic">{{ old('ar_vision', $about->ar_vision) }}</textarea>
                                    @error('ar_vision')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Vision <span class="text-danger">*</span></label>
                                    <textarea name="en_vision" 
                                              id="en_vision" 
                                              class="form-control @error('en_vision') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in English">{{ old('en_vision', $about->en_vision) }}</textarea>
                                    @error('en_vision')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Vision Image</label>
                            
                            @if($about->vision_image)
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
                                                         src="{{ asset('about/' . $about->vision_image) }}" 
                                                         alt="Current Vision Image"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal{{ 3 }}">
                                                </div>
                                                <small class="text-muted d-block mt-1">Click to preview full size</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Image Modal --}}
                                <div class="modal fade" id="imageModal{{ 3 }}" tabindex="-1" aria-labelledby="imageModalLabel{{ 3 }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ 3 }}">
                                                    <i class="fas fa-image me-2"></i>Vision Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('about/' . $about->vision_image) }}" 
                                                     class="img-fluid rounded" 
                                                     alt="Full Size Vision Image"
                                                     style="max-height: 70vh; object-fit: contain;">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <div class="text-muted small">
                                                    <i class="fas fa-info-circle me-1"></i>
                                                    Vision Image: {{ $about->vision_image }}
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
                                            {{ $about->vision_image ? 'Change Image (Optional)' : 'Upload New Image' }}
                                        </label>
                                        <input type="file" 
                                               name="vision_image" 
                                               id="vision_image" 
                                               class="form-control @error('vision_image') is-invalid @enderror"
                                               accept="image/*"
                                               onchange="previewNewImage(this)">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                                            {{ $about->vision_image ? ' • Leave empty to keep current image' : '' }}
                                        </small>
                                        
                                        {{-- New Image Preview --}}
                                        <div id="newImagePreview" class="mt-3" style="display: none;">
                                            <p class="mb-2 fw-bold text-success small">New Image Preview:</p>
                                            <img id="newImageDisplay" class="rounded border" style="max-width: 150px; max-height: 100px; object-fit: cover;" alt="New Image Preview">
                                        </div>
                                    </div>
                                </div>
                                @error('vision_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Goal <span class="text-danger">*</span></label>
                                    <textarea name="ar_goal" 
                                              id="ar_goal" 
                                              class="form-control @error('ar_goal') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in Arabic">{{ old('ar_goal', $about->ar_goal) }}</textarea>
                                    @error('ar_goal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Goal <span class="text-danger">*</span></label>
                                    <textarea name="en_goal" 
                                              id="en_goal" 
                                              class="form-control @error('en_goal') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Enter slider description in English">{{ old('en_goal', $about->en_goal) }}</textarea>
                                    @error('en_goal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Banner Image</label>
                            
                            @if($about->banner_image)
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
                                                         src="{{ asset('about/' . $about->banner_image) }}" 
                                                         alt="Current Banner Image"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal{{ 4 }}">
                                                </div>
                                                <small class="text-muted d-block mt-1">Click to preview full size</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Image Modal --}}
                                <div class="modal fade" id="imageModal{{ 4 }}" tabindex="-1" aria-labelledby="imageModalLabel{{ 4 }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ 4 }}">
                                                    <i class="fas fa-image me-2"></i>Banner Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('about/' . $about->banner_image) }}" 
                                                     class="img-fluid rounded" 
                                                     alt="Full Size Banner Image"
                                                     style="max-height: 70vh; object-fit: contain;">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <div class="text-muted small">
                                                    <i class="fas fa-info-circle me-1"></i>
                                                    Banner Image: {{ $about->banner_image }}
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
                                            {{ $about->banner_image ? 'Change Image (Optional)' : 'Upload New Image' }}
                                        </label>
                                        <input type="file" 
                                               name="banner_image" 
                                               id="banner_image" 
                                               class="form-control @error('banner_image') is-invalid @enderror"
                                               accept="image/*"
                                               onchange="previewNewImage(this)">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                                            {{ $about->banner_image ? ' • Leave empty to keep current image' : '' }}
                                        </small>
                                        
                                        {{-- New Image Preview --}}
                                        <div id="newImagePreview" class="mt-3" style="display: none;">
                                            <p class="mb-2 fw-bold text-success small">New Image Preview:</p>
                                            <img id="newImageDisplay" class="rounded border" style="max-width: 150px; max-height: 100px; object-fit: cover;" alt="New Image Preview">
                                        </div>
                                    </div>
                                </div>
                                @error('banner_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="border-top pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('about.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back to About
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