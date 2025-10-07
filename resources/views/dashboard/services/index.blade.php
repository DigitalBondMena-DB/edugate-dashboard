@extends('dashboard.layouts.master')

@php $pageTitle = 'Testimonials Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (Session::has('flash_message'))
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light border-0">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-6">
                            <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                        </div>
                        <div class="col-md-4 col-6 text-end">
                            <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('service.create') }}">
                                <i class="fas fa-plus me-2"></i> Add New Testimonial
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (count($rows))
                            <table class="table table-hover align-middle mb-0 fixed-table clean-head">

                                <colgroup>
                                    <col style="width:6%">
                                    <col style="width:28%">
                                    <col style="width:28%">
                                    <col style="width:16%">
                                    <col style="width:22%">
                                </colgroup>

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name (AR)</th>
                                        <th class="text-center">Name (EN)</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($rows as $feedback)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $feedback->id }}</span>
                                            </td>

                                            <td class="text-center text-wrap-cell">{{ $feedback->ar_name }}</td>
                                            <td class="text-center text-wrap-cell">{{ $feedback->en_name }}</td>

                                            <td class="text-center">
                                                <img src="{{ asset('service/' . $feedback->image) }}" alt="Feedback Image"
                                                    class="rounded border shadow-sm slider-thumbnail"
                                                    style="width:96px;height:64px;object-fit:cover;cursor:pointer"
                                                    data-bs-toggle="modal" data-bs-target="#imageModal{{ $feedback->id }}">
                                                {{-- Image Modal --}}
                                                <div class="modal fade" id="imageModal{{ $feedback->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><i class="fas fa-image me-2"></i>
                                                                    Image Preview</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center p-0">
                                                                <img src="{{ asset('service/' . $feedback->image) }}"
                                                                    class="img-fluid rounded"
                                                                    style="max-height:70vh;object-fit:contain"
                                                                    alt="Full Size Feedback Image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center actions-cell">
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('service.edit', $feedback->id) }}"
                                                        class="btn btn-outline-primary btn-sm" title="Edit">
                                                        ✏️
                                                    </a>

                                                    @if ($feedback->active === 'activated')
                                                        <form action="{{ route('service.toggleStatus', $feedback->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                title="Deactivate"
                                                                onclick="return confirm('Are you sure you want to deactivate this Feedback?');">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('service.toggleStatus', $feedback->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                title="Activate"
                                                                onclick="return confirm('Are you sure you want to activate this Feedback?');">
                                                                <i class="fa-solid fa-eye-slash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                        style="width:100px;height:100px;">
                                        <span style="font-size:3rem;">🎨</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-3">No Testimonials Available</h5>
                                <a href="{{ route('service.create') }}" class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2 fw-bold">+</span> Create First Testimonial
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('dashboard.includes.pagination')

    <style>
        .fixed-table {
            table-layout: fixed;
            width: 100%;
        }

        .fixed-table th,
        .fixed-table td {
            vertical-align: middle;
        }

        .clean-head thead th {
            border-bottom: 0 !important;
        }

        .clean-head tbody td {
            border-top: 1px solid #eee;
        }

        .text-wrap-cell {
            white-space: normal;
            word-wrap: break-word;
            overflow-wrap: anywhere;
            line-height: 1.5;
        }

        .actions-cell {
            min-width: 160px;
            white-space: nowrap;
        }

        .slider-thumbnail {
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .slider-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(0, 0, 0, .22);
        }

        @media (max-width: 991px) {
            .actions-cell {
                min-width: 130px;
            }
        }
    </style>
@endsection