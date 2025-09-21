@extends('backend.layouts.app')

@php $pageTitle = 'تعديل الإدارات'; @endphp

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
                        <form action="{{ route('departments.update', $row->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="bmd-label-floating">Name in Arabic</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $row->ar_name }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Department vision in English</label>
                                        <textarea cols="5" rows="10" name="en_department_vision" id="en_department_vision" class="form-control">{{ $row->en_department_vision }}</textarea>
                                    </div>
                                    @if($errors->has('en_department_vision'))
                                        <span class="text-danger">{{ $errors->first('en_department_vision') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Department Vision in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_department_vision" id="ar_department_vision" class="form-control">{{ $row->ar_department_vision }}</textarea>
                                    </div>
                                    @if($errors->has('ar_department_vision'))
                                        <span class="text-danger">{{ $errors->first('ar_department_vision') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Departmen Mission in English</label>
                                        <textarea cols="5" rows="10" name="en_department_mission" id="en_department_mission" class="form-control">{{ $row->en_department_mission }}</textarea>
                                    </div>
                                    @if($errors->has('en_department_mission'))
                                        <span class="text-danger">{{ $errors->first('en_department_mission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Department mission in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_department_mission" id="ar_department_mission" class="form-control">{{ $row->ar_department_mission }}</textarea>
                                    </div>
                                    @if($errors->has('ar_department_mission'))
                                        <span class="text-danger">{{ $errors->first('ar_department_mission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Founation year</label>
                                        <input type="number" name="foundation_year" id="foundation_year" class="form-control" value="{{ $row->foundation_year }}">
                                    </div>
                                    @if($errors->has('foundation_year'))
                                        <span class="text-danger">{{ $errors->first('foundation_year') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Uni./Facul./Major</label>
                                        <select name="facultyMajorUniversities[]" class="form-control" style="height:334px;" multiple>
                                            @foreach($facultyMajorUniversities as $facultyMajorUniversity)
                                                <option value="{{ $facultyMajorUniversity->id }}" {{ in_array($facultyMajorUniversity->id, $selectedFacultyMajorUniversities) ? 'selected' : '' }}>{{ $facultyMajorUniversity->faculty_name }} {{ $facultyMajorUniversity->university_name }} ({{ $facultyMajorUniversity->major_name }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('facultyMajorUniversities'))
                                        <span class="text-danger">{{ $errors->first('facultyMajorUniversities') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="featured_image">
                                        @if($row->featured_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('departments/' . $row->featured_image) }}" width="100px" height="100px;">
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
                                                <img src="{{ asset('departments/' . $row->banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">تعديل الإدارات</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection