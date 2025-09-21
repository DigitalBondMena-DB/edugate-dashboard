@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | Ad Form
    @else
        اديو جيت | فورم الاعلانات
	@endif
@endsection

@section('egec')
<style> 

            .w-800{
                width: 800px;
            }
            .h-200px{
                height: 200px;
            }
            .h-500{
                height: 500px;
            }
            /* .max-height-500px{
                max-height: 500px;
            }
            .overflow-auto{
                overflow: auto;
            } */
            .card{
                border-radius: 10px;
            }
            .card-image{
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
            }
            .card-shadow{
                box-shadow:     0 2.8px 2.2px rgba(0, 0, 0, 0.034),
                                0 6.7px 5.3px rgba(0, 0, 0, 0.048),
                                0 12.5px 10px rgba(0, 0, 0, 0.06),
                                0 22.3px 17.9px rgba(0, 0, 0, 0.072),
                                0 41.8px 33.4px rgba(0, 0, 0, 0.086),
                                0 100px 80px rgba(0, 0, 0, 0.12);
            }
            @media screen and (max-width:500px){
                .responsive-image{
                    display: none;
                }
            }
            @media screen and (min-width:800px){
                .overflow-form{
                    overflow: auto;
                }
                .max-height-500px{
                    max-height: 514px;
                }
            }
            .register-section .register-box {
                padding: 10px 40px 35px !important;
            }
            .bg-gray{
                background-color: #f3f8f9;
            }
            .text-main{
                color: #25315d;
            }
            .register-box .form-control-validation {
                margin-bottom: 10px;
                padding-bottom: 20px;
                position: relative;
            }


            .register-box .form-control-validation.success input {
                border-color: #2ecc71;
            }

            .register-box .form-control-validation.error input {
                border-color: #e74c3c;
            }
            .register-box .form-control-validation.success select {
                border-color: #2ecc71;
            }

            .register-box .form-control-validation.error select {
                border-color: #e74c3c;
            }

            .register-box .form-control-validation i {
                display: none;
                position: absolute;
                top: 43%;
                transform: translate(-50%,50%);
                left: 40px;
            }

            .register-box .form-control-validation.success i.fa-check-circle {
                color: #2ecc71;
                display: block;
            }

            .register-box .form-control-validation.error i.fa-exclamation-circle {
                color: #e74c3c;
                display: block;
            }

            .register-box .form-control-validation small {
                color: #e74c3c;
                position: absolute;
                bottom: -5px;
                right: 15px;
                display: none;
            }

            .register-box .form-control-validation.error small {
                display: block;
            }
        </style>
    @include('frontend.layouts.loader')
    
    @include('frontend.layouts.header')
    
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/img/partners/banner1.jpg') }}"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>Contact us</strong></h2>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url( {{ asset('frontend/img/partners/banner2.jpg') }}"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>Contact us</strong></h2>
                                            
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
        <div class="main-content my-5">
            <div class="container">
                <div class="row  card-shadow no-gutters">
                    <div class="card shadow">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                <div class="col-lg-6">
                                    <div class="row no-gutters">
                                        <img src="{{ asset('frontend/img/news/87792780_2587973251449829_2492374491145961472_o.jpg') }}" class="image-beautiful h-200px w-100" alt="">
                                    </div>
                                    <div class="card-description p-4">
                                        <h5>The Edugate Company provides the following services: </h5>
                                        <ol class="px-3">
                                                                <li>Providing educational consultations for free and determining the appropriate specializations for the applicants.</li>
                                                                <li>Completion of registration and admission procedures, the Department of Expatriates and Egyptian Higher Education.</li>
                                                                <li>Ending the procedures of cultural attachés and consulates.</li>
                                                                <li>Finishing the equivalency procedures at the Supreme Council of Universities, as well as clearing and transfer procedures.</li>
                                                                <li>Ending the procedures of universities and colleges and determining academic specializations.</li>
                                                                
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 max-height-500px overflow-form">
                                        <section class="register-section bg-theme registration-box-position loaded">
                                            
                                            <div class="register-box">
                                                
                                                <div class="styled-form text-white">
                                                    
                                                    <form id="form" action="login.php" method="">        
                                                                    <div class="row clearfix align-items-center">
                                                                        
                                                                        <div class="col-12">
                                                                            <h4 class="text-white">1- Personal information</h4>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Full name</label>
                                                                            <input type="text" id="full_name" name="full_name" >
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Email Address</label>
                                                                            <input type="email" id="email" name="email" >
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Mobile Number</label>
                                                                            <input type="number" id="phone" name="phone" >
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        
                                                                        </div> 
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Address</label>
                                                                            <input type="text" id="address" name="address" >
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>                                            
                                                                        
                                                                        </div> 
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Location</label>
                                                                            <select class="form-control" id="area" name="area">
                                                                                <option value="">Choose</option>
                                                                                                                                        <option value="1">الرياض</option>
                                                                                                                                        <option value="2">الدمام</option>
                                                                                                                                </select>   
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                                                                        
                                                                                                                            </div> 
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Date of birth</label>
                                                                            <input type="date" id="birthdate" name="birthdate">
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Gender</label>
                                                                            <select class="form-control" name="gender" id="gender">
                                                                                <option value="">Choose</option>
                                                                                <option value="ذكر">ذكر</option>
                                                                                <option value="انثي">انثي</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Place of exitence</label>
                                                                            <select class="form-control" id="nation" name="nation">
                                                                                <option value="">إختر</option>
                                                                                <option value="أفغانستان">أفغانستان</option>
                                                                                <option value="ألبانيا">ألبانيا</option>
                                                                                <option value="الجزائر">الجزائر</option>
                                                                                <option value="أندورا">أندورا</option>
                                                                                <option value="أنغولا">أنغولا</option>
                                                                                <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                                                                                <option value="الأرجنتين">الأرجنتين</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>                                            
                                                                        
                                                                        </div> 
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Nationality</label>
                                                                            <select class="form-control" id="nationality" name="nationality">
                                                                                <option value="">إختر</option>
                                                                                
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        
                                                                        </div>
                        
                                                                        <div class="col-12">
                                                                            <h5 class="text-white">2- Select Education system</h5>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Required qualification</label>
                                                                            <select class="form-control" name="degree_needed" id="degree_needed">
                                                                                <option value="">Choose</option>
                                                                                <option value="Bachelor">بكالوربس</option>
                                                                                <!-- <option value="Master">الماجستير</option>
                                                                                <option value="PhD">الدكتوراه</option> -->
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row align-items-end clearfix" id="show-bachelor-form" style="display:none">
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Pre-university academic qualification</label>
                                                                            <select name="school_degree_name" id="school_degree_name" class="form-control">
                                                                                <option value="">Choose</option>
                                                                                <option value="Intermediate Diploma">دبلوم متوسط</option>
                                                                                <option value="Diploma above average">دبلوم فوق المتوسط</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>  
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Graduation Year</label>
                                                                            <select class="form-control" name="school_degree_year" id="school_degree_year">
                                                                                <option value="">Choose</option>
                                                                                <option value="2020">2020</option>
                                                                                <option value="2019">2019</option>
                                                                                <option value="2018">2018</option>
                                                                                <option value="2017">2017</option>
                                                                                <option value="2016">2016</option>
                                                                                <option value="2015">2015</option>
                                                                                <option value="2014">2014</option>
                                                                                <option value="2013">2013</option>
                                                                                <option value="2012">2012</option>
                                                                                <option value="2011">2011</option>
                                                                                <option value="2010">2010</option>
                                                                                <option value="2009">2009</option>
                                                                                <option value="2008">2008</option>
                                                                                <option value="2007">2007</option>
                                                                                <option value="2006">2006</option>
                                                                                <option value="2005">2005</option>
                                                                                <option value="2004">2004</option>
                                                                                <option value="2003">2003</option>
                                                                                <option value="2002">2002</option>
                                                                                <option value="2001">2001</option>
                                                                                <option value="2000">2000</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Academic country before university</label>
                                                                            <select class="form-control" id="school_degree_country" name="school_degree_country">
                                                                                <option value="">إختر</option>
                                                                                <option value="أفغانستان">أفغانستان</option>
                                                                                <option value="ألبانيا">ألبانيا</option>
                                                                                <option value="الجزائر">الجزائر</option>
                                                                                <option value="أندورا">أندورا</option>
                                                                                <option value="أنغولا">أنغولا</option>
                                                                                <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                                                                                <option value="الأرجنتين">الأرجنتين</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>School name</label>
                                                                            <input type="text" class="d-block" id="school_name" name="school_name" placeholder="اكتب اسم مدرسنك">
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>percentage %</label>
                                                                            <input type="number" class="d-block" id="percentage" name="percentage" step=".01" placeholder="اكتب النسبة المئوية">
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>                                                
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Educational system</label>
                                                                            <select class="form-control" name="education_system" id="education_system">
                                                                                <option value="">Choose</option>
                                                                                <option value="علمي علوم">علمي علوم</option>
                                                                                <option value="علمي رياضة">علمي رياضة</option>
                                                                                <option value="ادبي">ادبي</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                                                                        </div>
                                                                    </div>
                        
                                                                    <div class="row align-items-end clearfix" id="show-master-form" style="display:none">
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>University qualification</label>
                                                                            <select class="form-control" name="bachelor_degree_name" id="bachelor_degree_name">
                                                                                <option value="Bachelor" selected="">البكالوريس</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                                                                        </div>   
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>University graduation year</label>
                                                                            <select class="form-control" name="bachelor_degree_year" id="bachelor_degree_year" >
                                                                                <option> Choose</option>
                                                                                <option value="2020">2020</option>
                                                                                <option value="2019">2019</option>
                                                                                <option value="2018">2018</option>
                                                                                <option value="2017">2017</option>
                                                                                <option value="2016">2016</option>
                                                                                <option value="2015">2015</option>
                                                                                <option value="2014">2014</option>
                                                                                <option value="2013">2013</option>
                                                                                <option value="2012">2012</option>
                                                                                <option value="2011">2011</option>
                                                                                <option value="2010">2010</option>
                                                                                <option value="2009">2009</option>
                                                                                <option value="2008">2008</option>
                                                                                <option value="2007">2007</option>
                                                                                <option value="2006">2006</option>
                                                                                <option value="2005">2005</option>
                                                                                <option value="2004">2004</option>
                                                                                <option value="2003">2003</option>
                                                                                <option value="2002">2002</option>
                                                                                <option value="2001">2001</option>
                                                                                <option value="2000">2000</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>university country</label>
                                                                            <select class="form-control" id="bachelor_degree_country" name="bachelor_degree_country">
                                                                                <option disabled="" selected="">إختر</option>
                                                                                <option value="أفغانستان">أفغانستان</option>
                                                                                <option value="ألبانيا">ألبانيا</option>
                                                                                <option value="الجزائر">الجزائر</option>
                                                                                <option value="أندورا">أندورا</option>
                                                                                <option value="أنغولا">أنغولا</option>
                                                                                <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>University Name</label>
                                                                            <input type="text" name="bachelor_university_name" id="bachelor_university_name" class="d-block">
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>College Name</label>
                                                                            <input type="text" name="bachelor_faculty_name" id="bachelor_faculty_name" class="d-block">
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Department Name</label>
                                                                            <input type="text" name="bachelor_department_name" id="bachelor_department_name" class="d-block">
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>GPA</label>
                                                                            <input type="number" class="d-block" id="bachelor_gpa_precentage" name="bachelor_gpa_precentage" step=".01" placeholder="اكتب المعدل التراكمي">
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Educational system</label>
                                                                            <select class="form-control"  name="bachelor_education_system" id="bachelor_education_system">
                                                                                <option>Choose</option>
                                                                                <option value="انتظام">انتظام</option>
                                                                                <option value="انتساب">انتساب</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            <i class="fa fa-exclamation-circle"></i>
                                                                            <small>Error message</small>
                                                                        </div>
                                                                    </div>
                        
                                                                    <div class="row align-items-end clearfix" id="show-phd-form" style="display:none">
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Degree qualification</label>
                                                                            <select class="form-control" name="master_degree_name" id="master_degree_name" >
                                                                                <option value="Master" selected="">الماجستير</option>
                                                                            </select>
                                                                        </div>   
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Master's year</label>
                                                                            <select class="form-control" name="master_degree_year" id="master_degree_year" >
                                                                                <option>Choose</option>
                                                                                <option value="2020">2020</option>
                                                                                <option value="2019">2019</option>
                                                                                <option value="2018">2018</option>
                                                                                <option value="2017">2017</option>
                                                                                <option value="2016">2016</option>
                                                                                <option value="2015">2015</option>
                                                                                <option value="2014">2014</option>
                                                                                <option value="2013">2013</option>
                                                                                <option value="2012">2012</option>
                                                                                <option value="2011">2011</option>
                                                                                <option value="2010">2010</option>
                                                                                <option value="2009">2009</option>
                                                                                <option value="2008">2008</option>
                                                                                <option value="2007">2007</option>
                                                                                <option value="2006">2006</option>
                                                                                <option value="2005">2005</option>
                                                                                <option value="2004">2004</option>
                                                                                <option value="2003">2003</option>
                                                                                <option value="2002">2002</option>
                                                                                <option value="2001">2001</option>
                                                                                <option value="2000">2000</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Master's country</label>
                                                                            <select class="form-control" id="master_degree_country" name="master_degree_country">
                                                                                <option disabled="" selected="">إختر</option>
                                                                                <option value="أفغانستان">أفغانستان</option>
                                                                                <option value="ألبانيا">ألبانيا</option>
                                                                                <option value="الجزائر">الجزائر</option>
                                                                                <option value="أندورا">أندورا</option>
                                                                              
                                                                            </select>
                                                                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>The name of the master's university</label>
                                                                            <input type="text" name="master_university_name" id="master_university_name" class="d-block">
                                                                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label>Master's college name</label>
                                                                            <input type="text" name="master_faculty_name" id="master_faculty_name" class="d-block">
                                                                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            
                                </div>
                                                                                                                    </div>
                                                                    <div class="row clearfix">
                        
                                                                        <div class="col-12">
                                                                            <h5 class="text-white">3- Choose Education</h5>
                                                                        </div>
                        
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label for="country-list">Country:</label>
                                                                            <select name="admission_destination_id" class="form-control" id="ad_admission_destination_id">
                                                                                <option value="">Choose Country:</option>
                                                                                                                                        <option value="1">مصر</option>
                                                                                                                                        <option value="2">كندا</option>
                                                                                                                                        <option value="3">امريكا</option>
                                                                                                                                </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                                <i class="fa fa-exclamation-circle"></i>
                                                                                <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label for="university-list">University:</label>
                                                                            <select name="admission_university_id" class="form-control" id="ad_admission_university_id">
                                                                                <option value="">Choose University</option>
                                                                                <option>Cairo university</option>
                                                                                <option>Helwan university</option>
                                                                                <option>MTI university</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                                <i class="fa fa-exclamation-circle"></i>
                                                                                <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label for="collage-list">College:</label>
                                                                            <select name="admission_fac_uni_id" class="form-control" id="ad_admission_fac_uni_id">
                                                                                <option value="">Choose College</option>
                                                                                <option>Computer science</option>
                                                                                <option>Pharamcy</option>
                                                                                <option>Eegeenering</option>
                                                                                <option>Doctor</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                                <i class="fa fa-exclamation-circle"></i>
                                                                                <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label for="collage-list">Specilization:</label>
                                                                            <select name="admission_fac_uni_major_id" class="form-control" id="ad_admission_fac_uni_major_id">
                                                                                <option value="">Choose Specilization</option>
                                                                                <option>CS</option>
                                                                                <option>IT</option>
                                                                                <option>Artifical intelligence</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                                <i class="fa fa-exclamation-circle"></i>
                                                                                <small>Error message</small>
                                                                        </div>
                                                                        <div class="form-group form-control-validation col-lg-6">
                                                                            <label for="collage-list">Departement:</label>
                                                                            <select name="admission_department_id" class="form-control" id="ad_admission_department_id">
                                                                                <option value="">Choose Departement</option>
                                                                                <option>CS</option>
                                                                                <option>IT</option>
                                                                                <option>Artifical intelligence</option>
                                                                            </select>
                                                                            <i class="fa fa-check-circle"></i>
                                                                                <i class="fa fa-exclamation-circle"></i>
                                                                                <small>Error message</small>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-12">
                                                                        <button class="btn btn-dark w-100" name="" type="submit">Send</button>
                                                                    </div>
                                                                
                                                                    </form>
                                                                    </div>
                        
                                                                    
                                                                
                                                                
                                            </div>
                                            
                                        </section>
                                    </div>
                            </div>
                </div>
            </div>
            <!-- Register Section -->
            
            <!-- End Register Section --> 
        </div> 

            </div>
        </div>
    <!-- Main content End --> 
    @include('frontend.layouts.footer')
@endsection

@section('scripts')

@endsection