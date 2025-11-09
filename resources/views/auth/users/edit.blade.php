@extends('dashboard.layouts.master')

@php $pageTitle = 'Edit User'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @if (Session::has('flash_message'))
                <div class="alert alert-success mb-3">{{ Session::get('flash_message') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header card-header-primary">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- ================= Name / Email ================= --}}
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark">Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name',$user->ar_name) }}" placeholder="Enter Name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email',$user->email) }}" placeholder="Enter Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>

                                </div>


                        {{-- ================= Role / Status ================= --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Role <span
                                            class="text-danger">*</span></label>
                                            <select name="role" class="form-select @error('role') is-invalid @enderror">
                                                <option value="">select role</option>
                                                <option value="admin"
                                                {{ (string) old('role',$user->role) === 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="writer"
                                            {{ (string) old('role',$user->role) === 'writer' ? 'selected' : '' }}>Writer
                                        </option>
                                    </select>
                                    @if($user->role != 'admin' && $user->role != 'writer')
                                        <div class="text-primary fw-bold mt-2">current role: {{ "($user->role)" }}</div>
                                    @endif
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="">select status</option>
                                        <option value="1"
                                            {{ (string) old('status',$user->status) === '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0"
                                            {{ (string) old('status',$user->status) === '0' ? 'selected' : '' }}>Not Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="border-top pt-4 d-flex justify-content-between">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">← Back</a>
                            <button type="submit" class="btn btn-primary px-4">💾 Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
