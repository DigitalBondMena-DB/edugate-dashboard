@extends('backend.layouts.app')

@php $pageTitle = 'تعديل الكلية الجامعية'; @endphp

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
                        <form action="{{ route('university_faculty_percentage.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University name</label>
                                        <input type="text" name="university_id" id="university_id" class="form-control" value="{{ $row->university_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Faculty name</label>
                                        <input type="text" name="faculty_id" id="faculty_id" class="form-control" value="{{ $row->faculty_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Faculty Vision in English</label>
                                        <textarea cols="5" rows="10" name="en_faculty_vision" id="en_faculty_vision" class="form-control">{{ $row->en_faculty_vision }}</textarea>
                                    </div>
                                    @if($errors->has('en_faculty_vision'))
                                        <span class="text-danger">{{ $errors->first('en_faculty_vision') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Faculty Vision in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_faculty_vision" id="ar_faculty_vision" class="form-control">{{ $row->ar_faculty_vision }}</textarea>
                                    </div>
                                    @if($errors->has('ar_faculty_vision'))
                                        <span class="text-danger">{{ $errors->first('ar_faculty_vision') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Faculty Mission in English</label>
                                        <textarea cols="5" rows="10" name="en_faculty_mission" id="en_faculty_mission" class="form-control">{{ $row->en_faculty_mission }}</textarea>
                                    </div>
                                    @if($errors->has('en_faculty_mission'))
                                        <span class="text-danger">{{ $errors->first('en_faculty_mission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Faculty Mission in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_faculty_mission" id="ar_faculty_mission" class="form-control">{{ $row->ar_faculty_mission }}</textarea>
                                    </div>
                                    @if($errors->has('ar_faculty_mission'))
                                        <span class="text-danger">{{ $errors->first('ar_faculty_mission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Faculty address in English </label>
                                        <input type="text" name="en_address" id="en_address" class="form-control" value="{{ $row->en_address }}">
                                    </div>
                                    @if($errors->has('en_address'))
                                        <span class="text-danger">{{ $errors->first('en_address') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Faculty address in Arabic </label>
                                        <input type="text" name="ar_address" id="ar_address" class="form-control" value="{{ $row->ar_address }}">
                                    </div>
                                    @if($errors->has('ar_address'))
                                        <span class="text-danger">{{ $errors->first('ar_address') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone</label>
                                        <input type="number" name="faculty_phone" id="faculty_phone" class="form-control" value="{{ $row->faculty_phone }}">
                                        @if($errors->has('faculty_phone'))
                                            <span class="text-danger">{{ $errors->first('faculty_phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Website</label>
                                        <input type="url" name="faculty_site" id="faculty_site" class="form-control" value="{{ $row->faculty_site }}">
                                        @if($errors->has('faculty_site'))
                                            <span class="text-danger">{{ $errors->first('faculty_site') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Foundation year</label>
                                        <input type="number" name="foundation_year" class="form-control" value="{{ $row->foundation_year }}">
                                    </div>
                                    @if($errors->has('foundation_year'))
                                        <span class="text-danger">{{ $errors->first('foundation_year') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Percentage</label>
                                        <input type="text" name="percentage" id="percentage" class="form-control" value="{{ $row->percentage }}">
                                    </div>
                                    @if($errors->has('percentage'))
                                        <span class="text-danger">{{ $errors->first('percentage') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Major</label>
                                        <select name="majors[]" class="form-control" style="height:334px;" multiple>
                                            @foreach($majors as $major)
                                                <option value="{{ $major->id }}" {{ in_array($major->id, $selectedMajors) ? 'selected' : '' }}>{{ $major->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('majors'))
                                        <span class="text-danger">{{ $errors->first('majors') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Logo</label>
                                        <input type="file" name="logo">
                                        @if($row->logo !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('faculties/' . $row->logo) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('logo'))
                                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="featured_image">
                                        @if($row->featured_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('faculties/' . $row->featured_image) }}" width="100px" height="100px;">
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
                                        <input type="file" name="banner_image">
                                        @if($row->banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('faculties/' . $row->banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">تعديل الكلية الجامعية</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection