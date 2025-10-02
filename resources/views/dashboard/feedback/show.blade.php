@extends('dashboard.layouts.master')

@php $pageTitle = 'Show Feedback'; @endphp

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
                        <input type="text" class="form-control" value="{{ $feedback->name }}" disabled
                            aria-disabled="true">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Email</label>
                        <input type="text" class="form-control" value="{{ $feedback->email }}" disabled
                            aria-disabled="true">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Phone</label>
                        <input type="text" class="form-control" value="{{ $feedback->phone }}" disabled
                            aria-disabled="true">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark d-block">Request Type</label>
                        <input type="text" class="form-control" value="{{ $feedback->request_type }}" disabled
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