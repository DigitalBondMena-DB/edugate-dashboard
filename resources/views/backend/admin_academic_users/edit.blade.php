@extends('backend.layouts.app')

@php $pageTitle = 'Edit Admission Form'; @endphp

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
                        <form action="{{ route('admin-academic-users.update', $row->id) }}" method="POST">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" value="{{ $row->user->name }}" readonly>
                                    </div>
                                    @if($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Academic Guide</label>
                                        <select name="academic_guide_id" class="form-control">
                                            <option value="">Select academic guide</option>
                                            @foreach($academicGuides as $academicGuide)
                                                <option value="{{ $academicGuide->id }}" {{ $academicGuide->id == $row->academic_guide_id ? 'selected' : null }}>{{ $academicGuide->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('academic_guide_id'))
                                        <span class="text-danger">{{ $errors->first('academic_guide_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Admission Form</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection