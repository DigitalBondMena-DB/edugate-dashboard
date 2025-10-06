@extends('dashboard.layouts.master')

@php $pageTitle = 'Show Study Abroad Requests'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header card-header-primary">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                    </div>
                </div>

                <div class="card-body p-4 no-interact">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Name</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->name }}" disabled
                            aria-disabled="true">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Email</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->email }}" disabled
                            aria-disabled="true">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Phone</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->phone }}" disabled
                            aria-disabled="true">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark d-block">Nationality</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->nationality }}" disabled
                            aria-disabled="true">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark d-block">Country</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->country }}" disabled
                            aria-disabled="true">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark d-block">Degree</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->degree }}" disabled
                            aria-disabled="true">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark d-block">Academic Level</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->academic_level }}" disabled
                            aria-disabled="true">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark d-block">GPA</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->gpa }}" disabled
                            aria-disabled="true">
                    </div>
                    <div class="mb4">
                        <label class="form-label fw-bold text-dark d-block">Specialization</label>
                        <input type="text" class="form-control" value="{{ $study_abroad->specialization }}" disabled
                            aria-disabled="true">
                    </div>

                </div>
                <div class="border-top p-3">
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-outline-secondary">
                        <span class="me-1">←</span> Back
                    </a>
                </div>
        </div>
    </div>

    <style>
        .no-interact {
            pointer-events: none;
        }

        .no-interact input,
        .no-interact textarea,
        .no-interact select {
            background: #f8f9fa !important;
            color: #495057 !important;
            cursor: default !important;
            user-select: text;
        }
    </style>
@endsection