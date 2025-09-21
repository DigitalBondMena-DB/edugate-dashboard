@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EGEC | Search | {{ $country->en_name }}
    @else
        EGEC | بحث | {{ $country->ar_name }}
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
                        <h1 class="page-title">Search Result</h1>
                        <ul>
                            <li>
                                <a class="active" href="{{ route('home') }}">Home</a>
                            </li>
                            <li>{{ $country->en_name }}</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumbs End -->

                <div class="search-page">
                    <div class="container">
                        <div class="row">
                            @include('frontend.layouts.search')
                            <div class="col-lg-9 result-section wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                <div class="sec-title2">
                                    <h2 class="title black-color">Universities in, <span class="primary-color">{{ $country->en_name }}</span></h2>
                                </div>
                                <div class="row">
                                    @foreach($country->universities as $university)
                                        <div class="col-lg-6 mb-30">
                                            <a class="university-item" href="{{ route('university', [$country->en_slug, $university->en_slug]) }}">
                                                <div class="uni-img">
                                                    <img src="{{ asset('universities/' . $university->logo) }}" alt="">
                                                </div>
                                                <div class="content-part">
                                                    <h4 class="title">{{ $university->en_name }}</h4>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        @else
        <div class="main-content">
            <!-- Breadcrumbs Start -->
            <div class="rs-breadcrumbs breadcrumbs-overlay">
                <div class="breadcrumbs-text ">
                    <h1 class="page-title"> نتيجه البحث </h1>
                    <ul>
                        <li>
                            الرئيسية
                        </li>
                        <li><a class="active" href="#">{{ $country->ar_name }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumbs End -->

            <div class="search-page">
                <div class="container">
                    <div class="row">
                        @include('frontend.layouts.search')
                        <div class="col-lg-9 result-section wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms" style="text-align: right;">
                            <div class="sec-title2">
                                <h2 class="title black-color" >الجامعات في , <span class="primary-color">{{ $country->ar_name }}</span></h2>
                            </div>
                            <div class="row">
                                @foreach($country->universities as $university)
                                    <div class="col-lg-6 mb-30">
                                        <a class="university-item" href="{{ route('university', [$country->ar_slug, $university->ar_slug]) }}">
                                            <div class="uni-img">
                                                <img src="{{ asset('universities/' . $university->logo) }}" alt="">
                                            </div>
                                            <div class="content-part">
                                                <h4 class="title">{{ $university->ar_name }}</h4>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        @endif
        <!-- Main content End --> 

    @include('frontend.layouts.footer')
@endsection