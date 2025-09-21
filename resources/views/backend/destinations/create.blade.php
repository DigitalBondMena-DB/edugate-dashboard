@extends('backend.layouts.app')

@php $pageTitle = 'اضف الأماكن'; @endphp

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
                                        <label class="bmd-label-floating">About the Destination in English</label>
                                        <textarea cols="5" rows="10" name="en_about_the_destination" id="en_about_the_destination" class="form-control">{{ old('en_about_the_destination') }}</textarea>
                                    </div>
                                    @if($errors->has('en_about_the_destination'))
                                        <span class="text-danger">{{ $errors->first('en_about_the_destination') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">About the Destination in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_about_the_destination" id="ar_about_the_destination" class="form-control">{{ old('ar_about_the_destination') }}</textarea>
                                    </div>
                                    @if($errors->has('ar_about_the_destination'))
                                        <span class="text-danger">{{ $errors->first('ar_about_the_destination') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Flag</label>
                                        <input type="file" name="flag" id="flag">
                                    </div>
                                    @if($errors->has('flag'))
                                        <span class="text-danger">{{ $errors->first('flag') }}</span>
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
                        <button type="submit" class="btn btn-primary pull-right">اضف الأماكن</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection