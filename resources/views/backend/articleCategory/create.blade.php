@extends('backend.layouts.app')

@php $pageTitle = 'Add Article Category'; @endphp

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
                        <form action="{{ route('articleCategory.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Title in English</label>
                                        <input type="text" name="en_title" id="en_title" class="form-control" value="{{ old('en_title') }}">
                                    </div>
                                    @if($errors->has('en_title'))
                                        <span class="text-danger">{{ $errors->first('en_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Title In Arabic</label>
                                        <input type="text" name="ar_title" id="ar_title" class="form-control" value="{{ old('ar_title') }}">
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>



                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Add Article Category</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection