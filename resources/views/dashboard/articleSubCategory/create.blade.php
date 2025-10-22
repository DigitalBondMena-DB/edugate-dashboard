@extends('dashboard.layouts.master')

@php
    $pageTitle = 'Add New Sub Category';
@endphp

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
                    <form action="{{ route('articleSubCategory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Title <span class="text-danger">*</span></label>
                                    <input type="text" name="ar_title" id="ar_title"
                                           class="form-control @error('ar_title') is-invalid @enderror"
                                           value="{{ old('ar_title') }}" placeholder="Enter sub category title in Arabic">
                                    @error('ar_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Title <span class="text-danger">*</span></label>
                                    <input type="text" name="en_title" id="en_title"
                                           class="form-control @error('en_title') is-invalid @enderror"
                                           value="{{ old('en_title') }}" placeholder="Enter sub category title in English">
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
                                    <textarea name="ar_description" rows="4"
                                              class="form-control @error('ar_description') is-invalid @enderror"
                                              placeholder="Enter sub category description in Arabic">{{ old('ar_description') }}</textarea>
                                    @error('ar_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Description <span class="text-danger">*</span></label>
                                    <textarea name="en_description" rows="4"
                                              class="form-control @error('en_description') is-invalid @enderror"
                                              placeholder="Enter sub category description in English">{{ old('en_description') }}</textarea>
                                    @error('en_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Arabic Detail Title <span class="text-danger">*</span></label>
                            <textarea name="ar_detail_title" rows="4"
                                      class="form-control @error('ar_detail_title') is-invalid @enderror ckeditor"
                                      placeholder="Enter sub category Detail title in Arabic">{{ old('ar_detail_title') }}</textarea>
                            @error('ar_detail_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">English Detail Title <span class="text-danger">*</span></label>
                            <textarea name="en_detail_title" rows="4"
                                      class="form-control @error('en_detail_title') is-invalid @enderror ckeditor"
                                      placeholder="Enter sub category Detail title in English">{{ old('en_detail_title') }}</textarea>
                            @error('en_detail_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Detail Description <span class="text-danger">*</span></label>
                                    <input type="text" name="ar_detail_text" id="ar_detail_text"
                                           class="form-control @error('ar_detail_text') is-invalid @enderror"
                                           value="{{ old('ar_detail_text') }}"
                                           placeholder="Enter sub category detail description in Arabic">
                                    @error('ar_detail_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Detail Description <span class="text-danger">*</span></label>
                                    <input type="text" name="en_detail_text" id="en_detail_text"
                                           class="form-control @error('en_detail_text') is-invalid @enderror"
                                           value="{{ old('en_detail_text') }}"
                                           placeholder="Enter sub category detail description in English">
                                    @error('en_detail_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" name="ar_tag_title" id="ar_tag_title"
                                           class="form-control @error('ar_tag_title') is-invalid @enderror"
                                           value="{{ old('ar_tag_title') }}" placeholder="Enter sub category meta title in Arabic">
                                    @error('ar_tag_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" name="en_tag_title" id="en_tag_title"
                                           class="form-control @error('en_tag_title') is-invalid @enderror"
                                           value="{{ old('en_tag_title') }}" placeholder="Enter sub category meta title in English">
                                    @error('en_tag_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Meta Description <span class="text-danger">*</span></label>
                                    <textarea name="ar_tag_description" rows="4"
                                              class="form-control @error('ar_tag_description') is-invalid @enderror"
                                              placeholder="Enter sub category meta description in Arabic">{{ old('ar_tag_description') }}</textarea>
                                    @error('ar_tag_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Meta Description <span class="text-danger">*</span></label>
                                    <textarea name="en_tag_description" rows="4"
                                              class="form-control @error('en_tag_description') is-invalid @enderror"
                                              placeholder="Enter sub category meta description in English">{{ old('en_tag_description') }}</textarea>
                                    @error('en_tag_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Category <span class="text-danger">*</span></label>
                                    <select name="new_article_catrgory_id"
                                            class="form-control @error('new_article_catrgory_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('new_article_catrgory_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->ar_title }} - {{ $category->en_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('new_article_catrgory_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Banner Image <span class="text-danger">*</span></label>
                            <div class="border rounded p-3 bg-light">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span style="font-size: 2rem;">📸</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="file" name="banner_image" id="image"
                                               class="form-control @error('banner_image') is-invalid @enderror"
                                               accept="image/*">
                                        <small class="text-muted mt-1 d-block">
                                            Supported formats: JPG, JPEG, PNG, WEBP (Max: 2MB)
                                        </small>
                                    </div>
                                </div>
                                @error('banner_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="border-top pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('articleSubCategory.index') }}" class="btn btn-outline-secondary">
                                    <span class="me-1">←</span> Back to Sub Categories
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <span class="me-1">💾</span> Create Sub Category
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
