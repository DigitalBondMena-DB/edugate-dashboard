@extends('backend.layouts.app')

@php $pageTitle = 'Add Feedback'; @endphp

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
                        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                             

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Feedback Name In Arabic</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ old('ar_name') }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>

                               

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Feedback Text in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_text" id="ar_text" class="form-control">{{ old('ar_text') }}</textarea>
                                    </div>
                                    @if($errors->has('ar_text'))
                                        <span class="text-danger">{{ $errors->first('ar_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <div>
                                        <label class="bmd-label-floating">Feedback Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Add Feedback</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection