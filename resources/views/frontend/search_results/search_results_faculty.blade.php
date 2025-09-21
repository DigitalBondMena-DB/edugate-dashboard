@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EGEC | Search | {{ $universityFaculty->faculty->en_name }}
    @else
        EGEC | بحث | {{ $universityFaculty->faculty->ar_name }}
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
                            <li><a href="{{ route('destination', $universityFaculty->university->destination->en_slug) }}">{{ $universityFaculty->university->destination->en_name }}</a></li>
                            <li><a href="{{ route('university', [$universityFaculty->university->destination->en_slug, $universityFaculty->university->en_slug]) }}">{{ $universityFaculty->university->en_name }}</a></li>
                            <li>{{ $universityFaculty->faculty->en_name }}</li>
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
                                    <h2 class="title black-color">Majors in, <span class="primary-color">{{ $universityFaculty->faculty->en_name }} College, </span> <span>{{ $universityFaculty->university->en_name }} University</span></h2>
                                </div>
                                <div class="row">
                                    @foreach($universityFaculty->majors as $major)
                                        <div class="col-lg-6 mb-30">
                                            <a class="university-item" href="{{ route('faculty', [$universityFaculty->university->destination->en_slug, $universityFaculty->university->en_slug, $universityFaculty->faculty->en_slug]) }}">
                                                <div class="uni-img">
                                                    <img src="{{ asset('faculties/' . $universityFaculty->logo) }}" alt="">
                                                </div>
                                                <div class="content-part">
                                                    <h4 class="title">{{ $major->en_name }}</h4>
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
                        <li><a href="{{ route('destination', $universityFaculty->university->destination->ar_slug) }}">{{ $universityFaculty->university->destination->ar_name }}</a></li>
                        <li><a href="{{ route('university', [$universityFaculty->university->destination->ar_slug, $universityFaculty->university->ar_slug]) }}">{{ $universityFaculty->university->ar_name }}</a></li>
                        <li><a>{{ $universityFaculty->faculty->ar_name }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumbs End -->

            <div class="search-page">
                <div class="container">
                    <div class="row">
                        @include('frontend.layouts.search')
                        <div class="col-lg-9 result-section wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms" style="text-align: right">
                            <div class="sec-title2">
                                <h2 class="title black-color">التخصصات في , <span class="primary-color">كليه {{ $universityFaculty->faculty->ar_name }}, </span> <span>جامعه {{ $universityFaculty->university->ar_name }}</span></h2>
                            </div>
                            <div class="row">
                                @foreach($universityFaculty->majors as $major)
                                    <div class="col-lg-6 mb-30">
                                        <a class="university-item" href="{{ route('faculty', [$universityFaculty->university->destination->ar_slug, $universityFaculty->university->ar_slug, $universityFaculty->faculty->ar_slug]) }}">
                                            <div class="uni-img">
                                                <img src="{{ asset('faculties/' . $universityFaculty->logo) }}" alt="">
                                            </div>
                                            <div class="content-part">
                                                <h4 class="title">{{ $major->ar_name }}</h4>
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