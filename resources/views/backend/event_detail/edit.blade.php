@extends('backend.layouts.app')

@php $pageTitle = 'Edit Event'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title ">{{ $pageTitle }} </h4>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a class="btn btn-white btn-round" href="{{ route('event-gallary.show', $row->id) }}">Show Event Gallary</a>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        <form action="{{ route('event-detail.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="row">
                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Event Name In Arabic</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $row->ar_name }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                                
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Event Text In Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_text" id="ar_text" class="form-control">{{ $row->ar_text }}</textarea>
                                    </div>
                                    @if($errors->has('ar_text'))
                                        <span class="text-danger">{{ $errors->first('ar_text') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <br>
                                        <input type="file" name="featured_image">
                                            @if($row->featured_image !== NULL)
                                                <div class="col text-center">
                                                    <img src="{{ asset('eventDetail/' . $row->featured_image) }}" width="100px" height="100px;">
                                                </div>
                                            @endif
                                    </div>
                                    @if($errors->has('featured_image'))
                                        <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Banner Image</label>
                                        <br>
                                        <input type="file" name="banner_image">
                                            @if($row->banner_image !== NULL)
                                                <div class="col text-center">
                                                    <img src="{{ asset('eventDetail/' . $row->banner_image) }}" width="100px" height="100px;">
                                                </div>
                                            @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Event Category</label>
                                        <select name="event_category_id" class="form-control">
                                            <option value="">Select a Category</option>
                                            @foreach($eventCategeries as $categery)
                                                <option value="{{ $categery->id }}" {{ $row->event_category_id == $categery->id ? 'selected' : '' }}>{{ $categery->ar_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('event_category_id'))
                                        <span class="text-danger">{{ $errors->first('event_category_id') }}</span>
                                    @endif
                                </div> 
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Date Of The Event</label>
                                        <input type="date" name="event_year" id="event_year" class="form-control" value="{{ $row->event_year }}">
                                    </div>
                                    @if($errors->has('event_year'))
                                        <span class="text-danger">{{ $errors->first('event_year') }}</span>
                                    @endif
                                </div>
                                
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Event</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection