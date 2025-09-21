@extends('backend.layouts.app')

@php $pageTitle = 'Edit Contact Information'; @endphp

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
                        <form action="{{ route('contact-us.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Email </label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{ $row->email }}">
                                    </div>
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address in Arabic </label>
                                        <input type="text" name="ar_address" id="ar_address" class="form-control" value="{{ $row->ar_address }}">
                                    </div>
                                    @if($errors->has('ar_address'))
                                        <span class="text-danger">{{ $errors->first('ar_address') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone</label>
                                        <input type="phone" name="phone" id="phone" class="form-control" value="{{ $row->phone }}">
                                    </div>
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Facebook </label>
                                        <input type="url" name="facebook" id="facebook" class="form-control" value="{{ $row->facebook }}">
                                    </div>
                                    @if($errors->has('facebook'))
                                        <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Twitter </label>
                                        <input type="url" name="twitter" id="twitter" class="form-control" value="{{ $row->twitter }}">
                                    </div>
                                    @if($errors->has('twitter'))
                                        <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Instagram </label>
                                        <input type="url" name="instagram" id="instagram" class="form-control" value="{{ $row->instagram }}">
                                    </div>
                                    @if($errors->has('instagram'))
                                        <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Snapchat </label>
                                        <input type="url" name="snapchat" id="snapchat" class="form-control" value="{{ $row->snapchat }}">
                                    </div>
                                    @if($errors->has('snapchat'))
                                        <span class="text-danger">{{ $errors->first('snapchat') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Linkedin </label>
                                        <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ $row->linkedin }}">
                                    </div>
                                    @if($errors->has('linkedin'))
                                        <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tiktok </label>
                                        <input type="url" name="tiktok" id="tiktok" class="form-control" value="{{ $row->tiktok }}">
                                    </div>
                                    @if($errors->has('tiktok'))
                                        <span class="text-danger">{{ $errors->first('tiktok') }}</span>
                                    @endif
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating"> Banner Image </label>
                                        <input type="file" name="banner_image" id="banner_image">
                                        @if($row->banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('contact/' . $row->banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>
            
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Contact Information</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection