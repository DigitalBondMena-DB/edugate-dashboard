
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/img/contact/1Contact.jpg') }}"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>Thank You</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">thank You</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/img/contact/2Contact.jpg') }}"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>Thank YOu</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">Thank You</li>
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
     <main  class="main-content ">
        <section id="thanks-section" class="thanks-section">
            <div class="jumbotron bg-white text-center py-1">

                <img src="{{ asset('frontend/img/F.png')}}" class="h-150" alt="">
                <h1 class="display-3 text-success">Thank you</h1>
                <p class="thanks-paragraph">Your message has been received and we will get in touch with you soon!</p>

                <p class="lead">
                  <a class="btn btn-gradient" href="https://digitalbondmena.com/edugate/en" role="button">Continue to Home page</a>
                </p>

            </div>
        </section>


    </main>
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/img/contact/1Contact.jpg') }}"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>شكرا لك</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">شكرا لك</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/img/contact/2Contact.jpg') }}"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>شكرا لك</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">شكرا لك</li>
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
    
    <main class="main-content ">

        <section id="thanks-section" class="bg-white jumbotron text-center py-1">

            <img src="{{ asset('frontend/img/F.png')}}" class="h-150" alt="">
            <h1 class="display-top-bar3 text-success">شكرًا لتسجيلك</h1>
            <p class="thanks-paragraph">تم استلام رسالتك وسنقوم بالتواصل معك في أقرب وقت!</p>

            <p class="lead">
              <a class="btn btn-gradient" href="https://digitalbondmena.com/edugate/ar" role="button">اذهب للصفحة الرئيسية</a>
            </p>
          </section>


        
    </main>

    <!-- End Breadcrumb -->

    <!-- Start Contact Area
    ============================================= -->
 
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

