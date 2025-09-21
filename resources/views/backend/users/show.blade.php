@extends('backend.layouts.app')

@php $pageTitle = 'المستحدمين'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

        @if (auth()->user()->role === 'super-admin')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-white">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $row->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $row->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Mobile Number</label>
                                        <input type="number" name="mobile" class="form-control" value="{{ $row->phone }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="number" name="address" class="form-control" value="{{ $row->address }}" readonly>
                                    </div>
                                </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    </div>
                </div>
            </div>     
        @endif

        @if (auth()->user()->role === 'admin')
            @if (auth()->user()->admin_status == 1)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title text-white">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $row->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" name="email" class="form-control" value="{{ $row->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Mobile Number</label>
                                            <input type="number" name="mobile" class="form-control" value="{{ $row->phone }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Address</label>
                                            <input type="number" name="address" class="form-control" value="{{ $row->address }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            <div class="clearfix"></div>
                        </div>
                        </div>
                    </div>
                </div>              
            @else
                <h3>Access Denied</h3>              
            @endif
        @endif
@endsection