@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | {{ $university->en_name }} 
    @else
        EduGate | {{ $university->ar_name }} 
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')


        <!-- Main content Start -->
        @if(app()->getLocale() == 'en')
            <div class="main-content">

                <div class="inner-hdr" style="background-image:url({{ '/edugate/universities/'. $university->banner_image }} )">
                    <!--small-banner-->
                    <div class="small-banner">
                        <div class="container">
                            <!--title-->
                            <div class="title">
                                <h3>{{ $university->en_name }}  University </h3>
                            </div>
                            <!--End title-->
            
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="">University</a></li>
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="">{{ $university->en_name }}</a></li>
                                        {{-- <li class="breadcrumb-item active" aria-current="page"> Faculty </li> --}}
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--End small-banner-->
                </div>
                <!-- Breadcrumbs End -->

                <section class="intro-section univ-page">
                    <div class="container">
                        <div class="row ">
                            <div class=" col-lg-4">
                                <div class="univ-page-logo row justify-content-center align-items-center no-gutters">
                                    <img src="{{ asset('universities/'. $university->logo) }}">
                                </div>
                                
                                <div class="contact-address-section style2">     
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        <img src="{{ asset('destinations/'. $university->destination->flag) }}" alt="" style="width: 25%">
                                    </div>       
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">State</h5>
                                            <h4 class="info-title">{{ $university->en_governorate }}</h4>
                                        </div>
                                    </div>                
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">Address</h5>
                                            <h4 class="info-title">{{ $university->en_address }}</h4>
                                        </div>
                                    </div>
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-paper-plane"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">Website</h5>
                                            <h4 class="info-title"><a class="info-title" href="{{ $university->university_site }}">{{ $university->university_site }}</a></h4>
                                        </div>
                                    </div>
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-hourglass-start"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">Foundation Year</h5>
                                            <h4 class="info-title">{{ $university->foundation_year }}</h4>
                                        </div>
                                    </div>
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-university"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">Type</h5>
                                            <h4 class="info-title">{{ $university->en_university_type }}</h4>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="col-lg-8 univ-details-box">
                                <div class="intro-info-tabs">
                                    <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                                        <li class="nav-item tab-btns">
                                            <a class="nav-link tab-btn active" id="univ-overview-tab" data-toggle="tab" href="#univ-overview" role="tab" aria-controls="univ-overview" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item tab-btns">
                                            <a class="nav-link tab-btn" id="univ-collages-tab" data-toggle="tab" href="#univ-collages" role="tab" aria-controls="univ-collages" aria-selected="false">Faculties</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tabs-content" id="myTabContent">
                                        <div class="tab-pane tab fade show active" id="univ-overview" role="tabpanel" aria-labelledby="univ-overview-tab">
                                            <div class="content gray-bg pt-30">
                                                <!-- Cource Overview -->
                                                <div class="course-overview">
                                                    <div class="inner-box">
                                                        <div id="accordion">
                                                            <div class="card">
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                                    <div class="card-body">
                                                                        <img src="{{ asset('universities/' . $university->featured_image) }}" alt="" style="width: 100%;" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0">
                                                                    <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                                        About
                                                                    </button>
                                                                </h5>
                                                                </div>
                                                            
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    {{ $university->en_about_the_university }}
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                <h5 class="mb-0">
                                                                    <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Vision
                                                                    </button>
                                                                </h5>
                                                                </div>
                                                            
                                                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    {{ $university->en_university_vision }}
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingThree">
                                                                <h5 class="mb-0">
                                                                    <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseThree">
                                                                        Mission
                                                                    </button>
                                                                </h5>
                                                                </div>
                                                            
                                                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    {{ $university->en_university_mission }}
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="univ-collages" role="tabpanel" aria-labelledby="univ-collages-tab">
                                            <div class="content gray-bg ">
                                                <ul class="univ-collages">
                                                    @foreach($university->faculties as $faculty)
                                                        <li>
                                                            <a href="{{ route('faculty', [$country->en_slug, $university->en_slug, $faculty->en_slug]) }}">{{ $faculty->en_name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>                
                    </div>
                </section>
            </div> 
        @else
        <div class="main-content">

            <div class="inner-hdr" style="background-image:url({{ '/edugate/universities/'. $university->banner_image }} )">
                <!--small-banner-->
                <div class="small-banner">
                    <div class="container">
                        <!--title-->
                        <div class="title">
                            <h3>جامعة {{ $university->ar_name }} </h3>
                        </div>
                        <!--End title-->
        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a style="color: #8cc63f" href="{{ route('home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item"><a href="">جامعة</a></li>
                                <li class="breadcrumb-item"><a style="color: #8cc63f" href="">{{ $university->ar_name }}</a></li>
                                    {{-- <li class="breadcrumb-item active" aria-current="page"> Faculty </li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--End small-banner-->
            </div>
            <!-- Breadcrumbs End -->

            <section class="intro-section univ-page">
                <div class="container">
                    <div class="row ">
                        <div class=" col-lg-4">
                            <div class="univ-page-logo">
                                <img src="{{ asset('universities/'. $university->logo) }}">
                            </div>
                            
                            <div class="contact-address-section style2">     
                                <div class="contact-info mb-15 md-mb-30">
                                    <div class="icon-part">
                                        <i class="fa fa-flag"></i>
                                    </div>
                                    <img src="{{ asset('destinations/'. $university->destination->flag) }}" alt="" style="width: 25%">
                                </div>       
                                <div class="contact-info mb-15 md-mb-30">
                                    <div class="icon-part">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="content-part">
                                        <h5 class="info-subtitle">المحافظة</h5>
                                        <h4 class="info-title">{{ $university->ar_governorate }}</h4>
                                    </div>
                                </div>                
                                <div class="contact-info mb-15 md-mb-30">
                                    <div class="icon-part">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="content-part">
                                        <h5 class="info-subtitle">العنوان</h5>
                                        <h4 class="info-title">{{ $university->ar_address }}</h4>
                                    </div>
                                </div>
                                <div class="contact-info mb-15 md-mb-30">
                                    <div class="icon-part">
                                        <i class="fa fa-paper-plane"></i>
                                    </div>
                                    <div class="content-part">
                                        <h5 class="info-subtitle">موقع الجامعة</h5>
                                        <h4 class="info-title"><a class="info-title" href="{{ $university->university_site }}">{{ $university->university_site }}</a></h4>
                                    </div>
                                </div>
                                <div class="contact-info mb-15 md-mb-30">
                                    <div class="icon-part">
                                        <i class="fa fa-hourglass-start"></i>
                                    </div>
                                    <div class="content-part">
                                        <h5 class="info-subtitle">سنة التأسيس</h5>
                                        <h4 class="info-title">{{ $university->foundation_year }}</h4>
                                    </div>
                                </div>
                                <div class="contact-info mb-15 md-mb-30">
                                    <div class="icon-part">
                                        <i class="fa fa-university"></i>
                                    </div>
                                    <div class="content-part">
                                        <h5 class="info-subtitle">نوع الجامعة</h5>
                                        <h4 class="info-title">{{ $university->ar_university_type }}</h4>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                        <div class="col-lg-8 univ-details-box">
                            <div class="intro-info-tabs">
                                <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn active" id="univ-overview-tab" data-toggle="tab" href="#univ-overview" role="tab" aria-controls="univ-overview" aria-selected="true">نظرة عامة</a>
                                    </li>
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn" id="univ-collages-tab" data-toggle="tab" href="#univ-collages" role="tab" aria-controls="univ-collages" aria-selected="false">الكليات</a>
                                    </li>
                                </ul>
                                <div class="tab-content tabs-content" id="myTabContent">
                                    <div class="tab-pane tab fade show active" id="univ-overview" role="tabpanel" aria-labelledby="univ-overview-tab">
                                        <div class="content gray-bg pt-30">
                                            <!-- Cource Overview -->
                                            <div class="course-overview">
                                                <div class="inner-box">
                                                    <div id="accordion">
                                                        <div class="card">
                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <img src="{{ asset('universities/' . $university->featured_image) }}" alt="" style="width: 100%;" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                            <h5 class="mb-0" style="float: right">
                                                                <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                                    عن الجامعة
                                                                </button>
                                                            </h5>
                                                            </div>
                                                        
                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                {{ $university->ar_about_the_university }}
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                            <h5 class="mb-0" style="float: right">
                                                                <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                    الرؤية
                                                                </button>
                                                            </h5>
                                                            </div>
                                                        
                                                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="card-body">
                                                                {{ $university->ar_university_vision }}
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                            <h5 class="mb-0" style="float: right">
                                                                <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseThree">
                                                                    المهمة
                                                                </button>
                                                            </h5>
                                                            </div>
                                                        
                                                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                                            <div class="card-body">
                                                                {{ $university->ar_university_mission }}
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="univ-collages" role="tabpanel" aria-labelledby="univ-collages-tab">
                                        <div class="content gray-bg ">
                                            <ul class="univ-collages">
                                                @foreach($university->faculties as $faculty)
                                                    <li>
                                                        <a href="{{ route('faculty', [$country->ar_slug, $university->ar_slug, $faculty->ar_slug]) }}" style="float: right">{{ $faculty->ar_name }}</a>
                                                        <br>
                                                    </li>
                                                @endforeach
                                            </ul>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>                
                </div>
            </section>
        </div>
        @endif

    @include('frontend.layouts.footer')
@endsection