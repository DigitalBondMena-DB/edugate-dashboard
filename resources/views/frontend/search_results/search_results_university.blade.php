@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EGEC | Search | {{ $university->en_name }}
    @else
        EGEC | بحث | {{ $university->ar_name }}
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
                            <li><a href="{{ route('destination', $country->en_slug) }}">{{ $country->en_name }}</a></li>
                            <li>{{ $university->en_name }}</li>
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
                                    <h2 class="title black-color">Colleges in, <span class="primary-color">{{ $university->en_name }}</span></h2>
                                </div>
                                <div class="row">
                                    @foreach($university->faculties as $faculty)
                                        <div class="col-lg-6 mb-30">
                                            <a class="university-item" href="{{ route('faculty', [$country->en_slug, $university->en_slug, $faculty->en_slug]) }}">
                                                <div class="uni-img">
                                                    <img src="{{ asset('faculties/' . $faculty->pivot->logo) }}" alt="">
                                                </div>
                                                <div class="content-part">
                                                    <h4 class="title">{{ $faculty->en_name }}</h4>
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
                        <h1 class="page-title">نتيجه البحث </h1>
                        <ul>
                            <li>
                                الرئيسية
                            </li>
                            <li><a href="{{ route('destination', $country->ar_slug) }}">{{ $country->ar_name }}</a></li>
                            <li><a>{{ $university->ar_name }}</a></li>
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
                                    <h2 class="title black-color">الكليات في , <span class="primary-color">جامعة {{ $university->ar_name }}</span></h2>
                                </div>
                                <div class="row">
                                    @foreach($university->faculties as $faculty)
                                        <div class="col-lg-6 mb-30">
                                            <a class="university-item" href="{{ route('faculty', [$country->ar_slug, $university->ar_slug, $faculty->ar_slug]) }}">
                                                <div class="uni-img">
                                                    <img src="{{ asset('faculties/' . $faculty->pivot->logo) }}" alt="">
                                                </div>
                                                <div class="content-part">
                                                    <h4 class="title">{{ $faculty->ar_name }}</h4>
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