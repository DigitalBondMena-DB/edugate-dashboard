@extends('backend.layouts.app')

@php $pageTitle = 'Add Event Image'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('event-gallary.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <input type="hidden" name="event_detail_id" value="{{ $eventDetail->id }}">

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Add Event Image </button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection