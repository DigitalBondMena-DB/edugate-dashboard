@extends('backend.layouts.app')

@php $pageTitle = 'Edit About'; @endphp

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
                        <form action="{{ route('about.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="row">
                        
                              

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Story in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_story" id="ar_story" class="form-control">{{ $row->ar_story }}</textarea>
                                    </div>
                                    @if($errors->has('ar_story'))
                                        <span class="text-danger">{{ $errors->first('ar_story') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <label class="bmd-label-floating">Story Image</label>
                                        <input type="file" name="story_image">
                                        @if($row->story_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('about/' . $row->story_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('story_image'))
                                        <span class="text-danger">{{ $errors->first('story_image') }}</span>
                                    @endif
                                </div>

                                
                               

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Achevement title in Arabic</label>
                                        <input type="text" name="ar_achevement_title" id="ar_achevement_title" class="form-control" value="{{ $row->ar_achevement_title }}">
                                    </div>
                                    @if($errors->has('ar_achevement_title'))
                                        <span class="text-danger">{{ $errors->first('ar_achevement_title') }}</span>
                                    @endif
                                </div>

                                

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Achevement Text in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_achevement_text" id="ar_achevement_text" class="form-control">{{ $row->ar_achevement_text }}</textarea>
                                    </div>
                                    @if($errors->has('ar_achevement_text'))
                                        <span class="text-danger">{{ $errors->first('ar_achevement_text') }}</span>
                                    @endif
                                </div>




                               

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Mission in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_mission" id="ar_mission" class="form-control">{{ $row->ar_mission }}</textarea>
                                    </div>
                                    @if($errors->has('ar_mission'))
                                        <span class="text-danger">{{ $errors->first('ar_mission') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <label class="bmd-label-floating">Mission Image</label>
                                        <input type="file" name="mission_image">
                                        @if($row->mission_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('about/' . $row->mission_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('mission_image'))
                                        <span class="text-danger">{{ $errors->first('mission_image') }}</span>
                                    @endif
                                </div>


                                

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Vision in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_vision" id="ar_vision" class="form-control">{{ $row->ar_vision }}</textarea>
                                    </div>
                                    @if($errors->has('ar_vision'))
                                        <span class="text-danger">{{ $errors->first('ar_vision') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <label class="bmd-label-floating">Vision Image</label>
                                        <input type="file" name="vision_image">
                                        @if($row->vision_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('about/' . $row->vision_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('vision_image'))
                                        <span class="text-danger">{{ $errors->first('vision_image') }}</span>
                                    @endif
                                </div>
                                
                               

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Goal in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_goal" id="ar_goal" class="form-control">{{ $row->ar_goal }}</textarea>
                                    </div>
                                    @if($errors->has('ar_goal'))
                                        <span class="text-danger">{{ $errors->first('ar_goal') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <label class="bmd-label-floating">Banner Image</label>
                                        <input type="file" name="banner_image">
                                        @if($row->banner_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('about/' . $row->banner_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('banner_image'))
                                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                    @endif
                                </div>
            
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit About</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection