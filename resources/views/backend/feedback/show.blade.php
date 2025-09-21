@extends('backend.layouts.app')

@php $pageTitle = 'User Feedback'; @endphp

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
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name </label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $row->name}}" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email </label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{ $row->email }}" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone </label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $row->phone }}" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Request type </label>
                                        <input type="text" name="request_type" id="request_type" class="form-control" value="{{ $row->request_type }}" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Message </label>
                                        <textarea cols="10" rows="20" name="message" id="message" class="form-control" disabled>{{ $row->message }}</textarea>
                                    </div>
                                </div>                                
            
                            </div>
                        <div class="clearfix"></div>
                        </form>
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
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name </label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $row->name}}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email </label>
                                            <input type="text" name="email" id="email" class="form-control" value="{{ $row->email }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Phone </label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $row->phone }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Request type </label>
                                            <input type="text" name="request_type" id="request_type" class="form-control" value="{{ $row->request_type }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"> Message </label>
                                            <textarea cols="10" rows="20" name="message" id="message" class="form-control" disabled>{{ $row->message }}</textarea>
                                        </div>
                                    </div>                                
                
                                </div>
                            <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h3>Access Denied</h3>
        @endif
    @endif
@endsection