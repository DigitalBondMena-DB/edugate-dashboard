@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | {{ $facultyUniversity->faculty->en_name }} 
    @else
        EduGate | {{ $facultyUniversity->faculty->ar_name }} 
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

        <!-- Main content Start -->
        @if(app()->getLocale() == 'en')
            <div class="main-content">
                <!-- Breadcrumbs Start -->
                <div class="inner-hdr" style="background-image:url({{ '/edugate/faculties/'. $facultyUniversity->banner_image }} )">
                    <!--small-banner-->
                    <div class="small-banner">
                        <div class="container">
                            <!--title-->
                            <div class="title">
                                <h3> {{ $facultyUniversity->faculty->en_name }} Faculty </h3>
                            </div>
                            <!--End title-->
            
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="">University</a></li>
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="{{ route('university', [$facultyUniversity->university->destination->en_slug, $facultyUniversity->university->en_slug]) }}">{{ $facultyUniversity->university->en_name }}</a></li>
                                    <li class="breadcrumb-item"><a href="">Faculty</a></li>
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="">{{ $facultyUniversity->faculty->en_name }}</a></li>
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
                        {{-- <div class="row justify-content-center">
                            <div class="col-12 d-flex justify-content-center">
                                <form action="{{ route('submit-admission-info') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="destination_id" value="{{ $country->en_name }}">
                                    <input type="hidden" name="university_id" value="{{ $university->en_name }}">
                                    <input type="hidden" name="faculty_id" value="{{ $faculty->en_name }}">
                                    <input type="hidden" name="page" value="faculty">
                                    <input class="mb-3 w-banner-720" type="image" src="{{ asset('frontend/images/register.jpg') }}">
                                </form>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="univ-page-logo row justify-content-center align-items-center no-gutters ">
                                    <img src="{{ asset('faculties/'. $facultyUniversity->logo) }}">
                                </div>
                                
                                <div class="contact-address-section style2">  
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-university"></i>
                                        </div>
                                        <img src="{{ asset('destinations/'. $university->destination->flag) }}" alt="" style="width: 25%;">
                                    </div>
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-percent"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">Percentage</h5>
                                            <h4 class="info-title">{{ $facultyUniversity->percentage }}%</h4>
                                        </div>
                                    </div>                          
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">Address</h5>
                                            <h4 class="info-title">{{ $facultyUniversity->en_address }}</h4>
                                        </div>
                                    </div>
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-paper-plane"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">Website</h5>
                                            <h4 class="info-title"><a class="info-title" href="{{ $facultyUniversity->faculty_site }}">{{ $facultyUniversity->faculty_site }}</a></h4>
                                        </div>
                                    </div>
                                    <div class="contact-info">
                                        <div class="icon-part">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">Phone</h5>
                                            <h4 class="info-title">{{ $facultyUniversity->faculty_phone }}</h4>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="col-xl-8 col-lg-7 univ-details-box">
                                <div class="intro-info-tabs">
                                    <ul class="nav nav-tabs  intro-tabs tabs-box" id="myTab" role="tablist">
                                        <li class="nav-item tab-btns">
                                            <a class="nav-link tab-btn active" id="univ-overview-tab" data-toggle="tab" href="#univ-overview" role="tab" aria-controls="univ-overview" aria-selected="true">Overview</a>
                                        </li>
                                        @foreach($facultyUniversity->majors as $major)
                                            <li class="nav-item tab-btns">
                                                <a class="nav-link tab-btn" id="univ-collages-tab{{$major->id}}" data-toggle="tab" href="#univ-collages{{$major->id}}" role="tab" aria-controls="univ-collages{{$major->id}}" aria-selected="false">{{ $major->en_name }}</a>
                                            </li>
                                            
                                        @endforeach
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
                                                                    <img src="{{ asset('faculties/' . $facultyUniversity->featured_image) }}" alt="" style="width: 100%;" >
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0">
                                                                    <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                                        Vision
                                                                    </button>
                                                                </h5>
                                                                </div>
                                                            
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    {{ $facultyUniversity->en_faculty_vision }}
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                <h5 class="mb-0">
                                                                    <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Mission
                                                                    </button>
                                                                </h5>
                                                                </div>
                                                            
                                                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    {{ $facultyUniversity->en_faculty_mission }}
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                        @foreach($facultyUniversity->majors as $major)
                                            <div class="tab-pane fade" id="univ-collages{{$major->id}}" role="tabpanel" aria-labelledby="univ-collages-tab{{$major->id}}">
                                                <div class="content gray-bg">
                                                    <ul class="fac-departments">
                                                        <div id="accordionMajor{{$major->id}}">
                                                            @foreach($major->pivot->departments as $department)
                                                                <div class="card">
                                                                    <div class="card-header" id="departmentHeading{{$department->id}}-{{$major->id}}">
                                                                    <h5 class="mb-0">
                                                                        <button class="btn" data-toggle="collapse" data-target="#department{{$department->id}}-{{$major->id}}" aria-expanded="true" aria-controls="department{{$department->id}}-{{$major->id}}">
                                                                            {{ $department->en_name }}
                                                                        </button>
                                                                    </h5>
                                                                    </div>
                                                                    <div id="department{{$department->id}}-{{$major->id}}" class="collapse" aria-labelledby="departmentHeading{{$department->id}}-{{$major->id}}" data-parent="#accordionMajor{{$major->id}}">
                                                                        <div class="card-body">
                                                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="">
                                                                                <li class="nav-item">
                                                                                <a class="nav-link active" id="major-department-pills-home-tab{{$department->id}}-{{$major->id}}" data-toggle="pill" href="#major-department-pills-home{{$department->id}}-{{$major->id}}" role="tab" aria-controls="major-department-pills-home{{$department->id}}-{{$major->id}}" aria-selected="true" >Vision</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                <a class="nav-link" id="major-department-pills-profile-tab{{$department->id}}-{{$major->id}}" data-toggle="pill" href="#major-department-pills-profile{{$department->id}}-{{$major->id}}" role="tab" aria-controls="major-department-pills-profile{{$department->id}}-{{$major->id}}" aria-selected="false">Mission</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                <a class="nav-link" id="major-department-pills-contact-tab{{$department->id}}-{{$major->id}}" data-toggle="pill" href="#major-department-pills-contact{{$department->id}}-{{$major->id}}" role="tab" aria-controls="major-department-pills-contact{{$department->id}}-{{$major->id}}" aria-selected="false">Specializations</a>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="tab-content" id="pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="major-department-pills-home{{$department->id}}-{{$major->id}}" role="tabpanel" aria-labelledby="major-department-pills-home-tab{{$department->id}}-{{$major->id}}" style="text-align:justfy;">{{ $department->en_department_vision }}</div>
                                                                                <div class="tab-pane fade" id="major-department-pills-profile{{$department->id}}-{{$major->id}}" role="tabpanel" aria-labelledby="major-department-pills-profile-tab{{$department->id}}-{{$major->id}}" style="text-align:justfy;">{{ $department->en_department_mission }}</div>
                                                                                @if(count($department->specializations))
                                                                                    <div class="tab-pane fade" id="major-department-pills-contact{{$department->id}}-{{$major->id}}" role="tabpanel" aria-labelledby="major-department-pills-contact-tab{{$department->id}}-{{$major->id}}" style="text-align:justfy;">
                                                                                        <ul class="list-group" style="display:block !important">
                                                                                            @foreach($department->specializations as $specialization)
                                                                                                <li class="list-group-item">{{ $specialization->en_name }}</li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="tab-pane fade" id="major-department-pills-contact{{$department->id}}-{{$major->id}}" role="tabpanel" aria-labelledby="major-department-pills-contact-tab{{$department->id}}-{{$major->id}}" style="text-align:justfy;">No Specializations Found</div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                <form class="text-center my-4" action="{{ route('submit-admission-info') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="destination_id" value="{{ $country->en_name }}">
                                                                    <input type="hidden" name="university_id" value="{{ $university->en_name }}">
                                                                    <input type="hidden" name="faculty_id" value="{{ $faculty->en_name }}">
                                                                    <input type="hidden" name="page" value="faculty">

                                                                <input class="btn" type="image" src="{{ asset('frontend/images/register.png') }}" width="300px">
                                                                </form>
                                                        </div>
                                                    </ul>                                            
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>                        
                        </div>                
                    </div>
                </section>
            </div>
        @else
            <div class="main-content">
                <!-- Breadcrumbs Start -->
                <div class="inner-hdr" style="background-image:url({{ '/edugate/faculties/'. $facultyUniversity->banner_image }} )">
                    <!--small-banner-->
                    <div class="small-banner">
                        <div class="container">
                            <!--title-->
                            <div class="title">
                                <h3> كلية {{ $facultyUniversity->faculty->ar_name }} </h3>
                            </div>
                            <!--End title-->
            
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item"><a href="">جامعة</a></li>
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="{{ route('university', [$facultyUniversity->university->destination->ar_slug, $facultyUniversity->university->ar_slug]) }}">{{ $facultyUniversity->university->ar_name }}</a></li>
                                    <li class="breadcrumb-item"><a href="">كلية</a></li>
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="">{{ $facultyUniversity->faculty->ar_name }}</a></li>
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
                        <div class="row justify-content-center">
                            <div class="col-12 d-flex justify-content-center">
                                <form action="{{ route('submit-admission-info') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="destination_id" value="{{ $country->id }}">
                                    <input type="hidden" name="university_id" value="{{ $university->id }}">
                                    <input type="hidden" name="faculty_id" value="{{ $faculty->id }}">
                                    <input type="hidden" name="page" value="faculty">
                                    <input class="mb-3 w-banner-720" type="image" src="{{ asset('frontend/images/register.jpg') }}">
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="univ-page-logo">
                                    <img src="{{ asset('faculties/'. $facultyUniversity->logo) }}">
                                </div>
                                
                                <div class="contact-address-section style2">  
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-university"></i>
                                        </div>
                                        <img src="{{ asset('universities/'. $facultyUniversity->university->logo) }}" alt="" style="width: 25%;">
                                    </div>
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-percent"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">النسبة المئوية</h5>
                                            <h4 class="info-title">{{ $facultyUniversity->percentage }}%</h4>
                                        </div>
                                    </div>                          
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">العنوان</h5>
                                            <h4 class="info-title">{{ $facultyUniversity->ar_address }}</h4>
                                        </div>
                                    </div>
                                    <div class="contact-info mb-15 md-mb-30">
                                        <div class="icon-part">
                                            <i class="fa fa-paper-plane"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">موقع الجامعة</h5>
                                            <h4 class="info-title"><a class="info-title" href="{{ $facultyUniversity->faculty_site }}">{{ $facultyUniversity->faculty_site }}</a></h4>
                                        </div>
                                    </div>
                                    <div class="contact-info">
                                        <div class="icon-part">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="info-subtitle">رقم الهاتف</h5>
                                            <h4 class="info-title">{{ $facultyUniversity->faculty_phone }}</h4>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="col-xl-8 col-lg-7 univ-details-box">
                                <div class="intro-info-tabs">
                                    <ul class="nav nav-tabs row no-gutters intro-tabs tabs-box" id="myTab" role="tablist">
                                        <li class="nav-item col tab-btns">
                                            <a class="nav-link tab-btn active" id="univ-overview-tab" data-toggle="tab" href="#univ-overview" role="tab" aria-controls="univ-overview" aria-selected="true">نظرة عامة</a>
                                        </li>
                                        @foreach($facultyUniversity->majors as $major)
                                            <li class="nav-item col tab-btns">
                                                <a class="nav-link tab-btn" id="univ-collages-tab{{$major->id}}" data-toggle="tab" href="#univ-collages{{$major->id}}" role="tab" aria-controls="univ-collages{{$major->id}}" aria-selected="false">{{ $major->ar_name }}</a>
                                            </li>
                                        @endforeach
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
                                                                    <img src="{{ asset('faculties/' . $facultyUniversity->featured_image) }}" alt="" style="width: 100%;" >
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0" style="float: right">
                                                                    <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                                        الرؤية
                                                                    </button>
                                                                </h5>
                                                                </div>
                                                            
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    {{ $facultyUniversity->ar_faculty_vision }}
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                <h5 class="mb-0" style="float: right">
                                                                    <button class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                        المهمة
                                                                    </button>
                                                                </h5>
                                                                </div>
                                                            
                                                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    {{ $facultyUniversity->ar_faculty_mission }}
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                        @foreach($facultyUniversity->majors as $major)
                                            <div class="tab-pane fade" id="univ-collages{{$major->id}}" role="tabpanel" aria-labelledby="univ-collages-tab{{$major->id}}">
                                                <div class="content gray-bg">
                                                    <ul class="fac-departments">
                                                        <div id="accordionMajor{{$major->id}}">
                                                            @foreach($major->pivot->departments as $department)
                                                                <div class="card">
                                                                    <div class="card-header" id="departmentHeading{{$department->id}}-{{$major->id}}">
                                                                    <h5 class="mb-0" style="float: right">
                                                                        <button class="btn" data-toggle="collapse" data-target="#department{{$department->id}}-{{$major->id}}" aria-expanded="true" aria-controls="department{{$department->id}}-{{$major->id}}">
                                                                            {{ $department->ar_name }}
                                                                        </button>
                                                                    </h5>
                                                                    </div>
                                                                    <div id="department{{$department->id}}-{{$major->id}}" class="collapse" aria-labelledby="departmentHeading{{$department->id}}-{{$major->id}}" data-parent="#accordionMajor{{$major->id}}">
                                                                        <div class="card-body">
                                                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="">
                                                                                <li class="nav-item" >
                                                                                <a class="nav-link active" id="major-department-pills-home-tab{{$department->id}}-{{$major->id}}" data-toggle="pill" href="#major-department-pills-home{{$department->id}}-{{$major->id}}" role="tab" aria-controls="major-department-pills-home{{$department->id}}-{{$major->id}}" aria-selected="true">الرؤية</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                <a class="nav-link" id="major-department-pills-profile-tab{{$department->id}}-{{$major->id}}" data-toggle="pill" href="#major-department-pills-profile{{$department->id}}-{{$major->id}}" role="tab" aria-controls="major-department-pills-profile{{$department->id}}-{{$major->id}}" aria-selected="false">المهمة</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                <a class="nav-link" id="major-department-pills-contact-tab{{$department->id}}-{{$major->id}}" data-toggle="pill" href="#major-department-pills-contact{{$department->id}}-{{$major->id}}" role="tab" aria-controls="major-department-pills-contact{{$department->id}}-{{$major->id}}" aria-selected="false">التخصصات</a>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="tab-content" id="pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="major-department-pills-home{{$department->id}}-{{$major->id}}" role="tabpanel" aria-labelledby="major-department-pills-home-tab{{$department->id}}-{{$major->id}}" style="text-align:justify;">{{ $department->ar_department_vision }}</div>
                                                                                <div class="tab-pane fade" id="major-department-pills-profile{{$department->id}}-{{$major->id}}" role="tabpanel" aria-labelledby="major-department-pills-profile-tab{{$department->id}}-{{$major->id}}" style="text-align:justify;">{{ $department->ar_department_mission }}</div>
                                                                                @if(count($department->specializations))
                                                                                    <div class="tab-pane fade" id="major-department-pills-contact{{$department->id}}-{{$major->id}}" role="tabpanel" aria-labelledby="major-department-pills-contact-tab{{$department->id}}-{{$major->id}}" style="text-align:justify;">
                                                                                        <ul class="list-group">
                                                                                            @foreach($department->specializations as $specialization)
                                                                                                <li class="list-group-item" style="height: 50px;"><p style="float: right;">{{ $specialization->ar_name }}</p></li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="tab-pane fade" id="major-department-pills-contact{{$department->id}}-{{$major->id}}" role="tabpanel" aria-labelledby="major-department-pills-contact-tab{{$department->id}}-{{$major->id}}" style="text-align:justify;">لا يوجد تخصصات لهذا القسم</div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </ul>                                            
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>                        
                        </div>                
                    </div>
                </section>
            </div>
        @endif
        <!-- Main content End --> 

    @include('frontend.layouts.footer')
@endsection