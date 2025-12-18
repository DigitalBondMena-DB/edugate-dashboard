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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $contact->email) }}" placeholder="Enter Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Whatsapp Number <span class="text-danger">*</span></label>
                                    <input type="whatsapp_number" name="whatsapp_number" id="whatsapp_number"
                                        class="form-control @error('whatsapp_number') is-invalid @enderror"
                                        value="{{ old('whatsapp_number', $contact->whatsapp_number) }}" placeholder="Enter Whatsapp Number">
                                    @error('whatsapp_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        {{-- Phones --}}
                        @php
                            $phonesRaw = old(
                                'phones',
                                is_array($contact->phones)
                                    ? $contact->phones
                                    : ($contact->phones
                                        ? json_decode($contact->phones, true)
                                        : []),
                            );
                            $phones = array_values($phonesRaw ?? []);
                            $phones = array_pad($phones, 3, '');
                        @endphp

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Phone(s)</label>
                            <div class="row g-2">
                                {{-- Required --}}
                                <div class="col-12 col-md-4">
                                    <input type="text" name="phones[]" value="{{ $phones[0] }}"
                                        class="form-control @error('phones.0') is-invalid @enderror"
                                        placeholder="e.g. +971 50 123 4567" required>
                                    @error('phones.0')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Required</small>
                                </div>

                                {{-- Optional --}}
                                <div class="col-12 col-md-4">
                                    <input type="text" name="phones[]" value="{{ $phones[1] }}"
                                        class="form-control @error('phones.1') is-invalid @enderror"
                                        placeholder="e.g. +971 55 234 5678">
                                    @error('phones.1')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Optional --}}
                                <div class="col-12 col-md-4">
                                    <input type="text" name="phones[]" value="{{ $phones[2] }}"
                                        class="form-control @error('phones.2') is-invalid @enderror"
                                        placeholder="e.g. +971 56 345 6789">
                                    @error('phones.2')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        {{-- Arabic & English Address --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Address <span
                                            class="text-danger">*</span></label>
                                    <textarea name="ar_address" id="ar_address" class="form-control @error('ar_address') is-invalid @enderror"
                                        rows="4" placeholder="Enter address in Arabic">{{ old('ar_address', $contact->ar_address) }}</textarea>
                                    @error('ar_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Address <span
                                            class="text-danger">*</span></label>
                                    <textarea name="en_address" id="en_address" class="form-control @error('en_address') is-invalid @enderror"
                                        rows="4" placeholder="Enter address in English">{{ old('en_address', $contact->en_address) }}</textarea>
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
                                    <label class="form-label fw-bold text-dark">Facebook <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ old('facebook', $contact->facebook) }}" placeholder="Enter Facebook">
                                    @error('facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">X (Twitter) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="twitter"
                                        class="form-control @error('twitter') is-invalid @enderror"
                                        value="{{ old('twitter', $contact->twitter) }}" placeholder="Enter Twitter">
                                    @error('twitter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Instagram <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="instagram"
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        value="{{ old('instagram', $contact->instagram) }}" placeholder="Enter Instagram">
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Snapchat <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="snapchat"
                                        class="form-control @error('snapchat') is-invalid @enderror"
                                        value="{{ old('snapchat', $contact->snapchat) }}" placeholder="Enter Snapchat">
                                    @error('snapchat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">LinkedIn <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="linkedin"
                                        class="form-control @error('linkedin') is-invalid @enderror"
                                        value="{{ old('linkedin', $contact->linkedin) }}" placeholder="Enter LinkedIn">
                                    @error('linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Tiktok <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="tiktok"
                                        class="form-control @error('tiktok') is-invalid @enderror"
                                        value="{{ old('tiktok', $contact->tiktok) }}" placeholder="Enter Tiktok">
                                    @error('tiktok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Youtube<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="youtube"
                                        class="form-control @error('youtube') is-invalid @enderror"
                                        value="{{ old('youtube', $contact->youtube) }}" placeholder="Enter Youtube">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- map url --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Map URL </label>
                            <input type="text" name="map_url"
                                class="form-control @error('map_url') is-invalid @enderror"
                                value="{{ old('map_url', $contact->map_url) }}" placeholder="Enter Map URL">
                            @error('map_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- map embed --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Map Embed </label>
                            <input type="text" name="map_embed"
                                class="form-control @error('map_embed') is-invalid @enderror"
                                value="{{ old('map_embed', $contact->map_embed) }}" placeholder="Enter Map Embed">
                            @error('map_embed')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- footer text (ar) --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Footer Text (Ar)</label>
                            <textarea name="ar_footer_text"
                                class="form-control @error('ar_footer_text') is-invalid @enderror"
                                rows="5">{{ old('ar_footer_text', $contact->ar_footer_text) }}</textarea>
                            @error('ar_footer_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- footer text (en) --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Footer Text (En)</label>
                            <textarea name="en_footer_text"
                                class="form-control @error('en_footer_text') is-invalid @enderror"
                                rows="5">{{ old('en_footer_text', $contact->en_footer_text) }}</textarea>
                            @error('en_footer_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
