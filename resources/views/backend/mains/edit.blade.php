@extends('backend.layouts.app')

@php $pageTitle = 'تعديل المعلومات الرئيسية'; @endphp

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
                        <form action="{{ route('mains.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            @csrf
                        <div class="row">

                                <div class="col-md-6">
                                    <div >
                                        <label class="bmd-label-floating">First Section First Image</label>
                                        <input type="file" name="first_section_first_image" id="first_section_first_image">
                                        @if($row->first_section_first_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('mains/' . $row->first_section_first_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('first_section_first_image'))
                                        <span class="text-danger">{{ $errors->first('first_section_first_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section First Title in English</label>
                                        <input type="text" name="en_first_section_first_title" id="en_first_section_first_title" class="form-control" value="{{ $row->en_first_section_first_title }}">
                                    </div>
                                    @if($errors->has('en_first_section_first_title'))
                                        <span class="text-danger">{{ $errors->first('en_first_section_first_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section First Title in Arabic</label>
                                        <input type="text" name="ar_first_section_first_title" id="ar_first_section_first_title" class="form-control" value="{{ $row->ar_first_section_first_title }}">
                                    </div>
                                    @if($errors->has('ar_first_section_first_title'))
                                        <span class="text-danger">{{ $errors->first('ar_first_section_first_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section First Paragraph in English</label>
                                        <input type="text" name="en_first_section_first_paragraph" id="en_first_section_first_paragraph" class="form-control" value="{{ $row->en_first_section_first_paragraph }}">
                                    </div>
                                    @if($errors->has('en_first_section_first_paragraph'))
                                        <span class="text-danger">{{ $errors->first('en_first_section_first_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section First Paragraph in Arabic</label>
                                        <input type="text" name="ar_first_section_first_paragraph" id="ar_first_section_first_paragraph" class="form-control" value="{{ $row->ar_first_section_first_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_first_section_first_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_first_section_first_paragraph') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div >
                                        <label class="bmd-label-floating">First Section Second Image</label>
                                        <input type="file" name="first_section_second_image" id="first_section_second_image">
                                        @if($row->first_section_second_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('mains/' . $row->first_section_second_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('first_section_second_image'))
                                        <span class="text-danger">{{ $errors->first('first_section_second_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section Second Title in English</label>
                                        <input type="text" name="en_first_section_second_title" id="en_first_section_second_title" class="form-control" value="{{ $row->en_first_section_first_title }}">
                                    </div>
                                    @if($errors->has('en_first_section_second_title'))
                                        <span class="text-danger">{{ $errors->first('en_first_section_second_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section Second Title in Arabic</label>
                                        <input type="text" name="ar_first_section_second_title" id="ar_first_section_second_title" class="form-control" value="{{ $row->ar_first_section_second_title }}">
                                    </div>
                                    @if($errors->has('ar_first_section_second_title'))
                                        <span class="text-danger">{{ $errors->first('ar_first_section_second_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section second Paragraph in English</label>
                                        <input type="text" name="en_first_section_second_paragraph" id="en_first_section_second_paragraph" class="form-control" value="{{ $row->en_first_section_second_paragraph }}">
                                    </div>
                                    @if($errors->has('en_first_section_second_paragraph'))
                                        <span class="text-danger">{{ $errors->first('en_first_section_second_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section Second Paragraph in Arabic</label>
                                        <input type="text" name="ar_first_section_second_paragraph" id="ar_first_section_second_paragraph" class="form-control" value="{{ $row->ar_first_section_second_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_first_section_second_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_first_section_second_paragraph') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div >
                                        <label class="bmd-label-floating">First Section Third Image</label>
                                        <input type="file" name="first_section_third_image" id="first_section_third_image">
                                        @if($row->first_section_third_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('mains/' . $row->first_section_third_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('first_section_third_image'))
                                        <span class="text-danger">{{ $errors->first('first_section_third_image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section Third Title in English</label>
                                        <input type="text" name="en_first_section_third_title" id="en_first_section_third_title" class="form-control" value="{{ $row->en_first_section_first_title }}">
                                    </div>
                                    @if($errors->has('en_first_section_third_title'))
                                        <span class="text-danger">{{ $errors->first('en_first_section_third_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section Third Title in Arabic</label>
                                        <input type="text" name="ar_first_section_third_title" id="ar_first_section_third_title" class="form-control" value="{{ $row->ar_first_section_third_title }}">
                                    </div>
                                    @if($errors->has('ar_first_section_third_title'))
                                        <span class="text-danger">{{ $errors->first('ar_first_section_third_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section Third Paragraph in English</label>
                                        <input type="text" name="en_first_section_third_paragraph" id="en_first_section_third_paragraph" class="form-control" value="{{ $row->en_first_section_third_paragraph }}">
                                    </div>
                                    @if($errors->has('en_first_section_third_paragraph'))
                                        <span class="text-danger">{{ $errors->first('en_first_section_third_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">First Section Third Paragraph in Arabic</label>
                                        <input type="text" name="ar_first_section_third_paragraph" id="ar_first_section_third_paragraph" class="form-control" value="{{ $row->ar_first_section_third_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_first_section_third_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_first_section_third_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Text in English</label>
                                        <input type="text" name="en_application_process_text" id="en_application_process_text" class="form-control" value="{{ $row->en_application_process_text }}">
                                    </div>
                                    @if($errors->has('en_application_process_text'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Text in arabic</label>
                                        <input type="text" name="ar_application_process_text" id="ar_application_process_text" class="form-control" value="{{ $row->ar_application_process_text }}">
                                    </div>
                                    @if($errors->has('ar_application_process_text'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_text') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Title in English</label>
                                        <input type="text" name="en_application_process_title" id="en_application_process_title" class="form-control" value="{{ $row->en_application_process_title }}">
                                    </div>
                                    @if($errors->has('en_application_process_title'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Title in arabic</label>
                                        <input type="text" name="ar_application_process_title" id="ar_application_process_title" class="form-control" value="{{ $row->ar_application_process_title }}">
                                    </div>
                                    @if($errors->has('ar_application_process_title'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_title') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step One Title in English</label>
                                        <input type="text" name="en_application_process_step_one_title" id="en_application_process_step_one_title" class="form-control" value="{{ $row->en_application_process_step_one_title }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_one_title'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_one_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step One Title in arabic</label>
                                        <input type="text" name="ar_application_process_step_one_title" id="ar_application_process_step_one_title" class="form-control" value="{{ $row->ar_application_process_step_one_title }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_one_title'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_one_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step One Text in English</label>
                                        <input type="text" name="en_application_process_step_one_text" id="en_application_process_step_one_text" class="form-control" value="{{ $row->en_application_process_step_one_text }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_one_text'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_one_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step One Text in arabic</label>
                                        <input type="text" name="ar_application_process_step_one_text" id="ar_application_process_step_one_text" class="form-control" value="{{ $row->ar_application_process_step_one_text }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_one_text'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_one_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step One Paragraph in English</label>
                                        <input type="text" name="en_application_process_step_one_paragraph" id="en_application_process_step_one_paragraph" class="form-control" value="{{ $row->en_application_process_step_one_paragraph }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_one_paragraph'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_one_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step One Paragraph in arabic</label>
                                        <input type="text" name="ar_application_process_step_one_paragraph" id="ar_application_process_step_one_paragraph" class="form-control" value="{{ $row->ar_application_process_step_one_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_one_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_one_paragraph') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Two Title in English</label>
                                        <input type="text" name="en_application_process_step_two_title" id="en_application_process_step_two_title" class="form-control" value="{{ $row->en_application_process_step_two_title }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_two_title'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_two_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Two Title in arabic</label>
                                        <input type="text" name="ar_application_process_step_two_title" id="ar_application_process_step_two_title" class="form-control" value="{{ $row->ar_application_process_step_two_title }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_two_title'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_two_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Two Text in English</label>
                                        <input type="text" name="en_application_process_step_two_text" id="en_application_process_step_two_text" class="form-control" value="{{ $row->en_application_process_step_two_text }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_two_text'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_two_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Two Text in arabic</label>
                                        <input type="text" name="ar_application_process_step_two_text" id="ar_application_process_step_two_text" class="form-control" value="{{ $row->ar_application_process_step_two_text }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_two_text'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_two_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Two Paragraph in English</label>
                                        <input type="text" name="en_application_process_step_two_paragraph" id="en_application_process_step_two_paragraph" class="form-control" value="{{ $row->en_application_process_step_two_paragraph }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_two_paragraph'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_two_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Two Paragraph in arabic</label>
                                        <input type="text" name="ar_application_process_step_two_paragraph" id="ar_application_process_step_two_paragraph" class="form-control" value="{{ $row->ar_application_process_step_two_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_two_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_two_paragraph') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Three Title in English</label>
                                        <input type="text" name="en_application_process_step_three_title" id="en_application_process_step_three_title" class="form-control" value="{{ $row->en_application_process_step_three_title }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_three_title'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_three_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Three Title in arabic</label>
                                        <input type="text" name="ar_application_process_step_three_title" id="ar_application_process_step_three_title" class="form-control" value="{{ $row->ar_application_process_step_three_title }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_three_title'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_three_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Three Text in English</label>
                                        <input type="text" name="en_application_process_step_three_text" id="en_application_process_step_three_text" class="form-control" value="{{ $row->en_application_process_step_three_text }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_three_text'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_three_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Three Text in arabic</label>
                                        <input type="text" name="ar_application_process_step_three_text" id="ar_application_process_step_three_text" class="form-control" value="{{ $row->ar_application_process_step_three_text }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_three_text'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_three_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Three Paragraph in English</label>
                                        <input type="text" name="en_application_process_step_three_paragraph" id="en_application_process_step_three_paragraph" class="form-control" value="{{ $row->en_application_process_step_three_paragraph }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_three_paragraph'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_three_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Three Paragraph in arabic</label>
                                        <input type="text" name="ar_application_process_step_three_paragraph" id="ar_application_process_step_three_paragraph" class="form-control" value="{{ $row->ar_application_process_step_three_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_three_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_three_paragraph') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Four Title in English</label>
                                        <input type="text" name="en_application_process_step_four_title" id="en_application_process_step_four_title" class="form-control" value="{{ $row->en_application_process_step_four_title }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_four_title'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_four_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Four Title in arabic</label>
                                        <input type="text" name="ar_application_process_step_four_title" id="ar_application_process_step_four_title" class="form-control" value="{{ $row->ar_application_process_step_four_title }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_four_title'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_four_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Four Text in English</label>
                                        <input type="text" name="en_application_process_step_four_text" id="en_application_process_step_four_text" class="form-control" value="{{ $row->en_application_process_step_four_text }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_four_text'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_four_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Four Text in arabic</label>
                                        <input type="text" name="ar_application_process_step_four_text" id="ar_application_process_step_four_text" class="form-control" value="{{ $row->ar_application_process_step_four_text }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_four_text'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_four_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Four Paragraph in English</label>
                                        <input type="text" name="en_application_process_step_four_paragraph" id="en_application_process_step_four_paragraph" class="form-control" value="{{ $row->en_application_process_step_four_paragraph }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_four_paragraph'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_four_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Four Paragraph in arabic</label>
                                        <input type="text" name="ar_application_process_step_four_paragraph" id="ar_application_process_step_four_paragraph" class="form-control" value="{{ $row->ar_application_process_step_four_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_four_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_four_paragraph') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Five Title in English</label>
                                        <input type="text" name="en_application_process_step_five_title" id="en_application_process_step_five_title" class="form-control" value="{{ $row->en_application_process_step_five_title }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_five_title'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_five_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Five Title in arabic</label>
                                        <input type="text" name="ar_application_process_step_five_title" id="ar_application_process_step_five_title" class="form-control" value="{{ $row->ar_application_process_step_five_title }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_five_title'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_five_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Five Text in English</label>
                                        <input type="text" name="en_application_process_step_five_text" id="en_application_process_step_five_text" class="form-control" value="{{ $row->en_application_process_step_five_text }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_five_text'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_five_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Five Text in arabic</label>
                                        <input type="text" name="ar_application_process_step_five_text" id="ar_application_process_step_five_text" class="form-control" value="{{ $row->ar_application_process_step_five_text }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_five_text'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_five_text') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Five Paragraph in English</label>
                                        <input type="text" name="en_application_process_step_five_paragraph" id="en_application_process_step_five_paragraph" class="form-control" value="{{ $row->en_application_process_step_five_paragraph }}">
                                    </div>
                                    @if($errors->has('en_application_process_step_five_paragraph'))
                                        <span class="text-danger">{{ $errors->first('en_application_process_step_five_paragraph') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Application Process Step Five Paragraph in arabic</label>
                                        <input type="text" name="ar_application_process_step_five_paragraph" id="ar_application_process_step_five_paragraph" class="form-control" value="{{ $row->ar_application_process_step_five_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_application_process_step_five_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_application_process_step_five_paragraph') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section First Header in English</label>
                                        <input type="text" name="en_last_section_first_header" id="en_last_section_first_header" class="form-control" value="{{ $row->en_last_section_first_header }}">
                                    </div>
                                    @if($errors->has('en_last_section_first_header'))
                                        <span class="text-danger">{{ $errors->first('en_last_section_first_header') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section First Header In arabic</label>
                                        <input type="text" name="ar_last_section_first_header" id="ar_last_section_first_header" class="form-control" value="{{ $row->ar_last_section_first_header }}">
                                    </div>
                                    @if($errors->has('ar_last_section_first_header'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_first_header') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section First Title English</label>
                                        <input type="text" name="en_last_section_first_title" id="en_last_section_first_title" class="form-control" value="{{ $row->en_last_section_first_title }}">
                                    </div>
                                    @if($errors->has('en_last_section_first_title'))
                                        <span class="text-danger">{{ $errors->first('en_last_section_first_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section First Title In arabic</label>
                                        <input type="text" name="ar_last_section_first_title" id="ar_last_section_first_title" class="form-control" value="{{ $row->ar_last_section_first_title }}">
                                    </div>
                                    @if($errors->has('ar_last_section_first_title'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_first_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section Second Title in English</label>
                                        <input type="text" name="en_last_section_second_title" id="en_last_section_second_title" class="form-control" value="{{ $row->en_last_section_second_title }}">
                                    </div>
                                    @if($errors->has('en_last_section_second_title'))
                                        <span class="text-danger">{{ $errors->first('en_last_section_second_title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section Second Title in arabic</label>
                                        <input type="text" name="ar_last_section_second_title" id="ar_last_section_second_title" class="form-control" value="{{ $row->ar_last_section_second_title }}">
                                    </div>
                                    @if($errors->has('ar_last_section_second_title'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_second_title') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div >
                                        <label class="bmd-label-floating">Last Section Image</label>
                                        <input type="file" name="last_section_image" id="last_section_image">
                                        @if($row->last_section_image !== NULL)
                                            <div class="col text-center">
                                                <img src="{{ asset('mains/' . $row->last_section_image) }}" width="100px" height="100px;">
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('last_section_image'))
                                        <span class="text-danger">{{ $errors->first('last_section_image') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section Image Header In English</label>
                                        <input type="text" name="en_last_section_image_header" id="en_last_section_image_header" class="form-control" value="{{ $row->en_last_section_image_header }}">
                                    </div>
                                    @if($errors->has('en_last_section_image_header'))
                                        <span class="text-danger">{{ $errors->first('en_last_section_image_header') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section Image Header In arabic</label>
                                        <input type="text" name="ar_last_section_image_header" id="ar_last_section_image_header" class="form-control" value="{{ $row->ar_last_section_image_header }}">
                                    </div>
                                    @if($errors->has('ar_last_section_image_header'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_image_header') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section Image Text in English</label>
                                        <input type="text" name="en_last_section_image_text" id="en_last_section_image_text" class="form-control" value="{{ $row->en_last_section_image_text }}">
                                    </div>
                                    @if($errors->has('en_last_section_image_text'))
                                        <span class="text-danger">{{ $errors->first('en_last_section_image_text') }}</span>
                                    @endif
                                </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section Image Text in arabic</label>
                                        <input type="text" name="ar_last_section_image_text" id="ar_last_section_image_text" class="form-control" value="{{ $row->ar_last_section_image_text }}">
                                    </div>
                                    @if($errors->has('ar_last_section_image_text'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_image_text') }}</span>
                                    @endif
                            </div>    
                            
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Section Main Text in English</label>
                                    <input type="text" name="en_last_section_main_text" id="en_last_section_main_text" class="form-control" value="{{ $row->en_last_section_main_text }}">
                                </div>
                                @if($errors->has('en_last_section_main_text'))
                                    <span class="text-danger">{{ $errors->first('en_last_section_main_text') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section Main Text in arabic</label>
                                        <input type="text" name="ar_last_section_main_text" id="ar_last_section_main_text" class="form-control" value="{{ $row->ar_last_section_main_text }}">
                                    </div>
                                    @if($errors->has('ar_last_section_main_text'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_main_text') }}</span>
                                    @endif
                            </div>


                              
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Section Main Paragraph in English</label>
                                    <input type="text" name="en_last_section_main_paragraph" id="en_last_section_main_paragraph" class="form-control" value="{{ $row->en_last_section_main_paragraph }}">
                                </div>
                                @if($errors->has('en_last_section_main_paragraph'))
                                    <span class="text-danger">{{ $errors->first('en_last_section_main_paragraph') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section Main Paragraph in arabic</label>
                                        <input type="text" name="ar_last_section_main_paragraph" id="ar_last_section_main_paragraph" class="form-control" value="{{ $row->ar_last_section_main_paragraph }}">
                                    </div>
                                    @if($errors->has('ar_last_section_main_paragraph'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_main_paragraph') }}</span>
                                    @endif
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Section List Item First Text in English</label>
                                    <input type="text" name="en_last_section_list_item_first_text" id="en_last_section_list_item_first_text" class="form-control" value="{{ $row->en_last_section_list_item_first_text }}">
                                </div>
                                @if($errors->has('en_last_section_list_item_first_text'))
                                    <span class="text-danger">{{ $errors->first('en_last_section_list_item_first_text') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section List Item First Text in arabic</label>
                                        <input type="text" name="ar_last_section_list_item_first_text" id="ar_last_section_list_item_first_text" class="form-control" value="{{ $row->ar_last_section_list_item_first_text }}">
                                    </div>
                                    @if($errors->has('ar_last_section_list_item_first_text'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_list_item_first_text') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Section List Item Second Text in English</label>
                                    <input type="text" name="en_last_section_list_item_second_text" id="en_last_section_list_item_second_text" class="form-control" value="{{ $row->en_last_section_list_item_second_text }}">
                                </div>
                                @if($errors->has('en_last_section_list_item_second_text'))
                                    <span class="text-danger">{{ $errors->first('en_last_section_list_item_second_text') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section List Item Second Text in arabic</label>
                                        <input type="text" name="ar_last_section_list_item_second_text" id="ar_last_section_list_item_second_text" class="form-control" value="{{ $row->ar_last_section_list_item_second_text }}">
                                    </div>
                                    @if($errors->has('ar_last_section_list_item_second_text'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_list_item_second_text') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Section List Item Third Text in English</label>
                                    <input type="text" name="en_last_section_list_item_third_text" id="en_last_section_list_item_third_text" class="form-control" value="{{ $row->en_last_section_list_item_third_text }}">
                                </div>
                                @if($errors->has('en_last_section_list_item_third_text'))
                                    <span class="text-danger">{{ $errors->first('en_last_section_list_item_third_text') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section List Item Third Text in arabic</label>
                                        <input type="text" name="ar_last_section_list_item_third_text" id="ar_last_section_list_item_third_text" class="form-control" value="{{ $row->ar_last_section_list_item_third_text }}">
                                    </div>
                                    @if($errors->has('ar_last_section_list_item_third_text'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_list_item_third_text') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Section List Item Fourth Text in English</label>
                                    <input type="text" name="en_last_section_list_item_fourth_text" id="en_last_section_list_item_fourth_text" class="form-control" value="{{ $row->en_last_section_list_item_fourth_text }}">
                                </div>
                                @if($errors->has('en_last_section_list_item_fourth_text'))
                                    <span class="text-danger">{{ $errors->first('en_last_section_list_item_fourth_text') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section List Item Fourth Text in arabic</label>
                                        <input type="text" name="ar_last_section_list_item_fourth_text" id="ar_last_section_list_item_fourth_text" class="form-control" value="{{ $row->ar_last_section_list_item_fourth_text }}">
                                    </div>
                                    @if($errors->has('ar_last_section_list_item_fourth_text'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_list_item_fourth_text') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Section List Item Five Text in English</label>
                                    <input type="text" name="en_last_section_list_item_five_text" id="en_last_section_list_item_five_text" class="form-control" value="{{ $row->en_last_section_list_item_five_text }}">
                                </div>
                                @if($errors->has('en_last_section_list_item_five_text'))
                                    <span class="text-danger">{{ $errors->first('en_last_section_list_item_five_text') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Section List Item Five Text in arabic</label>
                                        <input type="text" name="ar_last_section_list_item_five_text" id="ar_last_section_list_item_five_text" class="form-control" value="{{ $row->ar_last_section_list_item_five_text }}">
                                    </div>
                                    @if($errors->has('ar_last_section_list_item_five_text'))
                                        <span class="text-danger">{{ $errors->first('ar_last_section_list_item_five_text') }}</span>
                                    @endif
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Header Title in English</label>
                                    <input type="text" name="en_header_title" id="en_header_title" class="form-control" value="{{ $row->en_header_title }}">
                                </div>
                                @if($errors->has('en_header_title'))
                                    <span class="text-danger">{{ $errors->first('en_header_title') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Header Title  in arabic</label>
                                        <input type="text" name="ar_header_title" id="ar_header_title" class="form-control" value="{{ $row->ar_header_title }}">
                                    </div>
                                    @if($errors->has('ar_header_title'))
                                        <span class="text-danger">{{ $errors->first('ar_header_title') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Header  Text in English</label>
                                    <input type="text" name="en_header_text" id="en_header_text" class="form-control" value="{{ $row->en_header_text }}">
                                </div>
                                @if($errors->has('en_header_text'))
                                    <span class="text-danger">{{ $errors->first('en_header_text') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Header Text in arabic</label>
                                        <input type="text" name="ar_header_text" id="ar_header_text" class="form-control" value="{{ $row->ar_header_text }}">
                                    </div>
                                    @if($errors->has('ar_header_text'))
                                        <span class="text-danger">{{ $errors->first('ar_header_text') }}</span>
                                    @endif
                            </div>

                            

                      </div>
                        <button type="submit" class="btn btn-primary pull-right">تعديل العميل</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
@endsection