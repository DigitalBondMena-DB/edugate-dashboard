@extends('dashboard.layouts.master')

@php $pageTitle = 'Add Gallary'; @endphp

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
                    <form action="{{ route('event-categery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_name"
                                        class="form-control @error('ar_name') is-invalid @enderror"
                                        value="{{ old('ar_name') }}" placeholder="Name in Arabic">
                                    @error('ar_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_name"
                                        class="form-control @error('en_name') is-invalid @enderror"
                                        value="{{ old('en_name') }}" placeholder="Name in English">
                                    @error('en_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Arabic Description</label>
                            <textarea name="ar_description" rows="4" class="form-control @error('ar_description') is-invalid @enderror"
                                placeholder="Arabic description">{{ old('ar_description') }}</textarea>
                            @error('ar_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">English Description</label>
                            <textarea name="en_description" rows="4" class="form-control @error('en_description') is-invalid @enderror"
                                placeholder="English description">{{ old('en_description') }}</textarea>
                            @error('en_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Gallery Images --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Gallery Images</label>
                            <input type="file" name="gallery_images[]" multiple
                                class="form-control @error('gallery_images.*') is-invalid @enderror" accept="image/*">
                            <small class="text-muted d-block mt-1">You can select multiple images. They will be saved as
                                WEBP.</small>
                            @error('gallery_images.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="border-top pt-4 d-flex justify-content-between">
                            <a href="{{ route('event-categery.index') }}" class="btn btn-outline-secondary">
                                ← Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                💾 Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
