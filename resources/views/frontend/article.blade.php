@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | Egyptian Gulf For Educational Consultant 
    @else
        اديو جيت | المصرية الخليجية للخدمات التعليمية
	@endif
@endsection

@section('egec')

    @if(session('user_submitted_email'))
        @section('scripts')
            <script type="text/javascript">
                $(document).ready(function(){
                    $(".success-form").modal('show');
                });
            </script>
        @endsection
        <div class="modal fade success-form" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-body">
                <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-5x fas fa-check-circle text-success"></i>
                    <h3>Here is your credentials</h3>
                    <span>Email: <strong>{{ session('user_submitted_email') }}</strong></span><br>
                    <span>Password: <strong>{{ session('user_submitted_password') }}</strong></span>
                </div>
                </div>
            </div>
            </div>
        </div>
    @elseif(session('verified_success'))
        @section('scripts')
            <script type="text/javascript">
                $(document).ready(function(){
                    $(".success-verified").modal('show');
                });
            </script>
        @endsection
        <div class="modal fade success-verified" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-body">
                <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-5x fas fa-check-circle text-success"></i><br><br>
                    <b><strong>{{ session('verified_success') }}</strong></b>
                </div>
                </div>
            </div>
            </div>
        </div>
    @endif

    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

    <!-- Main content Start -->
        @if(app()->getLocale() == 'en')
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
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
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/img/19-FEB-2020-Edu-Gate-Fair-2020-112.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight">News<strong>EDUGATE </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home') }}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">News</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-thumb bg-cover" style="background-image: url({{ asset('frontend/img/19-FEB-2020-Edu-Gate-Fair-2020-115-1024x683.jpg') }})"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="content">
                                            <h2 data-animation="animated fadeInRight">News<strong>EDUGATE </strong></h2>
                                            <ul class="breadcrumb bg-transparent">
                                                <li class="mr-3"><a href="{{ route('home') }}"><i class="fas fa-home mr-2"></i>Home</a>/</li>
                                                <li class="active p-0">News</li>
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
    

        <section class="vedio default-padding">
        <div class="container">
            <div class="heading-site text-center">
                <h2>Videos in events</h2>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="vedio-img">
                        <img src="{{ asset('frontend/img/news/18-FEB-2020-Edu-Gate-Fair-2020-123.jpg') }}" class="position-relative" alt="Thumb">
                        <a class="popup-youtube  btn-vedio video-play-button" href="https://www.youtube.com/watch?v=8GQTt50izkg">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="vedio-img">
                        <img src="{{ asset('frontend/img/news/EDU-GATE-2019-76.jpg') }}" class="position-relative" alt="Thumb">
                        <a class="popup-youtube  btn-vedio video-play-button" href="https://www.youtube.com/watch?v=8GQTt50izkg">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="vedio-img">
                        <img src="{{ asset('frontend/img/news/EDU-GATE-2019-320.jpg') }}" class="position-relative" alt="Thumb">
                        <a class="popup-youtube  btn-vedio video-play-button" href="https://www.youtube.com/watch?v=8GQTt50izkg">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vedio bg-gray default-padding">
        <div class="container">
            
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="vedio-img">
                        <img src="{{ asset('frontend/img/news/87478407_2587973361449818_843797998050738176_o.jpg') }}" class="position-relative" alt="Thumb">
                        <a class="popup-youtube  btn-vedio video-play-button" href="https://www.youtube.com/watch?v=8GQTt50izkg">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="vedio-img">
                        <img src="{{ asset('frontend/img/news/87792780_2587973251449829_2492374491145961472_o.jpg') }}" class="position-relative" alt="Thumb">
                        <a class="popup-youtube  btn-vedio video-play-button" href="https://www.youtube.com/watch?v=8GQTt50izkg">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- end vedios -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{ asset('frontend/img/banner/banner4.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Our news</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">New</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- start section blogs -->
    <div class="blog-area default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="blog-content">
                    <div class="blog-item-box">
                        <div class="row">
                            <!-- Single Item -->
                            <div class="col-lg-4 col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="blog-single-with-sidebar.html"><img src="{{ asset('frontend/img/news/EDU-GATE-2019-103-1.jpg') }}" alt="Thumb"></a>
                                        <div class="date">
                                            <strong>18 </strong> Aug
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4><a href="blog-single-with-sidebar.html">تفاصيل افتتاح معرض التعليم الدولي إيديوجيت 2020</a></h4>
                                        <p>
                                            تفاصيل افتتاح معرض التعليم الدولي "إيديوجيت 2020"
                                        </p>
                                    </div>
                                    <div class="bottom-info">
                                        <span><i class="fas fa-user text-secondary"></i> بوابة الأهرام</span>
                                        <a class="btn-more" href="blog-single-with-sidebar.html">اقرأ المزيد <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="col-lg-4 col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="blog-single-with-sidebar.html"><img src="{{ asset('frontend/img/news/EDU-GATE-2019-231.jpg') }}" alt="Thumb"></a>
                                        <div class="date">
                                            <strong>18 </strong> Aug
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4><a href="blog-single-with-sidebar.html">تفاصيل افتتاح معرض التعليم الدولي إيديوجيت 2020</a></h4>
                                        <p>
                                            تفاصيل افتتاح معرض التعليم الدولي "إيديوجيت 2020"
                                        </p>
                                    </div>
                                    <div class="bottom-info ">
                                        <span><i class="fas fa-user text-secondary"></i> بوابة الأهرام</span>
                                        <a class="btn-more" href="blog-single-with-sidebar.html">اقرأ المزيد <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="col-lg-4 col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="blog-single-with-sidebar.html"><img src="{{ asset('frontend/img/news/EDU-GATE-2019-320.jpg') }}" alt="Thumb"></a>
                                        <div class="date">
                                            <strong>18 </strong> Aug
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4><a href="blog-single-with-sidebar.html">تفاصيل افتتاح معرض التعليم الدولي إيديوجيت 2020</a></h4>
                                        <p>
                                            تفاصيل افتتاح معرض التعليم الدولي "إيديوجيت 2020"
                                        </p>
                                    </div>
                                    <div class="bottom-info">
                                        <span><i class="fas fa-user text-secondary"></i> بوابة الأهرام</span>
                                        <a class="btn-more" href="blog-single-with-sidebar.html">اقرأ المزيد <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section blogs -->
    <!-- start section blogs -->
    <div class="blog-area bg-gray default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="blog-content">
                    <div class="blog-item-box">
                        <div class="row">
                            <!-- Single Item -->
                            <div class="col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="blog-single-with-sidebar.html"><img src="{{ asset('frontend/img/blog/1.jpg') }}" alt="Thumb"></a>
                                        <div class="date">
                                            <strong>18 </strong> Aug
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4><a href="blog-single-with-sidebar.html">تفاصيل افتتاح معرض التعليم الدولي إيديوجيت 2020</a></h4>
                                        <p>
                                            تفاصيل افتتاح معرض التعليم الدولي "إيديوجيت 2020"
                                        </p>
                                    </div>
                                    <div class="bottom-info">
                                        <span><i class="fas fa-user text-secondary"></i> بوابة الأهرام</span>
                                        <a class="btn-more" href="blog-single-with-sidebar.html">اقرأ المزيد <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="blog-single-with-sidebar.html"><img src="{{ asset('frontend/img/blog/1.jpg') }}" alt="Thumb"></a>
                                        <div class="date">
                                            <strong>18 </strong> Aug
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4><a href="blog-single-with-sidebar.html">تفاصيل افتتاح معرض التعليم الدولي إيديوجيت 2020</a></h4>
                                        <p>
                                            تفاصيل افتتاح معرض التعليم الدولي "إيديوجيت 2020"
                                        </p>
                                    </div>
                                    <div class="bottom-info">
                                        <span><i class="fas fa-user"></i> بوابة الأهرام</span>
                                        <a class="btn-more" href="blog-single-with-sidebar.html">اقرأ المزيد <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="blog-single-with-sidebar.html"><img src="{{ asset('frontend/img/blog/1.jpg') }}" alt="Thumb"></a>
                                        <div class="date">
                                            <strong>18 </strong> Aug
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4><a href="blog-single-with-sidebar.html">تفاصيل افتتاح معرض التعليم الدولي إيديوجيت 2020</a></h4>
                                        <p>
                                            تفاصيل افتتاح معرض التعليم الدولي "إيديوجيت 2020"
                                        </p>
                                    </div>
                                    <div class="bottom-info">
                                        <span><i class="fas fa-user text-secondary"></i> بوابة الأهرام</span>
                                        <a class="btn-more" href="blog-single-with-sidebar.html">اقرأ المزيد <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section blogs -->

  

  <!-- Star Courses Area
  ============================================= -->
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
                                  <h5>Location</h5>
                                  <p>
                                      22 Forsan towers -Laserina Tower – Maadi Ring road – Qatamya – Cairo – Egypt
                                  </p>
                              </div>
                          </div>
                          <!-- End Single Item -->
                          <!-- Single Item -->
                          <div class="item">
                              <div class="icon">
                                  <i class="fas fa-phone"></i>
                              </div>
                              <div class="info">
                                  <h5>Make a Call</h5>
                                  <p>
                                      +201000429759 /+201091207099

+20 2514562585
                                  </p>
                              </div>
                          </div>
                          <!-- End Single Item -->
                          <!-- Single Item -->
                          <div class="item">
                              <div class="icon">
                                  <i class="fas fa-envelope-open"></i>
                              </div>
                              <div class="info">
                                  <h5>Send a Mail</h5>
                                  <p>
                                      info@edugate-eg.com
                                  </p>
                              </div>
                          </div>
                          <!-- End Single Item -->
                      </div>
                  </div>
                  <div class="col-lg-8 right-item">
                      <h5>Need Help?</h5>
                      <h2>Keep in Touch</h2>
                      <form action="https://webhunt.store/themeforest/edukat/assets/mail/contact.php" method="POST" class="contact-form">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group comments">
                                      <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
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
            
        @endif
        <!-- Main content End --> 

    @include('frontend.layouts.footer')
@endsection