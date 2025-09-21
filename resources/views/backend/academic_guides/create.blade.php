@extends('backend.layouts.app')

@php $pageTitle = 'Add Doctor'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    
            <div class="row">
                <div class="col-12">
                    <div class="card" dir="rtl">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-white">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('academic-guides.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Name in arabic</label>
                                        <input type="text" name="ar_name" class="form-control" value="{{ old('ar_name') }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Name in english</label>
                                        <input type="text" name="en_name" class="form-control" value="{{ old('en_name') }}">
                                    </div>
                                    @if($errors->has('en_name'))
                                        <span class="text-danger">{{ $errors->first('en_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Email address</label>
                                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                    </div>
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">phone</label>
                                        <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">
                                    </div>
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Facebook Link</label>
                                        <input type="url" name="facebook_link" class="form-control" value="{{ old('facebook_link') }}">
                                    </div>
                                    @if($errors->has('facebook_link'))
                                        <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Twitter Link</label>
                                        <input type="url" name="tweet_link" class="form-control" value="{{ old('tweet_link') }}">
                                    </div>
                                    @if($errors->has('tweet_link'))
                                        <span class="text-danger">{{ $errors->first('tweet_link') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Instagram Link</label>
                                        <input type="url" name="insta_link" class="form-control" value="{{ old('insta_link') }}">
                                    </div>
                                    @if($errors->has('insta_link'))
                                        <span class="text-danger">{{ $errors->first('insta_link') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Doctor Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Add Doctor</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection