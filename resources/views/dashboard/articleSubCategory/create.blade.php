@extends('dashboard.layouts.master')

@php $pageTitle = 'Add New Sub Category'; @endphp

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
                                    <label class="form-label fw-bold text-dark">Arabic Title <span
                                            class="text-danger">*</span></label>
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
                                    <label class="form-label fw-bold text-dark">English Title <span
                                            class="text-danger">*</span></label>
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
                                    <label class="form-label fw-bold text-dark">Arabic Tag Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_tag_title" id="ar_tag_title"
                                        class="form-control @error('ar_tag_title') is-invalid @enderror"
                                        value="{{ old('ar_tag_title') }}" placeholder="Enter sub category title in Arabic">
                                    @error('ar_tag_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Tag Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_tag_title" id="en_tag_title"
                                        class="form-control @error('en_tag_title') is-invalid @enderror"
                                        value="{{ old('en_tag_title') }}" placeholder="Enter sub category title in English">
                                    @error('en_tag_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Arabic Tag Description <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="ar_tag_description" id="ar_tag_description"
                                        class="form-control @error('ar_tag_description') is-invalid @enderror"
                                        value="{{ old('ar_tag_description') }}"
                                        placeholder="Enter sub category title in Arabic">
                                    @error('ar_tag_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">English Tag Description <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_tag_description" id="en_tag_description"
                                        class="form-control @error('en_tag_description') is-invalid @enderror"
                                        value="{{ old('en_tag_description') }}"
                                        placeholder="Enter sub category title in English">
                                    @error('en_tag_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Category <span
                                            class="text-danger">*</span></label>
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
