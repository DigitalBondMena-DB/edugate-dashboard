@extends('backend.layouts.app')

@php $pageTitle = 'اضف مشرف'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-white">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admins.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                    </div>
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Role</label>
                                        <select name="role" class="form-control">
                                            <option value="">Select Role</option>
                                            <option value="super-admin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    @if($errors->has('role'))
                                        <span class="text-danger">{{ $errors->first('role') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Admin Status</label>
                                        <select name="admin_status" class="form-control">
                                            <option value="">Select admin status</option>
                                            <option value="1">Admin of Managemant</option>
                                            <option value="0">Admin of CRM</option>
                                        </select>
                                    </div>
                                    @if($errors->has('admin_status'))
                                        <span class="text-danger">{{ $errors->first('admin_status') }}</span>
                                    @endif
                                </div>

                            </div>
                        <button type="submit" class="btn btn-primary pull-right">اضف مشرف</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection