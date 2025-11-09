@extends('dashboard.layouts.master')

@php $pageTitle = 'Add User'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header card-header-primary">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        {{-- Titles --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="Enter Name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="Enter Email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"
                                    placeholder="Enter Password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}"
                                    placeholder="Enter Password Confirmation" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        {{-- Role & Status --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Role <span class="text-danger">*</span></label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="">Select a Role</option>
                                    <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                                    <option value="writer" @selected(old('role') === 'writer')>Writer</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="">Select a Status</option>
                                    <option value="1" @selected(old('status') === '1')>Active</option>
                                    <option value="0" @selected(old('status') === '0')>Not Active</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="border-top pt-4 mt-4 d-flex justify-content-between align-items-center">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                                <span class="me-1">←</span> Back to Users
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <span class="me-1">💾</span> Create User
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
