@if(app()->getLocale() == 'en')
        <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items py-5">
                <div class="row">
                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item about">
                                                        <h4 class="widget-title">About us</h4>

                            <p>
                                {{ $about->en_achevement_text ?? ''}}
                            </p>
                            
                            
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Events</h4>
                            <ul>
                                @isset($eventCategoeeis)
                                    
                                @foreach($eventCategoeeis as $eventCategery)
                                <li>
                                    <a href="{{ route('eventCategories' , $eventCategery->en_slug) ?? ''}}" >{{ $eventCategery->en_name?? ''}}</a>
                                </li>
                                @endforeach  
                                @endisset
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Support</h4>
                            <ul>
                                <li>
                                    <a href="{{ route('home') ?? ''}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') ?? ''}}">About us</a>
                                </li>
                                <li>
                                    <a href="{{ route('gallery') ?? ''}}">Media</a>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item contact">
                            <h4 class="widget-title">Contact Info</h4>
                            <div class="address">
                                <ul>
                                    <li>
                                        <strong>Email:</strong> <a href="mailto:{{ $contact->email ?? ''}}">{{ $contact->email ?? ''}}</a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <strong>Contact:</strong>{{ $contact->phone ?? ''}}-->

                                    <!--</li>-->
                                    <li>
                                        <strong>Address:</strong> {{ $contact->en_address ?? ''}}
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="socialmedi-links d-flex">
                            <a href="{{ $contact->facebook ?? ''}}" class="text-white mr-4 mt-3">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            
                            <a href="{{ $contact->instagram ?? ''}}" class="text-white mr-4 mt-3">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row align-items-end">
                            <p>All copyrights reserved by  © 2020
                            </p>
                            <a class="mx-2 mb-1" href="http://www.digitalbondmena.com/"><img style="height: 30px;" src="{{asset('frontend/img/db.png')?? ''}}" alt=""></a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
@else
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items py-5">
                <div class="row">
                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item about">
                                                        <h4 class="widget-title">من نحن</h4>

                            <p>
                                {{ $about->ar_achevement_text ?? ''}}
                            </p>
                            
                            
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">الاحداث</h4>
                            <ul>
                                @foreach($eventCategoeeis as $eventCategery)
                                    <li>
                                        <a href="{{ route('eventCategories' , $eventCategery->ar_slug) ?? ''}}" >{{ $eventCategery->ar_name?? ''}}</a>
                                    </li>
                                @endforeach  
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">روابط</h4>
                            <ul>
                                <li>
                                    <a href="{{ route('home') ?? ''}}">الرئيسية</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') ?? ''}}">من نحن</a>
                                </li>
                                <li>
                                    <a href="{{ route('gallery') ?? ''}}">الاعلام</a>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item contact">
                            <h4 class="widget-title">تواصل معنا</h4>
                            <div class="address">
                                <ul>
                                    <li>
                                        <strong>البريد الالكتروني : </strong>
                                        <a href="mailto:{{ $contact->email ?? ''}}">{{ $contact->email ?? ''}}</a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <strong>Contact:</strong>{{ $contact->phone ?? ''}}-->

                                    <!--</li>-->
                                    <li>
                                        <strong>العنوان : </strong> {{ $contact->ar_address ?? ''}}
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="socialmedi-links d-flex">
                            <a href="{{ $contact->facebook ?? ''}}" class="text-white mr-4 mt-3">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                           
                            <a href="{{ $contact->instagram ?? ''}}" class="text-white mr-4 mt-3">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row align-items-end">
                            
                            <div class="row align-items-end">
                            <p>©️ 2021 جميع الحقوق محفوظة لدي</p>
                            <a class="mx-2 mb-1" href="http://www.digitalbondmena.com/"><img style="height: 30px;" src="{{asset('frontend/img/db.png')?? ''}}" alt=""></a>
                        </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
@endif