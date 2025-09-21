@extends('backend.layouts.app')

@php $pageTitle = 'Edit Article Sub Category'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title ">{{ $pageTitle }} </h4>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        <form action="{{ route('articleSubCategory.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="row">
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article title In Arabic</label>
                                        <input type="text" name="ar_title" id="ar_title" class="form-control" value="{{ $row->ar_title }}">
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>
                                
                                
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Tag Title In Arabic</label>
                                        <input type="text" name="ar_tag_title" id="ar_tag_title" class="form-control" value="{{ $row->ar_tag_title }}">
                                    </div>
                                    @if($errors->has('ar_tag_title'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_title') }}</span>
                                    @endif
                                </div>
                                
                                
                                
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Tag Text In Arabic</label>
                                        <input type="text" name="ar_tag_description" id="ar_tag_description" class="form-control" value="{{ $row->ar_tag_description }}">
                                    </div>
                                    @if($errors->has('ar_tag_description'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_description') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Title In Arabic</label>
                                        <select name="new_article_catrgory_id" class="form-control" required>
                                            <option value="">Select a Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $row->new_article_catrgory_id == $category->id ? 'selected' : null }}>{{ $category->ar_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('new_article_catrgory_id'))
                                        <span class="text-danger">{{ $errors->first('new_article_catrgory_id') }}</span>
                                    @endif
                                </div>

                                

                                      
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Article Sub Category</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection