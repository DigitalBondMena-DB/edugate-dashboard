@extends('backend.layouts.app')

@php $pageTitle = 'تعديل جامعة'; @endphp

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
                        <form action="{{ route('universities.update', $row->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="bmd-label-floating">About university in English</label>
                                        <textarea cols="5" rows="10" name="en_about_the_university" id="en_about_the_university" class="form-control">{{ $row->en_about_the_university }}</textarea>
                                    </div>
                                    @if($errors->has('en_about_the_university'))
                                        <span class="text-danger">{{ $errors->first('en_about_the_university') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">About university in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_about_the_university" id="ar_about_the_university" class="form-control">{{ $row->ar_about_the_university }}</textarea>
                                    </div>
                                    @if($errors->has('ar_about_the_university'))
                                        <span class="text-danger">{{ $errors->first('ar_about_the_university') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University vision in English</label>
                                        <textarea cols="5" rows="10" name="en_university_vision" id="en_university_vision" class="form-control">{{ $row->en_university_vision }}</textarea>
                                    </div>
                                    @if($errors->has('en_university_vision'))
                                        <span class="text-danger">{{ $errors->first('en_university_vision') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University vision in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_university_vision" id="ar_university_vision" class="form-control">{{ $row->ar_university_vision }}</textarea>
                                    </div>
                                    @if($errors->has('ar_university_vision'))
                                        <span class="text-danger">{{ $errors->first('ar_university_vision') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University mission in English</label>
                                        <textarea cols="5" rows="10" name="en_university_mission" id="en_university_mission" class="form-control">{{ $row->en_university_mission }}</textarea>
                                    </div>
                                    @if($errors->has('en_university_mission'))
                                        <span class="text-danger">{{ $errors->first('en_university_mission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University mission in Arabic</label>
                                        <textarea cols="5" rows="10" name="ar_university_mission" id="ar_university_mission" class="form-control">{{ $row->ar_university_mission }}</textarea>
                                    </div>
                                    @if($errors->has('ar_university_mission'))
                                        <span class="text-danger">{{ $errors->first('ar_university_mission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University governorate in English </label>
                                        <input type="text" name="en_governorate" id="en_governorate" class="form-control" value="{{ $row->en_governorate }}">
                                    </div>
                                    @if($errors->has('en_governorate'))
                                        <span class="text-danger">{{ $errors->first('en_governorate') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University governorate in Arabic </label>
                                        <input type="text" name="ar_governorate" id="ar_governorate" class="form-control" value="{{ $row->ar_governorate }}">
                                    </div>
                                    @if($errors->has('ar_governorate'))
                                        <span class="text-danger">{{ $errors->first('ar_governorate') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University address in English </label>
                                        <input type="text" name="en_address" id="en_address" class="form-control" value="{{ $row->en_address }}">
                                    </div>
                                    @if($errors->has('en_address'))
                                        <span class="text-danger">{{ $errors->first('en_address') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University address in Arabic </label>
                                        <input type="text" name="ar_address" id="ar_address" class="form-control" value="{{ $row->ar_address }}">
                                    </div>
                                    @if($errors->has('ar_address'))
                                        <span class="text-danger">{{ $errors->first('ar_address') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University type</label>
                                        <select name="en_university_type" class="form-control">
                                            <option value="">Select univeristy type</option>
                                            <option value="Government" {{ $row->en_university_type == 'Government' ? 'selected' : null }}>Government</option>
                                            <option value="Private" {{ $row->en_university_type == 'Private' ? 'selected' : null }}>Private</option>
                                        </select>
                                    </div>
                                    @if($errors->has('en_university_type'))
                                        <span class="text-danger">{{ $errors->first('en_university_type') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University foundation year </label>
                                        <input type="number" name="foundation_year" id="foundation_year" class="form-control" value="{{ $row->foundation_year }}">
                                    </div>
                                    @if($errors->has('foundation_year'))
                                        <span class="text-danger">{{ $errors->first('foundation_year') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">University site</label>
                                        <input type="url" name="university_site" id="university_site" class="form-control" value="{{ $row->university_site }}">
                                    </div>
                                    @if($errors->has('university_site'))
                                        <span class="text-danger">{{ $errors->first('university_site') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Destination</label>
                                        <select name="destination_id" class="form-control">
                                            <option value="">Select destination</option>
                                            @foreach($destinations as $destination)
                                                <option value="{{$destination->id}}" {{ $row->destination_id == $destination->id ? 'selected' : null }}>{{ $destination->en_name }}</option>
                                            @endforeach
                                        </select>                                            
                                    </div>
                                    @if($errors->has('destination_id'))
                                        <span class="text-danger">{{ $errors->first('destination_id') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Faculties</label>
                                        <select name="faculties[]" class="form-control" style="height:334px;" multiple>
                                            @foreach($faculties as $faculty)
                                                <option value="{{ $faculty->id }}" {{ in_array($faculty->id, $selectedFaculties) ? 'selected' : '' }}>{{ $faculty->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('faculties'))
                                        <span class="text-danger">{{ $errors->first('faculties') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Logo</label>
                                        <input type="file" name="logo">
                                        @if($row->logo !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('universities/' . $row->logo) }}" width="100px" height="100px;">
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
                                                <img src="{{ asset('universities/' . $row->featured_image) }}" width="100px" height="100px;">
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
                                                <img src="{{ asset('universities/' . $row->banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">تعديل جامعة</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection