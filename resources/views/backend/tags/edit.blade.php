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
                    <form action="{{ route('tags.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Title in Arabic </label>
                                        <input type="text" name="ar_tag_title" id="ar_tag_title" class="form-control" value="{{ $row->ar_tag_title }}" required>
                                    </div>
                                    @if($errors->has('ar_tag_title'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_title') }}</span>
                                    @endif
                                </div>

                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Paragraph in Arabic </label>
                                        <input type="text" name="ar_tag_paragraph" id="ar_tag_paragraph" class="form-control" value="{{ $row->ar_tag_paragraph }}" required>
                                    </div>
                                    @if($errors->has('ar_tag_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_paragraph') }}</span>
                                    @endif
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Type</label>
                                        <select name="tag_type" class="form-control" readonly>
                                            <option value="{{ $row->tag_type }}">{{ $row->tag_type }}</option>                                          
                                        </select>
                                    </div>
                                    @if($errors->has('tag_type'))
                                        <span class="text-danger">{{ $errors->first('tag_type') }}</span>
                                    @endif
                                </div>

                              

                            </div>
                        <button type="submit" class="btn btn-primary pull-right">تعديل  محرك بحث</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection