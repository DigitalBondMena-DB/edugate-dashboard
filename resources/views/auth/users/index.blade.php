@extends('dashboard.layouts.master')

@php $pageTitle = 'Users Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (Session::has('flash_message'))
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @elseif (Session::has('flash_error'))
                <div class="alert alert-danger">{{ Session::get('flash_error') }}</div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light border-0">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-6">
                            <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                        </div>
                        <div class="col-md-4 col-6 text-end">
                            <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('users.create') }}">
                                <i class="fas fa-plus me-2"></i> Add New User
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Filter Bar --}}
                <form method="GET" action="{{ route('users.index') }}" class="px-3 py-3 border-bottom">
                    <div class="row g-2 align-items-center">
                        <div class="col-md-6">
                            <input type="text" name="q" class="form-control" placeholder="Search name or email..."
                                value="{{ $search ?? request('q') }}">
                        </div>

                        <div class="col-md-2">
                            <select name="role" class="form-control">
                                <option value="">All Roles</option>
                                <option value='admin' @selected((string) ($role ?? request('role')) === 'admin')>Admin</option>
                                <option value='writer' @selected((string) ($role ?? request('role')) === 'writer')>Writer</option>
                                <option value='other' @selected((string) ($role ?? request('role')) === 'other')>Other..</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="status" class="form-control">
                                <option value="">All Statuses</option>
                                <option value=1 @selected((string) ($status ?? request('status')) === 1)>Activated</option>
                                <option value=0 @selected((string) ($status ?? request('status')) === 0)>Deactivated</option>
                            </select>
                        </div>

                        <div class="col-md-2 d-flex gap-2">


                            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i></button>
                            <a href="{{ route('users.index') }}" class="btn btn-light w-100"><i class="fas fa-sync"></i></a>
                        </div>
                    </div>
                </form>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (count($rows))
                            <table class="table table-hover align-middle mb-0 fixed-table clean-head">

                                <colgroup>
                                    <col style="width:10%">
                                    <col style="width:25%">
                                    <col style="width:25%">
                                    <col style="width:15%">
                                    <col style="width:15%">
                                </colgroup>

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($rows as $user)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $user->id }}</span>
                                            </td>

                                            <td class="text-center text-wrap-cell">
                                                {{ strlen($user->ar_name) > 150 ? '...' . Str::substr($user->ar_name, 0, 150) : ($user->ar_name ?: '-') }}
                                            </td>
                                            <td class="text-center text-wrap-cell">
                                                {{ strlen($user->email) > 150 ? '...' . Str::substr($user->email, 0, 150) : ($user->email ?: '-') }}
                                            </td>

                                            <td class="text-center actions-cell">
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <form action="{{ route('users.changeRole', $user->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="role" id="role" class="form-control"
                                                            onchange="this.form.submit()">
                                                            {{-- current role --}}
                                                            @if($user->role != 'admin' && $user->role != 'writer')
                                                                <option class="text-center" disabled selected>{{ $user->role }}</option>
                                                            @endif
                                                            <option class="text-center" value="admin" @selected($user->role == 'admin')>Admin</option>
                                                            <option class="text-center" value="writer" @selected($user->role == 'writer')>Writer</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </td>



                                            <td class="text-center actions-cell">
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-outline-primary btn-sm" title="Edit">✏️</a>

                                                    @if ($user->status == 1)
                                                        <form action="{{ route('users.toggleStatus', $user->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                title="Deactivate"
                                                                onclick="return confirm('Deactivate this User?');">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('users.toggleStatus', $user->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                title="Activate"
                                                                onclick="return confirm('Activate this User?');">
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
                                <h5 class="text-muted mb-3">No Users Available</h5>
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2 fw-bold">+</span> Create New User
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
