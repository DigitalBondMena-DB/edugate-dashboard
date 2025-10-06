@extends('dashboard.layouts.master')

@php $pageTitle = 'Articles Control'; @endphp

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
                            <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('newArticle.create') }}">
                                <i class="fas fa-plus me-2"></i> Add New Article
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Filter Bar --}}
                <form method="GET" action="{{ route('newArticle.index') }}" class="px-3 py-3 border-bottom">
                    <div class="row g-2 align-items-center">
                        <div class="col-md-4">
                            <input type="text" name="q" class="form-control" placeholder="Search title or slug..."
                                value="{{ $search ?? request('q') }}">
                        </div>

                        <div class="col-md-4">
                            <select name="sub_category_id" class="form-control">
                                <option value="0">All Sub Categories</option>
                                @foreach ($subCategories as $sc)
                                    <option value="{{ $sc->id }}" @selected((string) ($subId ?? request('sub_category_id')) === (string) $sc->id)>
                                        {{ $sc->ar_title }} @if ($sc->en_title)
                                            - {{ $sc->en_title }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="status" class="form-control">
                                <option value="">All Statuses</option>
                                <option value="1" @selected((string) ($status ?? request('status')) === '1')>Activated</option>
                                <option value="0" @selected((string) ($status ?? request('status')) === '0')>Deactivated</option>
                            </select>
                        </div>

                        <div class="col-md-2 d-flex gap-2">


                            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i></button>
                            <a href="{{ route('newArticle.index') }}" class="btn btn-light w-100"><i
                                    class="fas fa-sync"></i></a>
                        </div>
                    </div>
                </form>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (count($rows))
                            <table class="table table-hover align-middle mb-0 fixed-table clean-head">

                                <colgroup>
                                    <col style="width:8%">
                                    <col style="width:26%">
                                    <col style="width:26%">
                                    <col style="width:15%">
                                    <col style="width:18%">
                                </colgroup>

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Title (AR)</th>
                                        <th class="text-center">Title (EN)</th>
                                        <th class="text-center">Article Image</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($rows as $article)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $article->id }}</span>
                                            </td>

                                            <td class="text-start text-wrap-cell">
                                                {{ ($article->ar_title > 30) ? ('...' . Str::substr($article->ar_title, 0, 30)) : ($article->ar_title ?: '-') }}
                                            </td>
                                            <td class="text-start text-wrap-cell">
                                                {{ ($article->en_title > 30) ? (Str::substr($article->en_title, 0, 30) . '...') : ($article->en_title ?: '-') }}
                                            </td>
                                            <td class="text-center">

                                                <img src="{{ asset('newArticle/' . $article->main_image) }}"
                                                    alt="Article Image" class="rounded border shadow-sm slider-thumbnail"
                                                    style="width:96px;height:64px;object-fit:cover;cursor:pointer"
                                                    data-bs-toggle="modal" data-bs-target="#imageModal{{ $article->id }}">

                                                <div class="modal fade" id="imageModal{{ $article->id }}" tabindex="-1"
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
                                                                <img src="{{ asset('newArticle/' . $article->main_image) }}"
                                                                    class="img-fluid rounded"
                                                                    style="max-height:70vh;object-fit:contain"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center actions-cell">
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('newArticle.edit', $article->id) }}"
                                                        class="btn btn-outline-primary btn-sm" title="Edit">✏️</a>

                                                    @if ($article->status == 1)
                                                        <form action="{{ route('newArticle.toggleStatus', $article->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                title="Deactivate"
                                                                onclick="return confirm('Deactivate this Article?');">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('newArticle.toggleStatus', $article->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                title="Activate"
                                                                onclick="return confirm('Activate this Article?');">
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
                                        <span style="font-size:3rem;">📝</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-3">No Articles Available</h5>
                                <a href="{{ route('newArticle.create') }}"
                                    class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2 fw-bold">+</span> Create New Article
                                </a>
                            </div>
                        @endif
                    </div>
                </div>


                @if ($rows->hasPages())
                    <div class="card-footer bg-transparent border-0 py-3">
                        <div class="d-flex justify-content-center">
                            {{ $rows->withQueryString()->onEachSide(1)->links() }}
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>

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
