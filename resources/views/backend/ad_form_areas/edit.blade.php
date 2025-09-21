@extends('backend.layouts.app')

@php $pageTitle = 'تعديل المنطقة'; @endphp

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
                        <form action="{{ route('ad-form-areas.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name in English</label>
                                        <input type="text" name="en_name" id="en_name" class="form-control" value="{{ $row->en_name }}">
                                    </div>
                                    @if($errors->has('en_name'))
                                        <span class="text-danger">{{ $errors->first('en_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name in Arabic </label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $row->ar_name }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                                <input type="hidden" name="ad_form_countries_id" value="{{ $adFormCountry->id }}">
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">تعديل المنطقة</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection