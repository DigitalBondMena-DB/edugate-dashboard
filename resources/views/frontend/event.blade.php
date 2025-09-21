@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | Event 
    @else
        اديو جيت | الاحداث
	@endif
@endsection
@section('css')

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/Events/1.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"> <strong> {{ $eventCategery->en_name }} </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">{{ $eventCategery->en_name }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/Events/2.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>{{ $eventCategery->en_name }}</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">{{ $eventCategery->en_name }}</li>
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

    <!-- Star Gallery
    ============================================= -->
    

    <section class="events default-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 site-heading text-center">
                        <h2 class="text-main">Our events</h2>
                    </div>
            </div>
            <div class="row no-gutters justify-content-around">
                @foreach($eventDetails as $eventDetail)
                    @if($eventDetail->event_category_id == $eventCategery->id)
                <a href="#exh" class="btn btn-lg btn-gradient">{{ $eventDetail->en_name }}</a>
                    @endif
                @endforeach
            </div>
            
        </div>
    </section>
    <!-- Start Video Area
    ============================================= -->
    
    <div class="video-area padding-xl text-center bg-fixed text-light shadow dark-hard" style="background-image: url({{ asset('frontend/img/banner/6.jpg') }}">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="video-heading">
                        <a class="popup-youtube relative video-play-button" href="https://www.youtube.com/watch?v=8GQTt50izkg">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Video Area -->
        <!-- End Gallery -->

    <!-- Star gallery Area 1
    ============================================= -->
    @foreach($eventDetails as $eventDetail)
        @if(($eventDetail->id %2) == 0)
            <section id="exh" class="gallery bg-gray default-padding">
                <div class="container">
                    <div class="row  justify-content-center">
                        @if(($eventDetail->id %2) == 0)
                            <div class="col-lg-6">
                                <h3 class="text-main mb-5">{{ $eventDetail->en_name }}</h3>
                                <p class="text-align-justify"> {{ $eventDetail->en_text }} </p>
                            </div>
                            <div class="col-lg-6">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;overflow:hidden" class="swiper-container mySwiper2 mainSlider">
                                            <div class="swiper-wrapper">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                            </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
                                            <div class="swiper-wrapper justify-content-center">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                            </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;overflow:hidden" class="swiper-container mySwiper2 mainSlider">
                                            <div class="swiper-wrapper ">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_category_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                            </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
                                    <div class="swiper-wrapper ">
                                        <div class="swiper-slide">
                                                    @foreach($eventGallarys as $eventGallary)
                                                    @if($eventGallary->event_category_id == $eventDetail->id)
                                                        <div class="swiper-slide">
                                                                <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                        </div>        
                                                    @endif    
                                                    @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="text-main mb-5">{{ $eventDetail->en_name }}</h3>
                                <p> {{ $eventDetail->en_text }} </p>
                            </div>
                        @endif    
                    </div>
                </div>
            </section>
        @else 
            <section id="exh" class="gallery  default-padding">
                <div class="container">
@section('css')

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

@endsection                        @if(($eventDetail->id %2) == 0)
                            <div class="col-lg-6">
                                <h3 class="text-main mb-5">{{ $eventDetail->en_name }}</h3>
                                <p class="text-align-justify"> {{ $eventDetail->en_text }} </p>
                            </div>
                            <div class="col-lg-6">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;overflow:hidden" class="swiper-container mySwiper2 mainSlider">
                                            <div class="swiper-wrapper ">
                                                @foreach($eventGallarys as $eventGallary)
                                                    @if($eventGallary->event_detail_id == $eventDetail->id)
                                                        <div class="swiper-slide">
                                                            <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                        </div>
                                                    @endif    
                                                @endforeach
                                            </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
                                            <div class="swiper-wrapper justify-content-center">
                                                    @foreach($eventGallarys as $eventGallary)
                                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                            <div class="swiper-slide">
                                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                            </div>
                                                        @endif    
                                                    @endforeach
                                            </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;overflow:hidden" class="swiper-container mySwiper2 mainSlider">
                                            <div class="swiper-wrapper ">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                            </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
                                            <div class="swiper-wrapper ">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                        </div>
                                            
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="text-main mb-5">{{ $eventDetail->en_name }}</h3>
                                <p> {{ $eventDetail->en_text }} </p>
                            </div>
                        @endif    
                    </div>
                </div>
            </section>
        @endif    
    @endforeach
    <!-- End gallery 2 -->

   
    <!-- End gallery -->
    
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/Events/1.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"> <strong> {{ $eventCategery->ar_name }} </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">{{ $eventCategery->ar_name }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/Events/2.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>{{ $eventCategery->ar_name }}</strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home' )}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">{{ $eventCategery->ar_name }}</li>
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

    <!-- Star Gallery
    ============================================= -->
    

    <section class="events default-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 site-heading text-center">
                        <h2 class="text-main">احداثنا</h2>
                    </div>
            </div>
            <div class="row no-gutters justify-content-around">
                @foreach($eventDetails as $eventDetail)
                    @if($eventDetail->event_category_id == $eventCategery->id)
                <a href="#exh" class="btn btn-lg btn-gradient">{{ $eventDetail->ar_name }}</a>
                    @endif
                @endforeach
            </div>
            
        </div>
    </section>
    <!-- Start Video Area
    ============================================= -->
    
    <div class="video-area padding-xl text-center bg-fixed text-light shadow dark-hard" style="background-image: url({{ asset('frontend/img/banner/6.jpg') }}">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-heading">
                        <a class="popup-youtube relative video-play-button" href="https://www.youtube.com/watch?v=8GQTt50izkg">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Video Area -->
        <!-- End Gallery -->

    <!-- Star gallery Area 1
    ============================================= -->
    @foreach($eventDetails as $eventDetail)
        @if(($eventDetail->id %2) == 0)
            <section id="exh" class="gallery bg-gray default-padding">
                <div class="container">
                    <div class="row ">
                        @if(($eventDetail->id %2) == 0)
                            <div class="col-lg-6">
                                <h3 class="text-main mb-5">{{ $eventDetail->ar_name }}</h3>
                                <p class="text-align-justify"> {{ $eventDetail->ar_text }} </p>
                            </div>
                            <div class="col-lg-6">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff; overflow:hidden;" class="swiper-container mySwiper2 mainSlider">
                                            <div class="swiper-wrapper ">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                            </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
                                            <div class="swiper-wrapper ">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                <div class="swiper-slide justify-content-center">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                            </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper-container mySwiper2 mainSlider">
                                            <div class="swiper-wrapper ">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_category_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                            </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
                                    <div class="swiper-wrapper justify-content-center">
                                        <div class="swiper-slide ">
                                                    @foreach($eventGallarys as $eventGallary)
                                                    @if($eventGallary->event_category_id == $eventDetail->id)
                                                        <div class="swiper-slide">
                                                                <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                        </div>        
                                                    @endif    
                                                    @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="text- mb-5">{{ $eventDetail->ar_name }}</h3>
                                <p class="text-align-justify"> {{ $eventDetail->ar_text }} </p>
                            </div>
                        @endif    
                    </div>
                </div>
            </section>
        @else 
            <section id="exh" class="gallery  default-padding">
                <div class="container">
                    <div class="row ">
                        @if(($eventDetail->id %2) == 0)
                            <div class="col-lg-6">
                                <h3 class="text-main mb-5">{{ $eventDetail->ar_name }}</h3>
                                <p> {{ $eventDetail->ar_text }} </p>
                            </div>
                            <div class="col-lg-6">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff; overflow:hidden" class="swiper-container mySwiper2 mainSlider">
                                            <div class="swiper-wrapper ">
                                                @foreach($eventGallarys as $eventGallary)
                                                    @if($eventGallary->event_detail_id == $eventDetail->id)
                                                        <div class="swiper-slide">
                                                            <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                        </div>
                                                    @endif    
                                                @endforeach
                                            </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
                                            <div class="swiper-wrapper justify-content-center">
                                                    @foreach($eventGallarys as $eventGallary)
                                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                            <div class="swiper-slide">
                                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                            </div>
                                                        @endif    
                                                    @endforeach
                                            </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fffl overflow:hidden;" class="swiper-container mySwiper2 mainSlider">
                                            <div class="swiper-wrapper ">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                            </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
                                            <div class="swiper-wrapper justify-content-center">
                                    @foreach($eventGallarys as $eventGallary)
                                        @if($eventGallary->event_detail_id == $eventDetail->id)
                                                <div class="swiper-slide">
                                                    <img src="{{asset('eventGallary/'. $eventGallary->image)}}" />
                                                </div>
                                        @endif    
                                    @endforeach
                                        </div>
                                            
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="text-main mb-5">{{ $eventDetail->ar_name }}</h3>
                                <p> {{ $eventDetail->ar_text }} </p>
                            </div>
                        @endif    
                    </div>
                </div>
            </section>
        @endif    
    @endforeach
    <!-- End gallery 2 -->

   
    <!-- End gallery -->
    
    @endif
    

    @include('frontend.layouts.footer')
@endsection
@section('scripts')
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection