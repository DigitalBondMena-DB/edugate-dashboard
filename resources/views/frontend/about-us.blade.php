@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | About Us
    @else
        اديو جيت | من نحن
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

    @if(app()->getLocale() == 'en')
    <!-- start breadcrumb-->
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/about/1.jpg') }}"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>About us</strong></h2>
                                            
                                            
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home') }}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">About</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url( {{ asset('frontend/images/about/2.jpg') }} )"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>About us</strong></h2>
                                            
                                           <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home') }}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">About</li>
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

    <!-- END breadcrumb-->
        <!-- Star About Area
    ============================================= -->
    <div class="about about-area inc-fixed-bg default-padding">
        <div class="container">
            <div class="about-items">
                <div class="row justify-content-between align-center">
                    
                    <div class="col-lg-6 info">
                        <h2>
                            <span class="text-main">Who</span> <span class="text-secondary">we</span> <span class="text-dark">are</span>:
                        </h2>
                        <p class="text-align-justify">
                            {{ $about->en_story }}
                        </p>
                        <p class="text-align-justify">
                            {{ $about->en_mission }}
                        </p>
                        
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('about/'. $about->story_image)}}" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

    

    

    <!-- start section service -->
    <div class="courses-area bg-gray default-padding-bottom">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-lg-12 text-center">
                    <h3>{{ $about->en_achevement_title }} </h3>
                    <p> {{ $about->en_achevement_text }} </p>
                </div>
            </div>
            <div class="courses-items">
                <div class="row justify-content-center">
                    <!-- Single item -->
                    @foreach($services as $service)
                    <div class="single-item col-lg-4 col-md-6 text-center">
                        <div class="item">
                            <div class="info">
                                <button class="btn btn-danger mb-2" style="padding: 6px 12px;"><i class="fas fa-users"></i></button>
                                <h5>
                                    {{ $service->en_name }}
                                </h5>
                                <p>{{ $service->en_text }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single item -->
                   
                    
                    
                </div>
                <!-- Pagination -->

            </div>
        </div>
    </div>
    <!-- end section service -->

   
     <!-- Star partners
    ============================================= -->
    <section class="why-choseus-area partners default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h2>Our partners</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Fixed BG -->
        <div class="container">
            <div class="row">
                <div class="category-items partners-carousal owl-carousel owl-theme text-light text-center">
                            
                            @foreach($clients as $client)
                           <div class="item malachite">
                                    <a href="{{ $client->link }}" class="info">
                                    <div class="info">
                                        <img src="{{asset('clients/'. $client->logo)}}" alt="">
                                    </div>
                                    <div class="layer row align-items-center no-gutters justify-content-center">
                                        <h5>{{ $client->en_name }}</h5>
                                    </div>
                                    </a>
                            </div>
                            @endforeach

                        </div>
            </div>
        </div>
    </section>
    <!-- End partners -->

    <!-- Star Courses Area
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
                                      <input class="form-control" id="name" required name="name" placeholder="Name" type="text">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="email" required name="email" placeholder="Email*" type="email">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="phone" required name="phone" placeholder="Phone" type="text">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group comments">
                                      <textarea class="form-control" id="message" required name="message" placeholder="Tell Us About Project *"></textarea>
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
    <!-- End Courses Area -->
    @else
        
        <!-- start breadcrumb-->
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
                    <div class="slider-thumb bg-cover" style="background-image: url( {{ asset('frontend/images/about/1.jpg') }} )"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>من نحن</strong></h2>
                                            
                                            
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home') }}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">من نحن</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url( {{ asset('frontend/images/about/2.jpg') }} )"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>من نحن</strong></h2>
                                            
                                           <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home') }}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">من نحن</li>
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

    <!-- END breadcrumb-->
        <!-- Star About Area
    ============================================= -->
    <div class="about about-area inc-fixed-bg default-padding">
        <div class="container">
            <div class="about-items">
                <div class="row align-center">
                    
                    <div class="col-lg-6 info">
                        <h2>
                            <span class="text-main">من</span> <span class="text-secondary">نحن</span> <span class="text-dark">؟</span>:
                        </h2>
                        <p class="text-align-justify">
                            {{ $about->ar_story }}
                        </p>
                        <p class="text-align-justify">
                            {{ $about->ar_mission }}
                        </p>
                        
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('about/'. $about->story_image)}}" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

    

    

    <!-- start section service -->
    <div class="courses-area bg-gray default-padding-bottom">
        <div class="container">
            <div class="row  py-5">
                <div class="col-12 text-center">
                    <h3>{{ $about->ar_achevement_title }} </h3>
                    <p> {{ $about->ar_achevement_text }} </p>
                </div>
            </div>
            <div class="courses-items">
                <div class="row justify-content-center">
                    <!-- Single item -->
                    @foreach($services as $service)
                    <div class="single-item col-lg-4 col-md-6 text-center">
                        <div class="item">
                            <div class="info">
                                <button class="btn btn-danger mb-2" style="padding: 6px 12px;"><i class="fas fa-users"></i></button>
                                <h5>
                                {{ $service->ar_name }}
                                </h5>
                                <p>{{ $service->ar_text }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single item -->
                   
                    
                    
                </div>
                <!-- Pagination -->

            </div>
        </div>
    </div>
    <!-- end section service -->

   
     <!-- Star partners
    ============================================= -->
    <section class="why-choseus-area partners default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="site-heading text-center">
                        <h2>شركاؤنا</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Fixed BG -->
        <div class="container">
            <div class="row">
                <div class="category-items partners-carousal owl-carousel owl-theme text-light text-center" dir="ltr">
                            
                            @foreach($clients as $client)
                           <div class="item malachite">
                               <a href="{{ $client->link }}" class="info">
                                    <div class="info">
                                        <img src="{{asset('clients/'. $client->logo)}}" alt="">
                                    </div>
                                    <div class="layer row align-items-center no-gutters justify-content-center">
                                        <h5>{{ $client->ar_name }}</h5>
                                    </div>
                                </a>    
                            </div>
                            @endforeach

                        </div>
            </div>
        </div>
    </section>
    <!-- End partners -->

    <!-- Star Courses Area
    ============================================= -->
   <div class="contact-area default-padding bg-gray">
      <div class="container">
          <div class="contact-items">
              <div class="row ">
                  <div class="col-lg-4 left-item">
                      <div class="info-items ">
                          <!-- Single Item -->
                          <div class="item">
                              <div class="icon">
                                  <i class="fas fa-map-marked-alt"></i>
                              </div>
                              <div class="info">
                                  <h5>العنوان</h5>
                                  <p>
                                      {{ $contact->ar_address }}
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
                                      <input class="form-control" id="phone" name="phone" required placeholder="رقم الهاتف" type="text">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group comments">
                                      <textarea class="form-control" id="message" name="message" required placeholder="اخبرنا بما تريد معرفته *"></textarea>
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
  
  @endif
   

    @include('frontend.layouts.footer')
@endsection