@extends('backend.layouts.app')

@php $pageTitle = '  اضافه محرك بحث'; @endphp

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
                    <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Title in Arabic </label>
                                        <input type="text" name="ar_tag_title" id="ar_tag_title" class="form-control" value="{{ old('ar_tag_title') }}" required>
                                    </div>
                                    @if($errors->has('ar_tag_title'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_title') }}</span>
                                    @endif
                                </div>

                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Paragraph in Arabic </label>
                                        <input type="text" name="ar_tag_paragraph" id="ar_tag_paragraph" class="form-control" value="{{ old('ar_tag_paragraph') }}" required>
                                    </div>
                                    @if($errors->has('ar_tag_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_paragraph') }}</span>
                                    @endif
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Type</label>
                                        <select name="tag_type" class="form-control" required>
                                            <option value="" >Choose Your Page</option>
                                            <option value="home" >Home</option>
                                            <option value="aboutUs" >About Us</option>
                                            <option value="contactUs" >Contac Us</option>
                                            <option value="studyAbroad">Study Abroad </option>
                                            <option value="whyEdugate">Why Edugate ? </option>
                                            <option value="logIn" >Log In</option>
                                            <option value="logOut" >Log Out</option>                                         
                                        </select>
                                    </div>
                                    @if($errors->has('tag_type'))
                                        <span class="text-danger">{{ $errors->first('tag_type') }}</span>
                                    @endif
                                </div>

                              

                            </div>
                        <button type="submit" class="btn btn-primary pull-right">اضافة  محرك بحث</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection