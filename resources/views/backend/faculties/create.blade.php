@extends('backend.layouts.app')

@php $pageTitle = 'اضف كلية'; @endphp

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
                        <form action="{{ route('faculties.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="bmd-label-floating">Universities</label>
                                        <select name="universities[]" class="form-control" style="height:334px;" multiple>
                                            @foreach($universities as $university)
                                                <option value="{{ $university->id }}">{{ $university->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('universities'))
                                        <span class="text-danger">{{ $errors->first('universities') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">specilization</label>
                                        <select name="special_id" id="special_id" class="form-control" >
                                            <option value="">اختر التخصص</option>
                                            <option value="1">الهندسه</option>
                                            <option value="2">الطب والصحه</option>
                                            <option value="3">علوم الحاسب الالي</option>
                                            <option value="4">الاعمال والاداره</option>
                                            <option value="5">العلوم</option>
                                            <option value="6">الفنون الابداعيه</option>
                                            <option value="7">القانون</option>
                                            <option value="8">العلوم الانسانية</option>
                                        </select>
                                    </div>
                                    @if($errors->has('special_id'))
                                        <span class="text-danger">{{ $errors->first('special_id') }}</span>
                                    @endif
                                </div> 
                                
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">اضف كلية</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection