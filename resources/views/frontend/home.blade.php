@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        Edugate | Login
    @else
        Edugate | تسجيل الدخول
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

    <!-- Main content Start -->
        <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('frontend/img/contact/19-FEB-2020-Edu-Gate-Fair-2020-115.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Log In</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Log In</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
        <div class="main-content">
            <!-- Breadcrumbs Start -->

            <!-- Breadcrumbs End -->

            <div class="contact-area default-padding">
                <div class="container">
                    @if(Session::has('flash_message'))
                        <div class="{{ Session::get('flash_class') }}">
                        {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    <div class="contact-items p-0">
                                  <form method="POST" action="{{ route('login') }}" class="form-group">
                                        <div class="row align-center  justify-content-center">  
                                                        <div class="col-lg-5">
                                                            <img class="" src="{{asset('frontend/img/banner/Dashboard.jpg')}}" alt="">
                                                        </div>
                                                        <div class="col-lg-7">
                                                                <div class="row p-3">
                                                                    @csrf
                                                                    <div class="form-group col-lg-12">
                                                                    <label for="">Email</label>
                                                                    <input type="email" name="email" placeholder="E-mail" required class="form-group">
                                                                    
                                                                    </div>
                                                                    @error('email')
                                                                        <p role="alert">
                                                                            <strong style="color: red">{{ $message }}</strong>
                                                                        </p>
                                                                    @enderror
                                                                    <div class="form-group col-lg-12">
                                                                    <label for="">Password</label>
                                                                    <input type="password" name="password" placeholder="Password" required>
                                                                    </div>
                                                                    @error('password')
                                                                        <p role="alert">
                                                                            <strong style="color: red">{{ $message }}</strong>
                                                                        </p>
                                                                    @enderror
                                                                    <div class="col-12 text-center">
                                                                    <button type="submit" class="btn btn-gradient">login</button>
                                                                    </div>
                                                                </div>
                                                        </div>
                                    </div>
                                </form>
                </div>
            </div>
        </div> 
    
    <!-- Main content End --> 

    @include('frontend.layouts.footer')
@endsection