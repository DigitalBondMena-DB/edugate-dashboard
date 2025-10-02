@extends('dashboard.layouts.master')

@php $pageTitle = 'Event Categories'; @endphp

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
                            <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('event-categery.create') }}">
                                <i class="fas fa-plus me-2"></i> Add Category
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if ($rows->count())
                            <table class="table table-hover align-middle mb-0 fixed-table clean-head">

                                <colgroup>
                                    <col style="width:6%">
                                    <col style="width:18%">
                                    <col style="width:18%">
                                    <col style="width:20%">
                                    <col style="width:20%">
                                    <col style="width:18%">
                                </colgroup>

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Title (AR)</th>
                                        <th class="text-center">Title (EN)</th>
                                        <th class="text-center">Description (AR)</th>
                                        <th class="text-center">Description (EN)</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($rows as $row)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $row->id }}</span>
                                            </td>

                                            <td class="text-start text-wrap-cell">
                                                {{ $row->ar_name ?? '-' }}
                                            </td>

                                            <td class="text-start text-wrap-cell">
                                                {{ $row->en_name ?? '-' }}
                                            </td>

                                            <td class="text-start text-wrap-cell">
                                                {{ strlen($row->ar_description) > 20 ? substr($row->ar_description, 0, 20) . '...' : $row->ar_description ?? '-' }}
                                            </td>

                                            <td class="text-start text-wrap-cell">
                                                {{ strlen($row->en_description) > 20 ? substr($row->en_description, 0, 20) . '...' : $row->en_description ?? '-' }}
                                            </td>

                                            <td class="text-center actions-cell">
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('event-categery.edit', $row->id) }}"
                                                        class="btn btn-outline-primary btn-sm" title="Edit">✏️</a>

                                                    <form action="{{ route('event-categery.toggleStatus', $row->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf @method('PATCH')
                                                        @if (($row->active ?? null) === 'activated')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                onclick="return confirm('Deactivate this category?');"
                                                                title="Deactivate">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                onclick="return confirm('Activate this category?');"
                                                                title="Activate">
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
                                        <span style="font-size:3rem;">🧩</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-3">No Categories</h5>
                                <p class="text-muted mb-4">Create your first event category with its gallery.</p>
                                <a href="{{ route('event-categery.create') }}"
                                    class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2">+</span> Add Category
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

        .cover-thumb {
            width: 96px;
            height: 64px;
            object-fit: cover;
        }

        .actions-cell {
            min-width: 150px;
            white-space: nowrap;
        }

        @media (max-width: 991px) {
            .actions-cell {
                min-width: 130px;
            }
        }
    </style>
@endsection