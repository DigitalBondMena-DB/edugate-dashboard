@extends('dashboard.layouts.master')

@php $pageTitle = 'Event Categories'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row align-items-center">
                    <div class="col-md-8 col-6">
                        <div class="d-flex align-items-center">
                            <div>
                                <h4 class="card-title text-dark mb-1">{{ $pageTitle }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 text-end">
                        <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('event-categery.create') }}">
                            <i class="fas fa-plus me-2"></i>
                            Add Category
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    @if($rows->count())
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width:70px;">#</th>
                                    <th class="text-center" style="width:25%;">Title (AR)</th>
                                    <th class="text-center" style="width:25%;">Title (EN)</th>
                                    <th class="text-center" style="width:140px;">Cover</th>
                                    <th class="text-center" style="width:120px;">Status</th>
                                    <th class="text-center" style="width:160px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge bg-success rounded-pill">{{ $row->id }}</span>
                                        </td>

                                        <td>
                                            <div class="text-center text-dark fw-bold">
                                                {{ $row->ar_title ?? $row->ar_name ?? '-' }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-center text-dark fw-bold">
                                                {{ $row->en_title ?? $row->en_name ?? '-' }}
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            @if(!empty($row->image))
                                                <img src="{{ asset('event_categery/'.$row->image) }}"
                                                     alt="cover"
                                                     class="rounded border shadow-sm"
                                                     style="width:90px; height:60px; object-fit:cover;">
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if(($row->active ?? null) === 'activated')
                                                <span class="badge bg-primary">Activated</span>
                                            @else
                                                <span class="badge bg-secondary">Deactivated</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('event-categery.edit', $row->id) }}" class="text-decoration-none">
                                                    <button class="btn btn-outline-primary btn-sm" title="Edit">✏️</button>
                                                </a>

                                                <form action="{{ route('event-categery.toggleStatus', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    @if(($row->active ?? null) === 'activated')
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

                        <div class="px-3 py-3 border-top mt-2 d-flex justify-content-center">
                            {{ $rows->links('pagination::custom-bootstrap4') }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                    style="width: 100px; height: 100px;">
                                    <span style="font-size: 3rem;">🧩</span>
                                </div>
                            </div>
                            <h5 class="text-muted mb-3">No Categories</h5>
                            <p class="text-muted mb-4">Create your first event category with its gallery.</p>
                            <a href="{{ route('event-categery.create') }}" class="btn btn-primary btn-round shadow-sm px-4">
                                <span class="me-2">+</span> Add Category
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
