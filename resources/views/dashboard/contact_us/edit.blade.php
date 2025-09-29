@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Contact Information'; @endphp

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

                    <form action="{{ route('contact-us.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Email --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Email <span class="text-danger">*</span></label>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $contact->email) }}"
                                   placeholder="Enter Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Phones --}}
                        @php
                            $phonesRaw = old('phones', is_array($contact->phones) ? $contact->phones : ($contact->phones ? json_decode($contact->phones, true) : []));
                            $phones = array_values($phonesRaw ?? []);
                            $phones = array_pad($phones, 3, '');
                        @endphp

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Phone(s)</label>
                            <div class="row g-2">
                                {{-- Required --}}
                                <div class="col-12 col-md-4">
                                    <input type="text"
                                           name="phones[]"
                                           value="{{ $phones[0] }}"
                                           class="form-control @error('phones.0') is-invalid @enderror"
                                           placeholder="e.g. +971 50 123 4567"
                                           required>
                                    @error('phones.0') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                    <small class="text-muted">Required</small>
                                </div>

                                {{-- Optional --}}
                                <div class="col-12 col-md-4">
                                    <input type="text"
                                           name="phones[]"
                                           value="{{ $phones[1] }}"
                                           class="form-control @error('phones.1') is-invalid @enderror"
                                           placeholder="e.g. +971 55 234 5678">
                                    @error('phones.1') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                </div>

                                {{-- Optional --}}
                                <div class="col-12 col-md-4">
                                    <input type="text"
                                           name="phones[]"
                                           value="{{ $phones[2] }}"
                                           class="form-control @error('phones.2') is-invalid @enderror"
                                           placeholder="e.g. +971 56 345 6789">
                                    @error('phones.2') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Arabic & English Address --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Address <span class="text-danger">*</span></label>
                                    <textarea name="ar_address"
                                              id="ar_address"
                                              class="form-control @error('ar_address') is-invalid @enderror"
                                              rows="4"
                                              placeholder="Enter address in Arabic">{{ old('ar_address', $contact->ar_address) }}</textarea>
                                    @error('ar_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Address <span class="text-danger">*</span></label>
                                    <textarea name="en_address"
                                              id="en_address"
                                              class="form-control @error('en_address') is-invalid @enderror"
                                              rows="4"
                                              placeholder="Enter address in English">{{ old('en_address', $contact->en_address) }}</textarea>
                                    @error('en_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Socials --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Facebook <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="facebook"
                                           class="form-control @error('facebook') is-invalid @enderror"
                                           value="{{ old('facebook', $contact->facebook) }}"
                                           placeholder="Enter Facebook">
                                    @error('facebook') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">X (Twitter) <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="twitter"
                                           class="form-control @error('twitter') is-invalid @enderror"
                                           value="{{ old('twitter', $contact->twitter) }}"
                                           placeholder="Enter Twitter">
                                    @error('twitter') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Instagram <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="instagram"
                                           class="form-control @error('instagram') is-invalid @enderror"
                                           value="{{ old('instagram', $contact->instagram) }}"
                                           placeholder="Enter Instagram">
                                    @error('instagram') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Snapchat <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="snapchat"
                                           class="form-control @error('snapchat') is-invalid @enderror"
                                           value="{{ old('snapchat', $contact->snapchat) }}"
                                           placeholder="Enter Snapchat">
                                    @error('snapchat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">LinkedIn <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="linkedin"
                                           class="form-control @error('linkedin') is-invalid @enderror"
                                           value="{{ old('linkedin', $contact->linkedin) }}"
                                           placeholder="Enter LinkedIn">
                                    @error('linkedin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Tiktok <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="tiktok"
                                           class="form-control @error('tiktok') is-invalid @enderror"
                                           value="{{ old('tiktok', $contact->tiktok) }}"
                                           placeholder="Enter Tiktok">
                                    @error('tiktok') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Banner Image --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Banner Image</label>
                            @if($contact->banner_image)
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
                                                         src="{{ asset('contact_us/' . $contact->banner_image) }}"
                                                         alt="Current Banner Image"
                                                         data-bs-toggle="modal"
                                                         data-bs-target="#imageModalBanner">
                                                </div>
                                                <small class="text-muted d-block mt-1">Click to preview full size</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal --}}
                                <div class="modal fade" id="imageModalBanner" tabindex="-1" aria-labelledby="imageModalLabelBanner" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabelBanner">
                                                    <i class="fas fa-image me-2"></i>Banner Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('contact_us/' . $contact->banner_image) }}"
                                                     class="img-fluid rounded"
                                                     alt="Full Size Banner Image"
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
                                            {{ $contact->banner_image ? 'Change Image (Optional)' : 'Upload New Image' }}
                                        </label>
                                        <input type="file"
                                               name="banner_image"
                                               id="banner_image"
                                               class="form-control @error('banner_image') is-invalid @enderror"
                                               accept="image/*"
                                               onchange="previewNewImage(this)">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                                        </small>
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
                                <a href="{{ route('contact-us.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <span class="me-1">💾</span> Update Contact
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
