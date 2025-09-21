@if(app()->getLocale() == 'en')
    <footer id="footer" class="footer fixed-bottom">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 footer__widget footer__widget-about mb-30">
                        <div class="footer__widget-content">
                            <h6 class="footer__widget-title">Egyptian Gulf for Educational Consultant</h6>                            
                            <p> A company that works in the field of developing and qualifying human resources and providing all educational services starting from enrolling students through the study period until obtaining </p>
                        </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 footer__widget footer__widget-text">
                        <h6 class="footer__widget-title">Connect With Us</h6>
                        <div class="footer__widget-content">
                            <p> City Address - {{ $contact->en_address }}</p>

                            <span style="color: #fff ; font-size: 14px">For inquiries, contact WhatsApp, Viber, or Emo</span>
                            <a href="tel:{{ $contact->phone }}" class="phone-link">
                                <span> {{ $contact->phone }} </span>
                            </a>


                        </div><!-- /.footer-widget-content -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-sm-6 col-md-6 col-lg-2 footer__widget footer__widget-nav">
                        <h6 class="footer__widget-title">Quick Links</h6>
                        <div class="footer__widget-content">
                            
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('home') }}" target="_self"> Home</a></li>
                                <li><a href="{{ route('about-us') }}" target="_self"> About us</a></li>
                                <li><a href="{{ route('contact-us') }}" target="_self"> Contact us</a></li>
                                <li><a href="{{ route('clients') }}" target="_self"> Our partners</a></li>
                            </ul>

                            
                        </div><!-- /.footer-widget-content -->
                    </div><!-- /.col-lg-2 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-top -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="footer__contact">
                            <div class="footer__contact-item">
                                <div class="footer__contact-item-icon">
                                    <i class="fa fa-phone"></i>
                                </div><!-- /.footer__contact-item-icon -->
                                <div class="footer__contact-item-text">
                                    <span>Contact Us:</span>
                                    <strong><a href="">{{ $contact->phone }}</a></strong>
                                </div><!-- /.footer__contact-item-text -->
                            </div><!-- /.footer__contact-item -->
                            <div class="footer__contact-item">
                                <div class="footer__contact-item-icon">
                                    <i class="fa fa-envelope"></i>
                                </div><!-- /.footer__contact-item-icon -->
                                <div class="footer__contact-item-text">
                                    <span>Email us:</span>
                                    
                                    <strong><a href="#">{{ $contact->email }} </a></strong>
                                    <!-- <strong><a href="#">EGEC@gulf_egy.com</a></strong> -->


                                </div><!-- /.footer__contact-item-text -->
                            </div><!-- /.footer__contact-item -->
                            <div class="footer__contact-item">
                                <div class="footer__contact-item-icon">
                                    <i class="fa fa-hourglass"></i>
                                </div><!-- /.footer__contact-item-icon -->
                                <div class="footer__contact-item-text">
                                    <span>Working Hours:</span>
                                    <strong>Mon-Fri: 8am – 7pm</strong>
                                </div><!-- /.footer__contact-item-text -->
                            </div><!-- /.footer__contact-item -->
                            <ul class="social__icons list-unstyled mt-30 mb-30">
                                <li><a href="{{ $contact->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $contact->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $contact->instagram }}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div><!-- /.footer__contact -->
                        <div class="footer__copyright text-center">
                                                            <span> All Rights Reserved To
                                <a class="color1" href="http://www.digitalbondmena.com">Digital Bond</a>
                                2020 ©
                            </span>

                                <div class="d-inline-block mt-1" id="end_page_menu">
                                
                                <ul class="footer__sitemap-links list-unstyled">
                                    <li class="d-inline-block"><a href="{{ route('contact-us') }}" target="_self"> Contact us </a></li>
                                    {{-- <li class="d-inline-block"><a href="{{ route('about-us') }}" target="_self"> About us </a></li> --}}
                                    <li class="d-inline-block"><a href="{{ route('clients') }}" target="_self"> Our Partners </a></li>
                                </ul>


                        </div><!-- /.Footer-copyright -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.Footer-bottom -->
        </div>
    </footer>
@else
    <footer id="footer" class="footer fixed-bottom">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 footer__widget footer__widget-about mb-30">
                        <div class="footer__widget-content">
                            <h6 class="footer__widget-title" style="float: right">المصرية الخليجية للخدمات التعليمية</h6>                            
                            <p style="text-align: justify;float:right;"> شركة تعمل في مجال تطوير وتأهيل الكوادر البشرية وتقديم كافة الخدمات التعليمية ابتداء من التحاق الطلاب خلال فترة الدراسة وحتى الحصول عليها </p>
                        </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 footer__widget footer__widget-text" style="float:right !important;text-align: justify;">
                        <h6 class="footer__widget-title" > تواصل معنا  :</h6>
                        
                        <div class="footer__widget-content">
                            <p> عنوان المدينة -  {{ $contact->ar_address }}</p>

                            <h6 style="" class="footer__widget-title"> للاستفسارات ، اتصل بـ واتساب أو فايبر أو ايمو : </h6>
                            
                            <a href="tel:{{ $contact->phone }}" class="phone-link" style="direction:ltr; float:right;">
                                <span> {{ $contact->phone }} </span>
                            </a>


                        </div><!-- /.footer-widget-content -->
                        
                    </div><!-- /.col-lg-3 -->
                    <div class="col-sm-6 col-md-6 col-lg-2 footer__widget footer__widget-nav" style="float:right !important;text-align: justify;">
                        <h6 class="footer__widget-title" >  اختصارات :</h6>
                        <div class="footer__widget-content">  
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('home') }}" target="_self" style="color: white"> الرئيسية </a></li>
                                <li><a href="{{ route('about-us') }}" target="_self" style="color: white"> من نحن  </a></li>
                                <li><a href="{{ route('contact-us') }}" target="_self" style="color: white"> تواصل معنا </a></li>
                                <li><a href="{{ route('clients') }}" target="_self" style="color: white"> شركائنا </a></li>
                            </ul>
                        </div><!-- /.footer-widget-content -->
                        
                    </div><!-- /.col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-top -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="footer__contact">
                            <div class="footer__contact-item">
                                <div class="footer__contact-item-icon">

                                    <i class="fa fa-phone"></i>
                                </div><!-- /.footer__contact-item-icon -->
                                <div class="footer__contact-item-text">
                                    <span style="float: right;"> تواصل معنا : </span>
                                    <br>
                                    <strong style="float: right"><a href="">{{ $contact->phone }}</a></strong>
                                </div><!-- /.footer__contact-item-text -->
                            </div><!-- /.footer__contact-item -->
                            <div class="footer__contact-item">
                                <div class="footer__contact-item-icon">
                                    <i class="fa fa-envelope"></i>
                                </div><!-- /.footer__contact-item-icon -->
                                <div class="footer__contact-item-text">
                                    <span style="float: right;"> ارسل لنا عبر البريد الإلكتروني :</span>
                                    
                                    <strong style="float: right"><a href="#">{{ $contact->email }} </a></strong>
                                    <!-- <strong><a href="#">EGEC@gulf_egy.com</a></strong> -->


                                </div><!-- /.footer__contact-item-text -->
                            </div><!-- /.footer__contact-item -->
                            <div class="footer__contact-item">
                                <div class="footer__contact-item-icon">
                                    <i class="fa fa-hourglass"></i>
                                </div><!-- /.footer__contact-item-icon -->
                                <div class="footer__contact-item-text">
                                    <span style="float: right;"> ساعات العمل الرسمية :</span>
                                    <strong style="float: right; text-align: justify;">من الاثنين الى الجمعة من ال 8 صباحا حتى ال 7 مساء</strong>
                                </div><!-- /.footer__contact-item-text -->
                            </div><!-- /.footer__contact-item -->
                            <ul class="social__icons list-unstyled mt-30 mb-30" style="float: right; text-align: justify; padding: 0 20px;">
                                <li style="float: right; text-align: justify;"><a href="{{ $contact->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                <li style="float: right; text-align: justify;"><a href="{{ $contact->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li style="float: right; text-align: justify;"><a href="{{ $contact->instagram }}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div><!-- /.footer__contact -->
                        <div class="footer__copyright text-center">
                                                            <span> جميع الحقوق محفوظة لدى 
                                <a class="color1" href="http://www.digitalbondmena.com"> Digital Bond </a>
                                2020 ©
                            </span>

                                <div class="d-inline-block float-left mt-1" id="end_page_menu">
                                
                                <ul class="footer__sitemap-links list-unstyled">
                                    <li class="d-inline-block"><a href="{{ route('contact-us') }}" target="_self"> تواصل معنا</a></li>
                                    <li class="d-inline-block"><a href="{{ route('contact-us') }}" target="_self">  شركائنا</a></li>
                                </ul>


                        </div><!-- /.Footer-copyright -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.Footer-bottom -->
        </div>
    </footer>
@endif