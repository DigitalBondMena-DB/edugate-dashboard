@extends('backend.layouts.app')

@php $pageTitle = 'Add Destination'; @endphp

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
                        <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name in English</label>
                                        <input type="text" name="en_name" id="en_name" class="form-control" value="{{ old('en_name') }}">
                                    </div>
                                    @if($errors->has('en_name'))
                                        <span class="text-danger">{{ $errors->first('en_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name in Arabic</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ old('ar_name') }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Short content in English</label>
                                        <input type="text" name="en_short_content" id="en_short_content" class="form-control" value="{{ old('en_short_content') }}">
                                    </div>
                                    @if($errors->has('en_short_content'))
                                        <span class="text-danger">{{ $errors->first('en_short_content') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Short Content in Arabic</label>
                                        <input type="text" name="ar_short_content" id="ar_short_content" class="form-control" value="{{ old('ar_short_content') }}">
                                    </div>
                                    @if($errors->has('ar_short_content'))
                                        <span class="text-danger">{{ $errors->first('ar_short_content') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Long Content in English</label>
                                        <input type="text" name="en_long_content" id="en_long_content" class="form-control" value="{{ old('en_long_content') }}">
                                    </div>
                                    @if($errors->has('en_long_content'))
                                        <span class="text-danger">{{ $errors->first('en_long_content') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Long Content in Arabic</label>
                                        <input type="text" name="ar_long_content" id="ar_long_content" class="form-control" value="{{ old('ar_long_content') }}">
                                    </div>
                                    @if($errors->has('ar_long_content'))
                                        <span class="text-danger">{{ $errors->first('ar_long_content') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="featured_image" id="featured_image">
                                    </div>
                                    @if($errors->has('featured_image'))
                                        <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Banner Image</label>
                                        <input type="file" name="banner_image" id="banner_image">
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Add Destination</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection