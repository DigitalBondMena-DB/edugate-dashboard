@extends('academic_guide.layouts.app')

@php $pageTitle = 'Edit Admission Form'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-white">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('academic-users.update', $row->id) }}" method="POST">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly style="background-color:#202940;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone</label>
                                        <input type="number" name="mobile" class="form-control" value="{{ $user->phone }}" readonly style="background-color:#202940;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ $user->address }}" readonly style="background-color:#202940;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Money Status</label>
                                        <select name="money_received" class="form-control" style="background-color:#202940;">
                                            <option value="">Select a status</option>
                                            <option value="1" {{ $row->money_received == 1 ? 'selected' : '' }}>Received</option>
                                            <option value="0" {{ $row->money_received == 0 ? 'selected' : '' }}>Not Yet</option>
                                        </select>
                                    </div>
                                    @if($errors->has('money_received'))
                                        <span class="text-danger">{{ $errors->first('money_received') }}</span>
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