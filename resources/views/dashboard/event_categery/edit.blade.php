@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Event Category'; @endphp

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
                    <form action="{{ route('event-categery.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_name"
                                        class="form-control @error('ar_name') is-invalid @enderror"
                                        value="{{ old('ar_name', $row->ar_name ?? $row->ar_name) }}"
                                        placeholder="العنوان بالعربية">
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
                                        value="{{ old('en_name', $row->en_name ?? $row->en_name) }}"
                                        placeholder="Name in English">
                                    @error('en_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Arabic Description</label>
                            <textarea name="ar_description" rows="4" class="form-control @error('ar_description') is-invalid @enderror"
                                placeholder="وصف مختصر">{{ old('ar_description', $row->ar_description) }}</textarea>
                            @error('ar_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">English Description</label>
                            <textarea name="en_description" rows="4" class="form-control @error('en_description') is-invalid @enderror"
                                placeholder="Short description">{{ old('en_description', $row->en_description) }}</textarea>
                            @error('en_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Existing Gallery --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Current Gallery</label>

                            @php $gals = $row->gallaries ?? collect(); @endphp

                            @if ($gals->count())
                                <div class="row g-3">
                                    @foreach ($gals as $img)
                                        <div class="col-6 col-md-3">
                                            <div class="border rounded p-2 text-center h-100 d-flex flex-column">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#imgModal{{ $img->id }}">
                                                    <img src="{{ asset('event_categery/' . $img->image) }}" alt="gallery"
                                                        class="rounded" style="width:100%; height:150px; object-fit:cover;">
                                                </a>
                                                <div class="form-check mt-2 text-start">
                                                    <input class="form-check-input" type="checkbox" name="deleted_images[]"
                                                        value="{{ $img->id }}" id="del{{ $img->id }}">
                                                    <label class="form-check-label small text-danger"
                                                        for="del{{ $img->id }}">
                                                        Delete this image
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Modal --}}
                                        <div class="modal fade" id="imgModal{{ $img->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content border-0">
                                                    <div class="modal-body p-0 text-center">
                                                        <img src="{{ asset('event_categery/' . $img->image) }}"
                                                            class="img-fluid" style="max-height:80vh; object-fit:contain;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-muted">No images yet.</div>
                            @endif
                        </div>

                        {{-- Add New Gallery Images --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Add More Images</label>
                            <input type="file" name="gallery_images[]" multiple
                                class="form-control @error('gallery_images.*') is-invalid @enderror" accept="image/*">
                            <small class="text-muted d-block mt-1">Select multiple images to append to this gallery.</small>
                            @error('gallery_images.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="border-top pt-4 d-flex justify-content-between">
                            <a href="{{ route('event-categery.index') }}" class="btn btn-outline-secondary">
                                ← Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                💾 Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection