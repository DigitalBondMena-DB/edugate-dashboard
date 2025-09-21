@extends('dashboard.layouts.master')

@php $pageTitle = 'Add New Slider'; @endphp

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
                    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="ar_title" 
                                           id="ar_title" 
                                           class="form-control @error('ar_title') is-invalid @enderror" 
                                           value="{{ old('ar_title') }}"
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
                                           value="{{ old('en_title') }}"
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
                                              placeholder="Enter slider description in Arabic">{{ old('ar_paragraph') }}</textarea>
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
                                              placeholder="Enter slider description in English">{{ old('en_paragraph') }}</textarea>
                                    @error('en_paragraph')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Slider Image <span class="text-danger">*</span></label>
                            <div class="border rounded p-3 bg-light">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span style="font-size: 2rem;">📸</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="file" 
                                               name="image" 
                                               id="image" 
                                               class="form-control @error('image') is-invalid @enderror"
                                               accept="image/*">
                                        <small class="text-muted mt-1 d-block">Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)</small>
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
                                    <span class="me-1">💾</span> Create Slider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection