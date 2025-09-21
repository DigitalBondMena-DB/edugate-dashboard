@extends('backend.layouts.app')

@php $pageTitle = 'Edit Feedback'; @endphp

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
                            </div>
                        </div>
                    <div class="card-body">
                        <form action="{{ route('service.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="row">
                               

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Feedback Name In Arabic</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $row->ar_name }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>

                                

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Feedback Text in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_text" id="ar_text" class="form-control">{{ $row->ar_text }}</textarea>
                                    </div>
                                    @if($errors->has('ar_text'))
                                        <span class="text-danger">{{ $errors->first('ar_text') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Feedback Image</label>
                                        <input type="file" name="image">
                                            @if($row->image !== NULL)
                                                <div class="col text-center">
                                                    <img src="{{ asset('service/' . $row->image) }}" width="100px" height="100px;">
                                                </div>
                                            @endif
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                      
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Feedback</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection