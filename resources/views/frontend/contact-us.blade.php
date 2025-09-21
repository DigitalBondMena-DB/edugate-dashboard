
@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | Contact Us 
    @else
        اديو جيت | تواصل معنا
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

    @if(app()->getLocale() == 'en')
    <style>
        
             .form-control-validation {
                margin-bottom: 10px;
                padding-bottom: 20px;
                position: relative;
            }


             .form-control-validation.success input {
                border-color: #2ecc71;
            }

             .form-control-validation.error input {
                border-color: #e74c3c;
            }
             .form-control-validation.success select {
                border-color: #2ecc71;
            }
             .form-control-validation.success textarea {
                border-color: #2ecc71;
            }
             .form-control-validation.error textarea {
                border-color: #e74c3c;
            }

             .form-control-validation.error select {
                border-color: #e74c3c;
            }
             .form-control-validation i {
                display: none;
                position: absolute;
                top: 20%;
                transform: translate(-50%,50%);
                right: 10px;
            }

             .form-control-validation.success i.fa-check-circle {
                color: #2ecc71;
                display: block;
            }

             .form-control-validation.error i.fa-exclamation-circle {
                color: #e74c3c;
                display: block;
            }

             .form-control-validation small {
                color: #e74c3c;
                position: absolute;
                bottom: -5px;
                right: 15px;
                display: none;
            }

             .form-control-validation.error small {
                display:none;
    </style>
    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="banner-area bg-gray transparent-nav default bottom-large">
        <div id="bootcarousel" class="carousel text-light slide carousel-fade animate_text" data-ride="carousel">

            <!-- Indicators for slides -->
            <div class="carousel-indicator">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="carousel-indicators">
                                <li data-target="#bootcarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#bootcarousel" data-slide-to="1"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">
                <div class="carousel-item active">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/contact/1.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>Contact us</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">Contact us</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/contact/2.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>Contact us</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">Contact us</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
                <i class="ti-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
                <i class="ti-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>

        </div>
        
    </div>

    <!-- End Breadcrumb -->

    <!-- Start Contact Area
    ============================================= -->
    <div class="contact-area default-padding">
        <div class="container">
            <div class="contact-items">
                <div class="row ">
                    <div class="col-lg-4 left-item">
                        <div class="info-items">
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="info">
                                    <h5>Location</h5>
                                    <p>
                                        {{ $contact->en_address }}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="fas fa-envelope-open"></i>
                                </div>
                                <div class="info">
                                    <h5>Send a Mail</h5>
                                    <p>
                                         {{ $contact->email }}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                    </div>
                    <div class="col-lg-8 right-item">
                        <h5>Need Help?</h5>
                        <h2>Keep in Touch</h2>
                        <form action="{{ route('send-feedback') }}" method="POST" class="contact-form">
                           @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone" type="number" required min="0">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                @error('phone')
                                            <span role="alert" class="alert alert-danger col-12">
                                                <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="message" name="message" placeholder="Tell Us About Project *" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit">
                                        Send Message <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-lg-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    @else
            <!-- Start Breadcrumb 
    ============================================= -->
    <style>
        
             .form-control-validation {
                margin-bottom: 10px;
                padding-bottom: 20px;
                position: relative;
            }


             .form-control-validation.success input {
                border-color: #2ecc71;
            }

             .form-control-validation.error input {
                border-color: #e74c3c;
            }
             .form-control-validation.success select {
                border-color: #2ecc71;
            }
             .form-control-validation.success textarea {
                border-color: #2ecc71;
            }
             .form-control-validation.error textarea {
                border-color: #e74c3c;
            }

             .form-control-validation.error select {
                border-color: #e74c3c;
            }
             .form-control-validation i {
                display: none;
                position: absolute;
                top: 20%;
                transform: translate(-50%,50%);
                right: 10px;
            }

             .form-control-validation.success i.fa-check-circle {
                color: #2ecc71;
                display: block;
            }

             .form-control-validation.error i.fa-exclamation-circle {
                color: #e74c3c;
                display: block;
            }

             .form-control-validation small {
                color: #e74c3c;
                position: absolute;
                bottom: -5px;
                right: 15px;
                display: none;
            }

             .form-control-validation.error small {
                display:none;
    </style>
    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="banner-area bg-gray transparent-nav default bottom-large">
        <div id="bootcarousel" class="carousel text-light slide carousel-fade animate_text" data-ride="carousel">

            <!-- Indicators for slides -->
            <div class="carousel-indicator">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="carousel-indicators">
                                <li data-target="#bootcarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#bootcarousel" data-slide-to="1"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">
                <div class="carousel-item active">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/contact/1.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>تواصل معنا</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">تواصل معنا</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/contact/2.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>تواصل معنا</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">تواصل معنا</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
                <i class="ti-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
                <i class="ti-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>

        </div>
        
    </div>

    <!-- End Breadcrumb -->

    <!-- Start Contact Area
    ============================================= -->
    <div class="contact-area default-padding">
        <div class="container">
            <div class="contact-items">
                <div class="row ">
                    <div class="col-lg-4 left-item">
                        <div class="info-items">
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="info">
                                    <h5>الموقع</h5>
                                    <p>
                                        {{ $contact->en_address }}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="fas fa-envelope-open"></i>
                                </div>
                                <div class="info">
                                    <h5>البريد الالكتروني</h5>
                                    <p>
                                         {{ $contact->email }}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                    </div>
                    <div class="col-lg-8 right-item">
                        <h5>هل تريد المساعدة؟</h5>
                        <h2>تواصل معنا الآن!</h2>
                        <form action="{{ route('send-feedback') }}" method="POST" class="contact-form">
                           @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" required placeholder="الاسم" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" required placeholder="البريد الالكتروني*" type="email">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" required placeholder="رقم الهاتف" type="number" min="0" >   
                                        
                                        @error('phone')
                                        <span role="alert" class="alert alert-danger col-6">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="message" name="message" required placeholder="اخبرنا بما تريد معرفته*"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit">
                                        ارسال رساله <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-lg-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
    @endif

    @include('frontend.layouts.footer')
    <script>
            const Contactform = document.getElementById('contactForm');
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const phone = document.getElementById('phone');
            const message = document.getElementById('message');
            const requestType = document.getElementById('request_type');
            

            var formErrors = [];

            Contactform.addEventListener('submit', e => {
                checkInputs();
                if(formErrors.length) {
                    e.preventDefault();
                }
            });

            function checkInputs() {
                formErrors = [];
                // trim to remove the whitespaces
                const nameValue = name.value.trim();
                const emailValue = email.value.trim();
                const phoneValue = phone.value.trim();
                const messageValue = message.value.trim();
                const requestTypeValue = requestType.value.trim();
                
                
                
                
                
                if(phoneValue === '') {
                    formErrors.push('Phone required');
                    setErrorFor(phone, 'Phone required');
                } else {
                    setSuccessFor(phone);
                }
                if(nameValue === '') {
                    formErrors.push('Name required');
                    setErrorFor(name, 'Name required');
                } else {
                    setSuccessFor(name);
                }
                if(messageValue === '') {
                    formErrors.push('Message required');
                    setErrorFor(message, 'Message required');
                } else {
                    setSuccessFor(message);
                }
                if(requestTypeValue === '') {
                    formErrors.push('Request Type required');
                    setErrorFor(requestType, 'Request Type required');
                } else {
                    setSuccessFor(requestType);
                }
                
                if(emailValue === '') {
                    formErrors.push('Email is required');
                    setErrorFor(email, 'Email is required');
                } else if (!isEmail(emailValue)) {
                    formErrors.push('Email is not valid required');
                    setErrorFor(email, 'Email is not valid required');
                } else {
                    setSuccessFor(email);
                }
                function setErrorFor(input, message) {
                    const formControl = input.parentElement;
                    const small = formControl.querySelector('small');
                    formControl.className = 'form-group form-control-validation error';
                    small.innerText = message;
                }

                function setSuccessFor(input) {
                    const formControl = input.parentElement;
                    formControl.className = 'form-group  form-control-validation success';
                }
                function isEmail(email) {
                    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
                }
            }
</script>
@endsection

