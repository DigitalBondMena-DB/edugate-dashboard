@extends('dashboard.layouts.master')

@php $pageTitle = 'Add New Partner'; @endphp

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
                    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_name" id="ar_name"
                                        class="form-control @error('ar_name') is-invalid @enderror"
                                        value="{{ old('ar_name') }}" placeholder="Enter Partner title in Arabic">
                                    @error('ar_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_name" id="en_name"
                                        class="form-control @error('en_name') is-invalid @enderror"
                                        value="{{ old('en_name') }}" placeholder="Enter Partner title in English">
                                    @error('en_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Link <span class="text-danger">*</span></label>
                            <input type="text" name="link" id="link"
                                class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}"
                                placeholder="Enter Link">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Partner Logo <span
                                    class="text-danger">*</span></label>
                            <div class="border rounded p-3 bg-light">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span style="font-size: 2rem;">📸</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="file" name="logo" id="logo"
                                            class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                                        <small class="text-muted mt-1 d-block">Supported formats: JPG, JPEG, PNG, WEBP (Max:
                                            2MB)</small>
                                    </div>
                                </div>
                                @error('logo')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="border-top pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back to Partners
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    <span class="me-1">💾</span> Create Partner
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection