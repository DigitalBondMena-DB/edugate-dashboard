@extends('dashboard.layouts.master')

@php $pageTitle = 'Study Abroad Control'; @endphp

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
                    <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (count($rows))
                            <table class="table table-hover align-middle mb-0 fixed-table clean-head">

                                <colgroup>
                                    <col style="width:8%">
                                    <col style="width:20%">
                                    <col style="width:20%">
                                    <col style="width:16%">
                                    <col style="width:16%">
                                    <col style="width:10%">
                                    <col style="width:10%">
                                </colgroup>

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">seen</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($rows as $study_abroad)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $study_abroad->id }}</span>
                                            </td>

                                            <td class="text-center text-wrap-cell">
                                                {{ strlen($study_abroad->name) > 20 ? substr($study_abroad->name, 0, 20) . '...' : $study_abroad->name }}
                                            </td>

                                            <td class="text-center text-wrap-cell">
                                                @if ($study_abroad->email)
                                                    <a href="mailto:{{ $study_abroad->email }}"
                                                        class="link-dark text-decoration-underline">
                                                        {{ strlen($study_abroad->email) > 20 ? substr($study_abroad->email, 0, 20) . '...' : $study_abroad->email }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>

                                            <td class="text-center text-wrap-cell">
                                                @if ($study_abroad->phone)
                                                    <a href="tel:{{ preg_replace('/\s+/', '', $study_abroad->phone) }}"
                                                        class="link-dark">
                                                        {{ $study_abroad->phone }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                {{ $study_abroad->country ??'—' }}
                                            </td>

                                            <td class="text-center">
                                                @if ($study_abroad->seen)
                                                    <span class="badge bg-success rounded-pill">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger rounded-pill">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="text-center actions-cell">
                                                <a href="{{ route('study_abroad.show', $study_abroad->id) }}"
                                                    class="btn btn-outline-primary btn-sm" title="Show">
                                                    👀
                                                </a>
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
                                        <span style="font-size:3rem;">💬</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-0">No Feedbacks Available</h5>
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
            min-width: 90px;
            white-space: nowrap;
        }

        .req-type-badge {
            background: var(--brand-50);
            border: 1px solid var(--brand-200);
            color: var(--brand-700);
            font-weight: 600;
            padding: .35rem .55rem;
        }

        @media (max-width: 991px) {
            .actions-cell {
                min-width: 80px;
            }
        }
    </style>
@endsection
