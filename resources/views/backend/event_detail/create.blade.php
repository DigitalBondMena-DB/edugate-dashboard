@extends('backend.layouts.app')

@php $pageTitle = 'Add Event'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('event-detail.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Event Name In Arabic</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ old('ar_name') }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                                
                               
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Event Text In Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_text" id="ar_text" class="form-control">{{ old('ar_text') }}</textarea>
                                    </div>
                                    @if($errors->has('ar_text'))
                                        <span class="text-danger">{{ $errors->first('ar_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Featured Image</label>
                                        <input type="file" name="featured_image">
                                    </div>
                                    @if($errors->has('featured_image'))
                                        <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Banner Image</label>
                                        <input type="file" name="banner_image">
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Event Category</label>
                                        <select name="event_category_id" class="form-control" >
                                            <option value="">Select a Category</option>
                                            @foreach($eventCategoeries as $categery)
                                                <option value="{{ $categery->id }}">{{ $categery->ar_name }}</option>
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
                                        <input type="date" name="event_year" id="event_year" class="form-control" value="{{ old('event_year') }}">
                                    </div>
                                    @if($errors->has('event_year'))
                                        <span class="text-danger">{{ $errors->first('event_year') }}</span>
                                    @endif
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Add Event</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection