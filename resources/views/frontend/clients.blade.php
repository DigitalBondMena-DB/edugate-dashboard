@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | Our Partners
    @else
        اديو جيت | شركائنا
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

    @if(app()->getLocale() == 'en')
        <!-- Start Banner 
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/partners/1.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>PARTNERS</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">Partners</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/partners/2.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>PARTNERS </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">Partners</li>
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
    <!-- End Banner -->

    <!-- start section school partners 
    ============================================= -->
        <!-- Star partners
    ============================================= -->
    
    <!-- End partners -->
    <section class="why-choseus-area partners default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h2>Our Partners </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Fixed BG -->
        <div class="container">
            <div class="row partners-single">
                @foreach($clientsSchools as $clientsSchool)
                <a href="{{ $clientsSchool->link }}" class="col-lg-3 my-4 info">
                    <img src="{{ asset('clients/'. $clientsSchool->logo) }}" class="w-100" style="height:250px" alt="">
                    <div class="layer row no-gutters align-items-center justify-content-center">
                                            <h5 style="color:#fff !important;">{{ $clientsSchool->en_name }}</h5>
                                        </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end section school partners -->
    @else
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/partners/1.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>شركاؤنا</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">شركاؤنا</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/partners/2.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>شركاؤنا</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">شركاؤنا</li>
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
    <!-- End Banner -->

    <!-- start section school partners 
    ============================================= -->
        <!-- Star partners
    ============================================= -->
    <!-- End partners -->
    <section class="why-choseus-area partners default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-heading text-center">
                        <h2>شركاء اخرين</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Fixed BG -->
        <div class="container">
            <div class="row partners-single" dir="ltr">
                @foreach($clientsSchools as $clientsSchool)
                <a href="{{ $clientsSchool->link }}" class="col-lg-3 my-4 info">
                    <img src="{{ asset('clients/'. $clientsSchool->logo) }}" class="w-100" style="height:250px" alt="">
                    <div class="layer row no-gutters align-items-center justify-content-center" >
                                            <h5 style="color:#fff !important;">{{ $clientsSchool->ar_name }}</h5>
                                        </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @include('frontend.layouts.footer')
@endsection