@extends('dashboard.layouts.master')

@php $pageTitle = 'Sub Categories Control'; @endphp

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
                            <a class="btn btn-white btn-round shadow-sm px-4"
                                href="{{ route('articleSubCategory.create') }}">
                                <i class="fas fa-plus me-2"></i> Add New Sub Category
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Filter bar --}}
                <div class="border-bottom px-3 py-3">
                    <div class="row align-items-center g-2">
                        <div class="col-md-3">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="0">All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == (request()->category_id ?? null) ? 'selected' : '' }}>
                                        {{ $category->ar_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (count($rows))
                            <table class="table table-hover align-middle mb-0 fixed-table clean-head">

                                <colgroup>
                                    <col style="width:8%">
                                    <col style="width:37%">
                                    <col style="width: 37%">
                                    <col style="width:18%">
                                </colgroup>

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Title (AR)</th>
                                        <th class="text-center">Title (EN)</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($rows as $subCategory)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $subCategory->id }}</span>
                                            </td>

                                            <td class="text-start text-wrap-cell" dir="rtl">
                                                {{ $subCategory->ar_title }}
                                            </td>

                                            <td class="text-start text-wrap-cell" dir="ltr">
                                                {{ $subCategory->en_title }}
                                            </td>

                                            <td class="text-center actions-cell">
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('articleSubCategory.edit', $subCategory->id) }}"
                                                        class="btn btn-outline-primary btn-sm"
                                                        title="Edit Sub Category">✏️</a>

                                                    @if ($subCategory->active === 'activated')
                                                        <form
                                                            action="{{ route('articleSubCategory.toggleStatus', $subCategory->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                title="Deactivate Sub Category"
                                                                onclick="return confirm('Are you sure you want to deactivate this sub category?');">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form
                                                            action="{{ route('articleSubCategory.toggleStatus', $subCategory->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                title="Activate Sub Category"
                                                                onclick="return confirm('Are you sure you want to activate this sub category?');">
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
                                <h5 class="text-muted mb-3">No Sub Categories Available</h5>
                                <a href="{{ route('articleSubCategory.create') }}"
                                    class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2 fw-bold">+</span> Create First Sub Category
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.includes.pagination')

    @push('page_js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sel = document.getElementById('category_id');
                if (!sel) return;
                sel.addEventListener('change', function() {
                    const id = this.value;
                    const url = new URL('{{ route('articleSubCategory.index') }}', window.location.origin);
                    if (id && id !== '0') url.searchParams.set('category_id', id);
                    window.location.href = url.toString();
                });
            });
        </script>
    @endpush

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
            padding-block: 6px;
            min-height: 48px;
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
