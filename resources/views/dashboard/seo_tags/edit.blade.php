@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Tag'; @endphp

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
                    <form action="{{ route('tags.update', $row->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Tag Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_tag_title"
                                        class="form-control @error('ar_tag_title') is-invalid @enderror"
                                        value="{{ old('ar_tag_title', $row->ar_tag_title ?? $row->ar_tag_title) }}"
                                        placeholder="Tag Title in Arabic">
                                    @error('ar_tag_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Tag Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_tag_title"
                                        class="form-control @error('en_tag_title') is-invalid @enderror"
                                        value="{{ old('en_tag_title', $row->en_tag_title ?? $row->en_tag_title) }}"
                                        placeholder="Tag Title in English">
                                    @error('en_tag_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Arabic Tag Paragraph</label>
                            <textarea name="ar_tag_paragraph" rows="4" class="form-control @error('ar_tag_paragraph') is-invalid @enderror"
                                placeholder="Short description">{{ old('ar_tag_paragraph', $row->ar_tag_paragraph) }}</textarea>
                            @error('ar_tag_paragraph')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">English Tag Paragraph</label>
                            <textarea name="en_tag_paragraph" rows="4" class="form-control @error('en_tag_paragraph') is-invalid @enderror"
                                placeholder="Short description">{{ old('en_tag_paragraph', $row->en_tag_paragraph) }}</textarea>
                            @error('en_tag_paragraph')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Tag Type <span
                                    class="text-danger">*</span></label>
                            <select name="tag_type" class="form-select @error('tag_type') is-invalid @enderror">
                                <option value="" disabled>Select Tag Type</option>
                                <option value="home"
                                    {{ old('tag_type', $row->tag_type) == 'home' ? 'selected' : '' }}>Home
                                </option>
                                <option value="aboutUs"
                                    {{ old('tag_type', $row->tag_type) == 'aboutUs' ? 'selected' : '' }}>About Us
                                </option>
                                <option value="articles"
                                    {{ old('tag_type', $row->tag_type) == 'articles' ? 'selected' : '' }}>Articles
                                </option>
                                <option value="services"
                                    {{ old('tag_type', $row->tag_type) == 'services' ? 'selected' : '' }}>Services
                                </option>
                                <option value="contactUs"
                                    {{ old('tag_type', $row->tag_type) == 'contactUs' ? 'selected' : '' }}>Contact Us
                                </option>
                                <option value="gallary"
                                    {{ old('tag_type', $row->tag_type) == 'gallary' ? 'selected' : '' }}>Gallary
                                </option>
                                <option value="studyAbroadNow"
                                    {{ old('tag_type', $row->tag_type) == 'studyAbroadNow' ? 'selected' : '' }}>Study Abroad Now
                                </option>
                            </select>
                            @error('tag_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="border-top pt-4 d-flex justify-content-between">
                            <a href="{{ route('tags.index') }}" class="btn btn-outline-secondary">
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
