@extends('dashboard.layouts.master')

@php $pageTitle = 'Privacy Policy Control'; @endphp

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
                        @if (!empty($data))

                            <table class="table table-hover align-middle mb-0 fixed-table clean-head">
                                <colgroup>
                                    <col style="width: 40%;">
                                    <col style="width: 40%;">
                                    <col style="width: 20%;">
                                </colgroup>
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Content (AR)</th>
                                        <th class="text-center">Content (EN)</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        {{-- Content AR --}}
                                        <td class="text-center">
                                            <div class="pre-wrap" dir="rtl">{{ $data->ar_content }}</div>
                                        </td>

                                        {{-- Content EN --}}
                                        <td class="text-center">
                                            <div class="pre-wrap" dir="ltr">{{ $data->en_content }}</div>
                                        </td>

                                        {{-- Actions --}}
                                        <td class="text-center">
                                            <a href="{{ route('privacy-policy.edit') }}" class="btn btn-outline-primary btn-sm"
                                                title="Edit Contact Information">
                                                ✏️
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                        style="width:100px;height:100px;">
                                        <span style="font-size:3rem;">📇</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-3">No Privacy Policy Available</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .fixed-table {
            table-layout: fixed;
        }

        .clean-head thead th,
        .clean-head thead td {
            border-bottom: 0 !important;
        }

        .clean-head tbody td {
            border-top: 1px solid #eee;
        }


        .pre-wrap {
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow-wrap: anywhere;
            line-height: 1.6;
            min-height: 48px;
            padding-block: 6px;
        }


        :root {

            --brand-50: #f5f0fa;
            --brand-200: #e4d7f1;
            --brand-600: #7e5fa6;
            --brand-700: #5d4a6b;
        }

        .phone-badge {
            background: var(--brand-50);
            border: 1px solid var(--brand-200);
            color: var(--brand-700);
            font-weight: 600;
            text-decoration: none;
            padding: .35rem .55rem;
        }

        .phone-badge:hover {
            background: var(--brand-200);
            color: #231f2b;
        }
    </style>
@endsection
