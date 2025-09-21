@extends('backend.layouts.app')

@php $pageTitle = 'اضافة شعبة'; @endphp

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
                        <form action="{{ route('specializations.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="bmd-label-floating">Specialization vision in English</label>
                                        <textarea cols="5" rows="10" name="en_specialization_vision" id="en_specialization_vision" class="form-control">{{ old('en_specialization_vision') }}</textarea>
                                    </div>
                                    @if($errors->has('en_specialization_vision'))
                                        <span class="text-danger">{{ $errors->first('en_specialization_vision') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Specialization vision in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_specialization_vision" id="ar_specialization_vision" class="form-control">{{ old('ar_specialization_vision') }}</textarea>
                                    </div>
                                    @if($errors->has('ar_specialization_vision'))
                                        <span class="text-danger">{{ $errors->first('ar_specialization_vision') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Specialization mission in English</label>
                                        <textarea cols="5" rows="10" name="en_specialization_mission" id="en_specialization_mission" class="form-control">{{ old('en_specialization_mission') }}</textarea>
                                    </div>
                                    @if($errors->has('en_specialization_mission'))
                                        <span class="text-danger">{{ $errors->first('en_specialization_mission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Specialization mission in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_specialization_mission" id="ar_specialization_mission" class="form-control">{{ old('ar_specialization_mission') }}</textarea>
                                    </div>
                                    @if($errors->has('ar_specialization_mission'))
                                        <span class="text-danger">{{ $errors->first('ar_specialization_mission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Founation Year</label>
                                        <input type="number" name="foundation_year" id="foundation_year" class="form-control" value="{{ old('foundation_year') }}">
                                    </div>
                                    @if($errors->has('foundation_year'))
                                        <span class="text-danger">{{ $errors->first('foundation_year') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Department</label>
                                        <select name="department_id" class="form-control">
                                            <option value="">Select deparment</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{ $department->en_name }}</option>
                                            @endforeach
                                        </select>                                            
                                    </div>
                                    @if($errors->has('department_id'))
                                        <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
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
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">اضافة شعبة</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection