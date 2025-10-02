@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit Why Us Field'; @endphp

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
                    <form action="{{ route('why-us.update', $field->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Arabic Text <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="field_ar"
                                class="form-control @error('field_ar') is-invalid @enderror"
                                value="{{ old('field_ar', $field->field_ar) }}" placeholder="Enter Arabic text">
                            @error('field_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">English Text <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="field_en"
                                class="form-control @error('field_en') is-invalid @enderror"
                                value="{{ old('field_en', $field->field_en) }}" placeholder="Enter English text">
                            @error('field_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="border-top pt-4 d-flex justify-content-between">
                            <a href="{{ route('why-us.index') }}" class="btn btn-outline-secondary">
                                ← Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                💾 Update Field
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection