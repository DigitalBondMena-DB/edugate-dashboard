@extends('backend.layouts.app')

@php $pageTitle = 'اضافة تخصص '; @endphp

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
                        <form action="{{ route('majors.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="bmd-label-floating">Uni./Facul.</label>
                                        <select name="facultyUniversities[]" class="form-control" style="height:334px;" multiple>
                                            @foreach($facultyUniversities as $facultyUniversity)
                                                <option value="{{ $facultyUniversity->id }}">{{ $facultyUniversity->faculty_name }} {{ $facultyUniversity->university_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('facultyUniversities'))
                                        <span class="text-danger">{{ $errors->first('facultyUniversities') }}</span>
                                    @endif
                                </div>  
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">اضافة تخصص </button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection