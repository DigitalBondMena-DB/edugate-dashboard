@extends('dashboard.layouts.master')

@php $pageTitle = 'Partners Control'; @endphp

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
                            <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('clients.create') }}">
                                <i class="fas fa-plus me-2"></i> Add New Partner
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (count($rows))
                            <table class="table table-hover align-middle mb-0 fixed-table">
                                <colgroup>
                                    <col style="width:6%">
                                    <col style="width:32%">
                                    <col style="width:32%">
                                    <col style="width:15%">
                                    <col style="width:15%">
                                </colgroup>
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name (AR)</th>
                                        <th class="text-center">Name (EN)</th>
                                        <th class="text-center">Logo</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $partner)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $partner->id }}</span>
                                            </td>
                                            <td class="text-center fw-bold text-dark">{{ $partner->ar_name }}</td>
                                            <td class="text-center fw-bold text-dark">{{ $partner->en_name }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('clients/' . $partner->logo) }}" alt="Partner Logo"
                                                    class="rounded border shadow-sm slider-thumbnail"
                                                    style="width:80px;height:50px;object-fit:cover;cursor:pointer"
                                                    data-bs-toggle="modal" data-bs-target="#imageModal{{ $partner->id }}">
                                                <!-- Modal -->
                                                <div class="modal fade" id="imageModal{{ $partner->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><i class="fas fa-image me-2"></i>
                                                                    Logo Preview</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center p-0">
                                                                <img src="{{ asset('clients/' . $partner->logo) }}"
                                                                    class="img-fluid rounded"
                                                                    style="max-height:70vh;object-fit:contain"
                                                                    alt="Full Partner Logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('clients.edit', $partner->id) }}"
                                                        class="btn btn-outline-primary btn-sm" title="Edit Partner"><i
                                                            class="fas fa-edit"></i></a>

                                                    <form action="{{ route('clients.toggleStatus', $partner->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($partner->active === 'activated')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                title="Deactivate Partner"
                                                                onclick="return confirm('Deactivate this partner?');">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                title="Activate Partner"
                                                                onclick="return confirm('Activate this partner?');">
                                                                <i class="fa-solid fa-eye-slash"></i>
                                                            </button>
                                                        @endif
                                                    </form>
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
                                <h5 class="text-muted mb-3">No Partners Available</h5>
                                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2 fw-bold">+</span> Create First Partner
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
        }

        .slider-thumbnail {
            transition: all .3s ease;
        }

        .slider-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, .2);
        }

        .fixed-table {
            table-layout: fixed;
        }
    </style>
@endsection