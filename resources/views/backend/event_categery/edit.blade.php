@extends('backend.layouts.app')

@php $pageTitle = 'Edit Event Category'; @endphp

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
                        <form action="{{ route('event-categery.update' , $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="row">

                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name in Arabic</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $row->ar_name }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Video Link</label>
                                        <input type="text" name="video_link" id="video_link" class="form-control" value="{{ $row->video_link }}">
                                    </div>
                                    @if($errors->has('video_link'))
                                        <span class="text-danger">{{ $errors->first('video_link') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Date Of The Event</label>
                                        <input type="date" name="event_year" id="event_year" class="form-control" value="{{ $row->event_year }}">
                                    </div>
                                    @if($errors->has('event_year'))
                                        <span class="text-danger">{{ $errors->first('event_year') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-4">
                                    <div>
                                        <label class="bmd-label-floating">Featured Image</label>
                                        <input type="file" name="featured_image">
                                            @if($row->featured_image !== NULL)
                                                <div class="col text-center">
                                                    <img src="{{ asset('eventCategery/' . $row->featured_image) }}" width="100px" height="100px;">
                                                </div>
                                            @endif
                                    </div>
                                    @if($errors->has('featured_image'))
                                        <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <label class="bmd-label-floating">Banner Image</label>
                                        <input type="file" name="banner_image">
                                            @if($row->banner_image !== NULL)
                                                <div class="col text-center">
                                                    <img src="{{ asset('eventCategery/' . $row->banner_image) }}" width="100px" height="100px;">
                                                </div>
                                            @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>

                                
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Event Category</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection