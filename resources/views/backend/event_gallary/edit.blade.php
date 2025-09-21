@extends('backend.layouts.app')

@php $pageTitle = 'Edit Offer Day'; @endphp

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
                        <form action="{{ route('event-gallary.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image">
                                            @if($row->image !== NULL)
                                                <div class="col text-center">
                                                    <img src="{{ asset('eventGallary/' . $row->image) }}" width="100px" height="100px;">
                                                </div>
                                            @endif
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                   
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Event Image</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection