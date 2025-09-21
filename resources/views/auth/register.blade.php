@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EGEC | Register
    @else
        EGEC | تسجيل
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

    <!-- Main content Start -->
    @if(app()->getLocale() == 'en')
        <div class="main-content">
            <!-- Breadcrumbs Start -->
            <div class="rs-breadcrumbs breadcrumbs-overlay">
                <div class="breadcrumbs-text ">
                    <h1 class="page-title">Register</h1>
                    <ul>
                        <li>
                            <a class="active" href="index.html">Home</a>
                        </li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumbs End -->

            <!-- Register Section -->
            <section class="register-section pt-100 pb-100">
                <div class="container">
                    <div class="register-box">
                        
                        <div class="sec-title text-center mb-30">
                            <h2 class="title mb-10">Create New Account</h2>
                        </div>
                        
                        <div class="styled-form">
                            {{-- <div id="form-messages"></div> --}}
                            <form method="POST" action="{{ route('register') }}">    
                                @csrf                           
                                <div class="row clearfix">
                                    <div class="form-group col-lg-12">
                                        <input type="name" id="name" name="name" value="" placeholder="Name" required>
                                        @error('name')
                                            <span role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="number" id="phone" name="phone" placeholder="Phone number" required>
                                        @error('phone')
                                            <span role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                    <div class="form-group col-lg-6">
                                        <input type="email" id="email" name="email" value="" placeholder="Email address" required>
                                        @error('email')
                                            <span role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>   
                                    <div class="form-group col-lg-6">
                                        <input type="password" id="password" name="password" value="" placeholder="Password" required>
                                        @error('password')
                                            <span role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>    
                                    <div class="form-group col-lg-6">
                                        <input type="password" id="password_confirmation" name="password_confirmation" value="" placeholder="Confirm Password" required>
                                    </div>
                                    
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="readon register-btn"><span class="txt">Sign Up</span></button>
                                    </div>

                                    <div class="col-md-6">
                                        <a href="{{ route('facebook-login') }}" style="width:100%" class="btn btn-facebook"><i class="fa fa-facebook" style="margin-right:10px;" aria-hidden="true"></i>Login with facebook</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('google-login') }}" style="width:100%" class="btn btn-google"><i class="fa fa-google-plus" style="margin-right:10px;" aria-hidden="true"></i>Login with google</a>
                                    </div>
                                        
                                    <br><br>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="users">Already have an account? <a href="{{ route('login') }}">Sign In</a></div>
                                    </div>
                                    
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- End Register Section --> 
        </div> 
    @else
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-text ">
                <h1 class="page-title">تسجيل</h1>
                <ul>
                    <li>
                        الرئيسية
                    </li>
                    <li><a>تسجيل</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Register Section -->
        <section class="register-section pt-100 pb-100">
            <div class="container">
                <div class="register-box">
                    
                    <div class="sec-title text-center mb-30">
                        <h2 class="title mb-10">انشاء حساب جديد</h2>
                    </div>
                    
                    <div class="styled-form">
                        {{-- <div id="form-messages"></div> --}}
                        <form method="POST" action="{{ route('register') }}">    
                            @csrf                           
                            <div class="row clearfix">
                                <div class="form-group col-lg-12">
                                    <input type="name" id="name" name="name" value="" placeholder="الاسم" required>
                                    @error('name')
                                        <span role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="number" id="phone" name="phone" placeholder="رقم الهاتف" required>
                                    @error('phone')
                                        <span role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="form-group col-lg-6">
                                    <input type="email" id="email" name="email" value="" placeholder="البريد الالكترونى" required>
                                    @error('email')
                                        <span role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>   
                                <div class="form-group col-lg-6">
                                    <input type="password" id="password" name="password" value="" placeholder="كلمه السر" required>
                                    @error('password')
                                        <span role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                                <div class="form-group col-lg-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" value="" placeholder="تأكيد كلمة المرور" required>
                                </div>
                                
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="readon register-btn"><span class="txt">سجل</span></button>
                                </div>
                                
                                <div class="col-md-6">
                                    <a href="{{ route('facebook-login') }}" style="width:100%" class="btn btn-facebook"><i class="fa fa-facebook" style="margin-right:10px;" aria-hidden="true"></i> تسجيل الدخول باستخدام الفيسبوك</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('google-login') }}" style="width:100%" class="btn btn-google"><i class="fa fa-google-plus" style="margin-right:10px;" aria-hidden="true"></i> تسجيل الدخول باستخدام جوجل</a>
                                </div>

                                <br><br>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="users">هل لديك حساب؟ <a href="{{ route('login') }}">تسجيل الدخول</a></div>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Register Section --> 
    </div>
    @endif
    <!-- Main content End --> 

    @include('frontend.layouts.footer')
@endsection