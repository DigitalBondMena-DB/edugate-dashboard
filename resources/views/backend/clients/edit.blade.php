@extends('backend.layouts.app')

@php $pageTitle = 'Edit Partner Data'; @endphp

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
                        <form action="{{ route('clients.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name in Arabic </label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $row->ar_name }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Link</label>
                                        <input type="text" name="link" id="link" class="form-control" value="{{ $row->link }}">
                                    </div>
                                    @if($errors->has('link'))
                                        <span class="text-danger">{{ $errors->first('link') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div >
                                        <label class="bmd-label-floating">Logo</label>
                                        <input type="file" name="logo" id="logo">
                                        @if($row->logo !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('clients/' . $row->logo) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('logo'))
                                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                                    @endif
                                </div>

                              

                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Partner</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection