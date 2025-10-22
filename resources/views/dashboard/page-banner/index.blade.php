@extends('dashboard.layouts.master')

@php $pageTitle = 'Banners Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light border-0">
                    <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (!empty($row))
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 25%;">Title</th>
                                        <th class="text-center" style="width: 20%;">Alt (AR)</th>
                                        <th class="text-center" style="width: 20%;">Alt (EN)</th>
                                        <th class="text-center" style="width: 15%;">Image</th>
                                        <th class="text-center" style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($row as $banner)
                                        <tr>
                                            <td class="text-center fw-bold text-dark">{{ $banner->title }}</td>
                                            <td class="text-center fw-bold text-dark">{{ $banner->ar_alt }}</td>
                                            <td class="text-center fw-bold text-dark">{{ $banner->en_alt }}</td>

                                            <td class="text-center">
                                                <img class="rounded border shadow-sm slider-thumbnail"
                                                    style="width: 80px; height: 50px; object-fit: cover; cursor: pointer;"
                                                    src="{{ asset('banners/' . $banner->image) }}" alt="Banner Image"
                                                    data-bs-toggle="modal" data-bs-target="#imageModal{{ $banner->id }}">

                                                {{-- Image Modal --}}
                                                <div class="modal fade" id="imageModal{{ $banner->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    <i class="fas fa-image me-2"></i> Banner Preview
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center p-0">
                                                                <img src="{{ asset('banners/' . $banner->image) }}"
                                                                    class="img-fluid rounded"
                                                                    style="max-height: 70vh; object-fit: contain;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('page-banners.edit', $banner->id) }}"
                                                    class="btn btn-outline-primary btn-sm" title="Edit"
                                                    data-bs-toggle="tooltip">
                                                    ✏️
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                        style="width: 100px; height: 100px;">
                                        <span style="font-size: 3rem;">🎨</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-0">No Banners Available</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .slider-thumbnail {
            transition: all 0.3s ease-in-out;
        }

        .slider-thumbnail:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }
    </style>
@endsection
