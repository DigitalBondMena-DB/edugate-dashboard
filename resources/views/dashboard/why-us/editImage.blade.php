@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Why Us Image'; @endphp

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
                    @if ($why && $why->image)
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Current Image</label>
                            <div class="border rounded p-3 bg-light">
                                <img src="{{ asset('why-us/' . $why->image) }}" class="rounded border"
                                    style="max-width: 220px; max-height: 140px; object-fit: cover; cursor:pointer"
                                    data-bs-toggle="modal" data-bs-target="#imageModal">
                            </div>

                            <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><i class="fas fa-image me-2"></i>Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center p-0">
                                            <img src="{{ asset('why-us/' . $why->image) }}" class="img-fluid rounded"
                                                style="max-height:70vh; object-fit:contain;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('why-us.updateImage', $why?->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">New Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            <small class="text-muted mt-1 d-block">Supported: JPG, JPEG, PNG, WEBP (Max: 2MB)</small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="border-top pt-4 d-flex justify-content-between">
                            <a href="{{ route('why-us.index') }}" class="btn btn-outline-secondary">
                                ← Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                💾 Update Image
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection