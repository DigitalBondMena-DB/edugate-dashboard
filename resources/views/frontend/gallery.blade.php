@extends('frontend.layouts.app')

@section('title')
    @if(app()->getLocale() == 'en')
        Edugate | Media
    @else
        اديو جيت | اعلام
    @endif
@endsection
@section('css')

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

@endsection
@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')
    
    
  @if(app()->getLocale() == 'en')
    
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/Media/1.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>Media </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}" ><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">Media</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/Media/2.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>Media </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">Media</li>
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
    

    <section class="vedio py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 site-heading text-center">
                        <h2 class="text-main">Our Events Categories</h2>
                    </div>
            </div>
            <div class="row no-gutters justify-content-around align-items-center">
                @foreach($eventCategoeeis as $category)
                <a href="{{ route('eventCategories' , $category->en_slug) }}" class="btn btn-lg btn-gradient">{{ $category->en_name }}</a>
                @endforeach
            </div>
        </div>
    </section>

        <!-- End Gallery -->

    <!-- start section bread crumb -->
   @foreach($eventCategoeeis as $category)
            
        
                <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('eventCategery/'. $category->featured_image)}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>{{ $category->en_name }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
    <!-- end section bread crumb -->

    <!-- Star gallery Area 1
    ============================================= -->
    <section id="winter2019" class="gallery default-padding">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                @foreach($eventDetails as $eventDetail)
                    @if($eventDetail->event_category_id == $category->id)
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
                                        
                            <div  thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
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
                    @endif
                @endforeach    
                
                <div class="col-12 mt-4 text-center">
                    <a class="btn circle btn-sm btn-theme effect" href="{{ route('eventCategories' , $category->en_slug) }}">Know more about this event</a>                
                </div>
            </div>
        </div>
    </section>
        
     @endforeach

    <div class="contact-area default-padding">
      <div class="container">
          <div class="contact-items">
              <div class="row">
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
                                      <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="email" name="email" placeholder="Email*" type="email" required>
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text" required>
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group comments">
                                      <textarea class="form-control" id="message" name="message" placeholder="Tell Us About Project *" required></textarea>
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/Media/1.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>الاعلام </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">الاعلام</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/images/Media/2.jpg') }} )"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight"><strong>الاعلام </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home')}}"><i class="fas fa-home mr-2"></i>الرئيسية</a>/</li>
                                                <li class="active p-0">الاعلام</li>
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
    

    <section class="vedio py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 site-heading text-center">
                        <h2 class="text-main">احداثنا</h2>
                    </div>
            </div>
            <div class="row no-gutters justify-content-around align-items-center">
                @foreach($eventCategoeeis as $category)
                <a href="{{ route('eventCategories' , $category->ar_slug) }}" class="btn btn-lg btn-gradient">{{ $category->ar_name }}</a>
                @endforeach
            </div>
        </div>
    </section>

        <!-- End Gallery -->

    <!-- start section bread crumb -->
   @foreach($eventCategoeeis as $category)
            
        
                <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('eventCategery/'. $category->featured_image)}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>{{ $category->ar_name }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
    <!-- end section bread crumb -->

    <!-- Star gallery Area 1
    ============================================= -->
    <section id="winter2019" class="gallery default-padding">
        <div class="container">
            <div class="row align-items-center">
                @foreach($eventDetails as $eventDetail)
                    @if($eventDetail->event_category_id == $category->id)
                        <div class="col-lg-6">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff; overflow:hidden;" class="swiper-container mySwiper2 mainSlider">
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
                                        
                            <div  thumbsSlider="" class="swiper-container mySwiper thumbSlider galleryThumbs">
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
                    @endif
                @endforeach    
                
                <div class="col-12 mt-4 text-center">
                    <a class="btn circle btn-sm btn-theme effect" href="{{ route('eventCategories' , $category->ar_slug) }}">اعرف المزيد</a>                
                </div>
            </div>
        </div>
    </section>
        
     @endforeach

    <div class="contact-area default-padding">
      <div class="container">
          <div class="contact-items">
              <div class="row align-center">
                  <div class="col-lg-4 left-item">
                      <div class="info-items">
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
                                      <input class="form-control" id="name" name="name" placeholder="الاسم" type="text" required>
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="email" name="email" placeholder="البريد الالكتروني*" type="email" required>
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="phone" name="phone" placeholder="رقم الهاتف" type="text" required>  
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group comments">
                                      <textarea class="form-control" id="message" name="message" required placeholder="اخبرنا بما تريد معرفته *">    </textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <button type="submit" name="submit" id="submit">
                                      ارسال رسالة <i class="fa fa-paper-plane"></i>
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
    <!-- End Courses Area -->
    

    @include('frontend.layouts.footer')
@endsection

@section('scripts')
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection

