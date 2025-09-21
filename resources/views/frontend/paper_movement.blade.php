@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EGEC | Egyptian Gulf For Educational Consultant 
    @else
        EGEC | المصرية الخليجية للخدمات التعليمية
	@endif
@endsection

@section('egec')
    
    @if(isset($user_movement))
        @if($admissionInfo->degree_needed == 'Bachelor')
            @if($user_movement->passport_status == 0 || $user_movement->secondary_certificate_status == 0 || $user_movement->birth_certificate_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Perosnal Information</h2>
                                <span>Waiting for all Papers to get approved...</span>
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-first-paper-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Passport image</label>
                                            @if($user_movement->passport_status == 0)
                                                <input type="file" name="passport" id="passport" class="d-block" {{ isset($user_movement) ? $user_movement->passport !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->passport !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->passport) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('passport'))
                                                <span class="text-danger">{{ $errors->first('passport') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Secondary Certificate image</label>
                                            @if($user_movement->secondary_certificate_status == 0)
                                                <input type="file" name="secondary_certificate" id="secondary_certificate" class="d-block" {{ isset($user_movement) ? $user_movement->secondary_certificate !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->secondary_certificate !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->secondary_certificate) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('secondary_certificate'))
                                                <span class="text-danger">{{ $errors->first('secondary_certificate') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Birth Certificate image</label>
                                            @if($user_movement->birth_certificate_status == 0)
                                                <input type="file" name="birth_certificate" id="birth_certificate" class="d-block" {{ isset($user_movement) ? $user_movement->birth_certificate !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->birth_certificate !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->birth_certificate) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('birth_certificate'))
                                                <span class="text-danger">{{ $errors->first('birth_certificate') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @elseif($user_movement->diploma_status == 0 || $user_movement->authorization_status == 0 || $user_movement->image_status == 0 || $user_movement->last_document_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Register Information</h2>
                                @if($user_movement->diploma != NULL)
                                    <span>Waiting for all Papers to get approved...</span>
                                @endif
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-second-paper-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Diploma image</label>
                                            @if($user_movement->diploma_status == 0)
                                                <input type="file" name="diploma" id="diploma" class="d-block" {{ isset($user_movement) ? $user_movement->diploma !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->diploma !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->diploma) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('diploma'))
                                                <span class="text-danger">{{ $errors->first('diploma') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Authorization image</label>
                                            @if($user_movement->authorization_status == 0)
                                                <input type="file" name="authorization" id="authorization" class="d-block" {{ isset($user_movement) ? $user_movement->authorization !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->authorization !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->authorization) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('authorization'))
                                                <span class="text-danger">{{ $errors->first('authorization') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Personal image</label>
                                            @if($user_movement->image_status == 0)
                                                <input type="file" name="image" id="image" class="d-block" {{ isset($user_movement) ? $user_movement->image !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->image !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->image) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Last Document image</label>
                                            @if($user_movement->last_document_status == 0)
                                                <input type="file" name="last_document" id="last_document" class="d-block" {{ isset($user_movement) ? $user_movement->last_document !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->last_document !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->last_document) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('last_document'))
                                                <span class="text-danger">{{ $errors->first('last_document') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @elseif($admissionInfo->account_finance_first_image == NULL || $admissionInfo->account_finance_first_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Login Information</h2>
                                @if($admissionInfo->account_finance_first_image != NULL)
                                    <span>Waiting for Money to get approved...</span>
                                @endif
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-first-money-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>First Money image</label>
                                            @if($admissionInfo->account_finance_first_status == 0)
                                                <input type="file" name="account_finance_first_image" id="account_finance_first_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_first_image !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($admissionInfo))
                                                @if($admissionInfo->account_finance_first_image !== NULL)
                                                    <img src="{{ asset('movement/' . $admissionInfo->account_finance_first_image) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('account_finance_first_image'))
                                                <span class="text-danger">{{ $errors->first('account_finance_first_image') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @else
                @if($admissionInfo->deal > $admissionInfo->account_finance_first_number && $admissionInfo->account_finance_second_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_second_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-second-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>second Money image</label>
                                                @if($admissionInfo->account_finance_second_status == 0)
                                                    <input type="file" name="account_finance_second_image" id="account_finance_second_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_second_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_second_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_second_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_second_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_second_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @elseif($admissionInfo->deal > ($admissionInfo->account_finance_first_number + $admissionInfo->account_finance_second_number) && $admissionInfo->account_finance_third_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_third_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-third-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>third Money image</label>
                                                @if($admissionInfo->account_finance_third_status == 0)
                                                    <input type="file" name="account_finance_third_image" id="account_finance_third_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_third_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_third_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_third_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_third_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_third_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @elseif($admissionInfo->deal > ($admissionInfo->account_finance_first_number + $admissionInfo->account_finance_second_number + $admissionInfo->account_finance_third_number) && $admissionInfo->account_finance_fourth_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_fourth_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-fourth-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>fourth Money image</label>
                                                @if($admissionInfo->account_finance_fourth_status == 0)
                                                    <input type="file" name="account_finance_fourth_image" id="account_finance_fourth_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_fourth_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_fourth_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_fourth_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_fourth_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_fourth_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @else
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">All Information</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="form-group col-lg-6">
                                        <label>Account Finance First image</label>
                                        <br>
                                        @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_first_image))) 
                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_first_image) }}" width="270px" height="100px">
                                        @endif
                                    </div>
                                </div>  
                                
                                @if($admissionInfo->account_finance_second_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Second image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_second_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_second_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif

                                @if($admissionInfo->account_finance_third_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Third image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_third_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_third_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif

                                @if($admissionInfo->account_finance_fourth_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Fourth image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_fourth_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_fourth_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif
                        </div>
                    </section>
                @endif
            @endif
        @elseif($admissionInfo->degree_needed == 'Master')
            @if($user_movement->passport_status == 0 || $user_movement->secondary_certificate_status == 0 || $user_movement->birth_certificate_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Perosnal Information</h2>
                                <span>Waiting for all Papers to get approved...</span>
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-first-paper-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Passport image</label>
                                            @if($user_movement->passport_status == 0)
                                                <input type="file" name="passport" id="passport" class="d-block" {{ isset($user_movement) ? $user_movement->passport !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->passport !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->passport) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('passport'))
                                                <span class="text-danger">{{ $errors->first('passport') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Secondary Certificate image</label>
                                            @if($user_movement->secondary_certificate_status == 0)
                                                <input type="file" name="secondary_certificate" id="secondary_certificate" class="d-block" {{ isset($user_movement) ? $user_movement->secondary_certificate !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->secondary_certificate !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->secondary_certificate) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('secondary_certificate'))
                                                <span class="text-danger">{{ $errors->first('secondary_certificate') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Birth Certificate image</label>
                                            @if($user_movement->birth_certificate_status == 0)
                                                <input type="file" name="birth_certificate" id="birth_certificate" class="d-block" {{ isset($user_movement) ? $user_movement->birth_certificate !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->birth_certificate !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->birth_certificate) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('birth_certificate'))
                                                <span class="text-danger">{{ $errors->first('birth_certificate') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @elseif($user_movement->bachelor_status == 0 || $user_movement->degree_transcript == 0 || $user_movement->authorization_status == 0 || $user_movement->image_status == 0 || $user_movement->last_document_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Register Information</h2>
                                @if($user_movement->bachelor != NULL)
                                    <span>Waiting for all Papers to get approved...</span>
                                @endif
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-second-paper-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Bachelor image</label>
                                            @if($user_movement->bachelor_status == 0)
                                                <input type="file" name="bachelor" id="bachelor" class="d-block" {{ isset($user_movement) ? $user_movement->bachelor !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->bachelor !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->bachelor) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('bachelor'))
                                                <span class="text-danger">{{ $errors->first('bachelor') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Degree Transcript image</label>
                                            @if($user_movement->degree_transcript_status == 0)
                                                <input type="file" name="degree_transcript" id="degree_transcript" class="d-block" {{ isset($user_movement) ? $user_movement->degree_transcript !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->degree_transcript !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->degree_transcript) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('degree_transcript'))
                                                <span class="text-danger">{{ $errors->first('degree_transcript') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Authorization image</label>
                                            @if($user_movement->authorization_status == 0)
                                                <input type="file" name="authorization" id="authorization" class="d-block" {{ isset($user_movement) ? $user_movement->authorization !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->authorization !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->authorization) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('authorization'))
                                                <span class="text-danger">{{ $errors->first('authorization') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Personal image</label>
                                            @if($user_movement->image_status == 0)
                                                <input type="file" name="image" id="image" class="d-block" {{ isset($user_movement) ? $user_movement->image !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->image !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->image) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Last Document image</label>
                                            @if($user_movement->last_document_status == 0)
                                                <input type="file" name="last_document" id="last_document" class="d-block" {{ isset($user_movement) ? $user_movement->last_document !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->last_document !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->last_document) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('last_document'))
                                                <span class="text-danger">{{ $errors->first('last_document') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @elseif($admissionInfo->account_finance_first_image == NULL || $admissionInfo->account_finance_first_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Login Information</h2>
                                @if($admissionInfo->account_finance_first_image != NULL)
                                    <span>Waiting for Money to get approved...</span>
                                @endif
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-first-money-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>First Money image</label>
                                            @if($admissionInfo->account_finance_first_status == 0)
                                                <input type="file" name="account_finance_first_image" id="account_finance_first_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_first_image !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($admissionInfo))
                                                @if($admissionInfo->account_finance_first_image !== NULL)
                                                    <img src="{{ asset('movement/' . $admissionInfo->account_finance_first_image) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('account_finance_first_image'))
                                                <span class="text-danger">{{ $errors->first('account_finance_first_image') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @else
                @if($admissionInfo->deal > $admissionInfo->account_finance_first_number && $admissionInfo->account_finance_second_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_second_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-second-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>second Money image</label>
                                                @if($admissionInfo->account_finance_second_status == 0)
                                                    <input type="file" name="account_finance_second_image" id="account_finance_second_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_second_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_second_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_second_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_second_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_second_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @elseif($admissionInfo->deal > ($admissionInfo->account_finance_first_number + $admissionInfo->account_finance_second_number) && $admissionInfo->account_finance_third_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_third_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-third-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>third Money image</label>
                                                @if($admissionInfo->account_finance_third_status == 0)
                                                    <input type="file" name="account_finance_third_image" id="account_finance_third_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_third_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_third_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_third_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_third_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_third_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @elseif($admissionInfo->deal > ($admissionInfo->account_finance_first_number + $admissionInfo->account_finance_second_number + $admissionInfo->account_finance_third_number) && $admissionInfo->account_finance_fourth_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_fourth_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-fourth-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>fourth Money image</label>
                                                @if($admissionInfo->account_finance_fourth_status == 0)
                                                    <input type="file" name="account_finance_fourth_image" id="account_finance_fourth_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_fourth_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_fourth_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_fourth_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_fourth_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_fourth_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @else
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">All Information</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="form-group col-lg-6">
                                        <label>Account Finance First image</label>
                                        <br>
                                        @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_first_image))) 
                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_first_image) }}" width="270px" height="100px">
                                        @endif
                                    </div>
                                </div>  
                                
                                @if($admissionInfo->account_finance_second_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Second image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_second_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_second_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif

                                @if($admissionInfo->account_finance_third_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Third image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_third_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_third_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif

                                @if($admissionInfo->account_finance_fourth_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Fourth image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_fourth_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_fourth_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif
                        </div>
                    </section>
                @endif
            @endif
        @else
            @if($user_movement->passport_status == 0 || $user_movement->secondary_certificate_status == 0 || $user_movement->birth_certificate_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Perosnal Information</h2>
                                <span>Waiting for all Papers to get approved...</span>
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-first-paper-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Passport image</label>
                                            @if($user_movement->passport_status == 0)
                                                <input type="file" name="passport" id="passport" class="d-block" {{ isset($user_movement) ? $user_movement->passport !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->passport !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->passport) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('passport'))
                                                <span class="text-danger">{{ $errors->first('passport') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Secondary Certificate image</label>
                                            @if($user_movement->secondary_certificate_status == 0)
                                                <input type="file" name="secondary_certificate" id="secondary_certificate" class="d-block" {{ isset($user_movement) ? $user_movement->secondary_certificate !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->secondary_certificate !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->secondary_certificate) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('secondary_certificate'))
                                                <span class="text-danger">{{ $errors->first('secondary_certificate') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Birth Certificate image</label>
                                            @if($user_movement->birth_certificate_status == 0)
                                                <input type="file" name="birth_certificate" id="birth_certificate" class="d-block" {{ isset($user_movement) ? $user_movement->birth_certificate !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->birth_certificate !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->birth_certificate) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('birth_certificate'))
                                                <span class="text-danger">{{ $errors->first('birth_certificate') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @elseif($user_movement->master_status == 0 || $user_movement->authorization_status == 0 || $user_movement->image_status == 0 || $user_movement->last_document_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Register Information</h2>
                                @if($user_movement->master != NULL)
                                    <span>Waiting for all Papers to get approved...</span>
                                @endif
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-second-paper-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>master image</label>
                                            @if($user_movement->master_status == 0)
                                                <input type="file" name="master" id="master" class="d-block" {{ isset($user_movement) ? $user_movement->master !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->master !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->master) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('master'))
                                                <span class="text-danger">{{ $errors->first('master') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Authorization image</label>
                                            @if($user_movement->authorization_status == 0)
                                                <input type="file" name="authorization" id="authorization" class="d-block" {{ isset($user_movement) ? $user_movement->authorization !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->authorization !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->authorization) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('authorization'))
                                                <span class="text-danger">{{ $errors->first('authorization') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Personal image</label>
                                            @if($user_movement->image_status == 0)
                                                <input type="file" name="image" id="image" class="d-block" {{ isset($user_movement) ? $user_movement->image !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->image !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->image) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Last Document image</label>
                                            @if($user_movement->last_document_status == 0)
                                                <input type="file" name="last_document" id="last_document" class="d-block" {{ isset($user_movement) ? $user_movement->last_document !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($user_movement))
                                                @if($user_movement->last_document !== NULL)
                                                    <img src="{{ asset('movement/' . $user_movement->last_document) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('last_document'))
                                                <span class="text-danger">{{ $errors->first('last_document') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @elseif($admissionInfo->account_finance_first_image == NULL || $admissionInfo->account_finance_first_status == 0)
                <section class="register-section pt-100 pb-100">
                    <div class="container">

                        @if(Session::has('flash_message'))
                            <div class="container">
                                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif
                        <div class="register-box">
                            
                            <div class="sec-title text-center mb-30">
                                <h2 class="title mb-10">Login Information</h2>
                                @if($admissionInfo->account_finance_first_image != NULL)
                                    <span>Waiting for Money to get approved...</span>
                                @endif
                            </div>
                            
                            <div class="styled-form">
                                {{-- <div id="form-messages"></div> --}}
                                <form action="{{ route('submit-first-money-info') }}" method="POST" enctype="multipart/form-data">    
                                    @csrf                           
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>First Money image</label>
                                            @if($admissionInfo->account_finance_first_status == 0)
                                                <input type="file" name="account_finance_first_image" id="account_finance_first_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_first_image !== NULL ? null : 'required' : 'required' }}>
                                            @endif
                                            @if(isset($admissionInfo))
                                                @if($admissionInfo->account_finance_first_image !== NULL)
                                                    <img src="{{ asset('movement/' . $admissionInfo->account_finance_first_image) }}" width="270px" height="100px">
                                                @endif
                                            @endif
                                            @if($errors->has('account_finance_first_image'))
                                                <span class="text-danger">{{ $errors->first('account_finance_first_image') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                            <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
            @else
                @if($admissionInfo->deal > $admissionInfo->account_finance_first_number && $admissionInfo->account_finance_second_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_second_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-second-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>second Money image</label>
                                                @if($admissionInfo->account_finance_second_status == 0)
                                                    <input type="file" name="account_finance_second_image" id="account_finance_second_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_second_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_second_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_second_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_second_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_second_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @elseif($admissionInfo->deal > ($admissionInfo->account_finance_first_number + $admissionInfo->account_finance_second_number) && $admissionInfo->account_finance_third_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_third_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-third-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>third Money image</label>
                                                @if($admissionInfo->account_finance_third_status == 0)
                                                    <input type="file" name="account_finance_third_image" id="account_finance_third_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_third_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_third_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_third_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_third_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_third_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @elseif($admissionInfo->deal > ($admissionInfo->account_finance_first_number + $admissionInfo->account_finance_second_number + $admissionInfo->account_finance_third_number) && $admissionInfo->account_finance_fourth_status == 0)
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">Login Information</h2>
                                    @if($admissionInfo->account_finance_fourth_image != NULL)
                                        <span>Waiting for Money to get approved...</span>
                                    @endif
                                </div>
                                
                                <div class="styled-form">
                                    {{-- <div id="form-messages"></div> --}}
                                    <form action="{{ route('submit-fourth-money-info') }}" method="POST" enctype="multipart/form-data">    
                                        @csrf                           
                                        <div class="row clearfix">
                                            <div class="form-group col-lg-6">
                                                <label>fourth Money image</label>
                                                @if($admissionInfo->account_finance_fourth_status == 0)
                                                    <input type="file" name="account_finance_fourth_image" id="account_finance_fourth_image" class="d-block" {{ isset($admissionInfo) ? $admissionInfo->account_finance_fourth_image !== NULL ? null : 'required' : 'required' }}>
                                                @endif
                                                @if(isset($admissionInfo))
                                                    @if($admissionInfo->account_finance_fourth_image !== NULL)
                                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_fourth_image) }}" width="270px" height="100px">
                                                    @endif
                                                @endif
                                                @if($errors->has('account_finance_fourth_image'))
                                                    <span class="text-danger">{{ $errors->first('account_finance_fourth_image') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                                <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                @else
                    <section class="register-section pt-100 pb-100">
                        <div class="container">

                            @if(Session::has('flash_message'))
                                <div class="container">
                                    <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="register-box">
                                
                                <div class="sec-title text-center mb-30">
                                    <h2 class="title mb-10">All Information</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="form-group col-lg-6">
                                        <label>Account Finance First image</label>
                                        <br>
                                        @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_first_image))) 
                                        <img src="{{ asset('movement/' . $admissionInfo->account_finance_first_image) }}" width="270px" height="100px">
                                        @endif
                                    </div>
                                </div>  
                                
                                @if($admissionInfo->account_finance_second_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Second image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_second_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_second_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif

                                @if($admissionInfo->account_finance_third_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Third image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_third_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_third_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif

                                @if($admissionInfo->account_finance_fourth_image != NULL)
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6">
                                            <label>Account Finance Fourth image</label>
                                            <br>
                                            @if(file_exists(public_path('movement/'. $admissionInfo->account_finance_fourth_image))) 
                                            <img src="{{ asset('movement/' . $admissionInfo->account_finance_fourth_image) }}" width="270px" height="100px">
                                            @endif
                                        </div>
                                    </div> 
                                @endif
                        </div>
                    </section>
                @endif
            @endif
        @endif
    @else
        <section class="register-section pt-100 pb-100">
            <div class="container">

                @if(Session::has('flash_message'))
                    <div class="container">
                        <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                            {{ Session::get('flash_message') }}
                        </div>
                    </div>
                @endif
                <div class="register-box">
                    
                    <div class="sec-title text-center mb-30">
                        <h2 class="title mb-10">Academic Information</h2>
                    </div>
                    
                    <div class="styled-form">
                        {{-- <div id="form-messages"></div> --}}
                        <form action="{{ route('submit-first-paper-info') }}" method="POST" enctype="multipart/form-data">    
                            @csrf                           
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <label>Passport image</label>
                                    <input type="file" name="passport" id="passport" class="d-block" required>
                                    @if($errors->has('passport'))
                                        <span class="text-danger">{{ $errors->first('passport') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Secondary Certificate image</label>
                                    <input type="file" name="secondary_certificate" id="secondary_certificate" class="d-block" required>
                                    @if($errors->has('secondary_certificate'))
                                        <span class="text-danger">{{ $errors->first('secondary_certificate') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Birth Certificate image</label>
                                    <input type="file" name="birth_certificate" id="birth_certificate" class="d-block" required>
                                    @if($errors->has('birth_certificate'))
                                        <span class="text-danger">{{ $errors->first('birth_certificate') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>
    @endif
@endsection