<!--Full width header Start-->
@if(app()->getLocale() == 'en')
<style>
    #sidebar{
    position: fixed;
    top:50%;
    left: 0;
    transform: translateY(-50%);
    z-index: 9999;
    display: flex;
    align-items: center;
    transition: all 1s;
}
#sidebar.left{
    left: -50px;
}
#sidebar.right{
    left: 0;
}

#sidebar_container{
    background-color:#fff;
    padding: 20px 10px;
    float: left;
    box-shadow: 0 0 18px rgb(0 0 0 / 40%);
    border-radius: 20px;
    /* position: absolute;
    left: -100px; */

}

#sidebar ul li a{
    width:30px;
    height:30px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;

}
#sidebar ul li.whatsapp{
background-color: #25D366;
margin-bottom: 10px

}
#sidebar ul li.facebook{
    background-color: #3b5998 ;
    margin-bottom: 10px
}
#sidebar ul li.instgram{
    background-color: #fe4164 ;
    margin-bottom: 10px
}
#sidebar ul li.twitter{
    background-color: #00acee ;
    margin-bottom: 10px
}
#sidebar ul li.admission_form{
    background-color: #061b49 ;
}
.icons_container li i{
    color: #fff;
}
#sidebar .toggle_btn{
    background-color: #031a3d;
    color:#fff;
    padding: 8px;
    display: flex;
    align-items: center;
    justify-content: end;
    cursor: pointer;
}
</style>
                <!-- start top area -->
    <div class="top-bar-area bg-dark text-light inline">
        <div class="container-full">
            <div class="row align-center">
                
                <div class="col-lg-7 col-md-12 left-info">
                    <div class="item-flex">
                        <ul class="list">
                            <!--<li>-->
                            <!--    <a href="tel:+201000429759">-->
                                    
                            <!--        <i class="fas fa-phone"></i>-->
                            <!--        {{ $contact->phone ?? '' }}-->
                            <!--    </a>-->
                            <!--</li>-->
                            
                            <li>
                                <i class="fas fa-envelope"></i> <a href="mailto:{{ $contact->email ?? '' }}">{{ $contact->email ?? '' }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 right-info">
                    <div class="item-flex">
                        <div class="social">
                            <ul>
                                <li>
                                    <a href="{{ $contact->facebook ?? '' }}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                
                                <li>
                                    <a href="{{ $contact->instagram ?? '' }}"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="button">
                            <a href="https://egecmena.com/en/edugate-google-form-uae" target="_blank" class="btn text-white px-3 py-2">Addmission Form</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- start top area -->
    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default attr-border navbar-fixed white no-background bootsnav">

            

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="Language"><a href="/ar">عربي</a></li>
                    </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header ">
                    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand animation-area position-relative" href="{{ route('welcome') ?? '' }}" >
                        <img src="{{ asset('frontend/img/SMall.png') ?? '' }}" class="logo logo-display"  alt="Logo">
                        <img src="{{ asset('frontend/img/SMall.png') ?? '' }}" class="logo logo-scrolled"  alt="Logo">
                        <ul class="box-area">
                        <li></li>
                        <li></li>
                        <li></li>
                        </ul>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        
                        
                       <li>
                            <a href="{{ route('welcome') ?? '' }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') ?? '' }}">About us</a>
                        </li>
                        <li>
                            <a href="{{ route('clients') ?? '' }}">Partners</a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" >Events</a>
                            <ul class="dropdown-menu">
                                @isset($eventCategoeeis)
                                    
                                @foreach($eventCategoeeis as $eventCategery)
                                <li class="dropdown">
                                    <a href="{{ route('eventCategories' , $eventCategery->en_slug) ?? '' }}" >{{ $eventCategery->en_name?? '' }}</a>
                                </li>
                                @endforeach    
                                @endisset
                                    

                            </ul>
                        </li>
                        
                        <li>
                            <a href="{{ route('gallery')?? '' }}">Media</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('contact-us')?? '' }}">Contact</a>
                        </li>
                        @auth
                            <li class="admin dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown">{{ auth()->user()->ar_name ?? '' }}  </a>
                                @if(auth()->user()->role == 'super-admin' || auth()->user()->role == 'admin')
                                <ul class="dropdown-menu animated fadeOutUp">
                                        <li class="dropdown">
                                            <a href="{{ route('admin.home') ?? '' }}"><i class="fa fa-user-cog" aria-hidden="true"></i> Admin Dashboard</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('logout') ?? '' }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                            
                                             <form id="logout-form" action="{{ route('logout') ?? '' }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                        </li>
                                </ul>
                                @endif
                            </li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
            <div id="sidebar" style="display:none;">
        <div id="sidebar_container">
            <ul class="list-unstyled icons_container">
                <li class="whatsapp" target="_blank"><a href="https://api.whatsapp.com/send?phone=971566306890" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                <li class="facebook" target="_blank"><a href="https://www.facebook.com/EduGate.Emirates/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li class="instgram" target="_blank"><a href="https://www.instagram.com/edugate.emirates/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li class="admission_form addmission_sidebar" target="_blank"><a href="https://egecmena.com/en/edugate-google-form-uae"><i class="fas fa-clipboard-list"></i></a></li>
                
            </ul>
    
            
        </div>
        <div class="toggle_btn">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <!-- <i class="fas fa-1x fa-cog "></i> -->
        </div>
        <div class="clearfix"></div>
    </div>

    @else
    <style>
    #sidebar{
    position: fixed;
    top:50%;
    left: 0;
    transform: translateY(-50%);
    z-index: 9999;
    display: flex;
    align-items: center;
    transition: all 1s;
    direction: ltr;
}
#sidebar.left{
    left: -50px;
}
#sidebar.right{
    left: 0;
}

#sidebar_container{
    background-color:#fff;
    padding: 20px 10px;
    float: left;
    box-shadow: 0 0 18px rgb(0 0 0 / 40%);
    border-radius: 20px;
    /* position: absolute;
    left: -100px; */

}

#sidebar ul li a{
    width:30px;
    height:30px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;

}
#sidebar ul li.whatsapp{
background-color: #25D366;
margin-bottom: 10px

}
#sidebar ul li.facebook{
    background-color: #3b5998 ;
    margin-bottom: 10px
}
#sidebar ul li.instgram{
    background-color: #fe4164 ;
    margin-bottom: 10px
}
#sidebar ul li.twitter{
    background-color: #00acee ;
    margin-bottom: 10px
}
#sidebar ul li.admission_form{
    background-color: #061b49 ;
}
.icons_container li i{
    color: #fff;
}
#sidebar .toggle_btn{
    background-color: #031a3d;
    color:#fff;
    padding: 8px;
    display: flex;
    align-items: center;
    justify-content: end;
    cursor: pointer;
}
</style>
    <div class="top-bar-area bg-dark text-light inline">
        <div class="container-full">
            <div class="row align-center">
                
                <div class="col-lg-7 col-md-12 left-info">
                    <div class="item-flex">
                        <ul class="list">
                            <!--<li>-->
                            <!--    <a href="tel:+201000429759">-->
                                    
                            <!--        <i class="fas fa-phone"></i>-->
                            <!--        {{ $contact->phone ?? '' }}-->
                            <!--    </a>-->
                            <!--</li>-->
                            
                            <li>
                                <i class="fas fa-envelope"></i> <a href="mailto:{{ $contact->email ?? '' }}">{{ $contact->email ?? '' }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 right-info">
                    <div class="item-flex">
                        <div class="social">
                            <ul>
                                <li>
                                    <a href="{{ $contact->facebook ?? '' }}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                               
                                <li>
                                    <a href="{{ $contact->instagram ?? '' }}"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="button">
                            <a href="https://egecmena.com/ar/edugate-google-form-uae" target="_blank" class="btn text-white px-3 py-2" >طلب القبول الجامعي</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- start top area -->
    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default attr-border navbar-fixed white no-background bootsnav">

            

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav float-left">
                    <ul>
                        <li class="Language"><a href="/en">English</a></li>
                    </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand animation-area position-relative" href="{{ route('home') ?? '' }}" >
                        <img src="{{ asset('frontend/img/SMall.png') ?? '' }}" class="logo logo-display"  alt="Logo">
                        <img src="{{ asset('frontend/img/SMall.png') ?? '' }}" class="logo logo-scrolled"  alt="Logo">
                    <ul class="box-area">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    </a>
                </div>
                <!-- End Header Navigation -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                        
                        @auth
                            <li class="admin dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown">{{ auth()->user()->ar_name ?? '' }}  </a>
                                @if(auth()->user()->role == 'super-admin' || auth()->user()->role == 'admin')
                                <ul class="dropdown-menu animated fadeOutUp">
                                        <li class="dropdown">
                                            <a href="{{ route('admin.home') ?? '' }}"><i class="fa fa-user-cog" aria-hidden="true"></i> لوحه التحكم</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('logout') ?? '' }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>خروج</a>
                                            
                                             <form id="logout-form" action="{{ route('logout') ?? '' }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                        </li>
                                </ul>
                                @endif
                            </li>
                        @endif
                        
                        <li>
                            <a href="{{ route('contact-us')?? '' }}">تواصل معنا</a>
                        </li>
                       
                        <li>
                            <a href="{{ route('gallery')?? '' }}">الاعلام</a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" >الأحداث</a>
                            <ul class="dropdown-menu">
                                @foreach($eventCategoeeis as $eventCategery)
                                    <li class="dropdown">
                                        <a href="{{ route('eventCategories' , $eventCategery->ar_slug) ?? '' }}" >{{ $eventCategery->ar_name?? '' }}</a>
                                    </li>
                                @endforeach    
                                    

                            </ul>
                        </li>
                        
                        
                        
                        <li>
                            <a href="{{ route('clients') ?? '' }}">شركاؤنا</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('about-us') ?? '' }}">من نحن</a>
                        </li>
                        <li>
                            <a href="{{ route('home') ?? '' }}">الرئيسية</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->

                <!-- Collect the nav links, forms, and other content for toggling -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
                <div id="sidebar" style="display:none;">
        <div id="sidebar_container">
            <ul class="list-unstyled icons_container">
                <li class="whatsapp" target="_blank"><a href="https://api.whatsapp.com/send?phone=971566306890" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                <li class="facebook" target="_blank"><a href="https://www.facebook.com/EduGate.Emirates/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li class="instgram" target="_blank"><a href="https://www.instagram.com/edugate.emirates/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li class="admission_form addmission_sidebar" target="_blank"><a href="https://egecmena.com/en/edugate-google-form-uae"><i class="fas fa-clipboard-list"></i></a></li>
                
            </ul>
    
            
        </div>
        <div class="toggle_btn">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <!-- <i class="fas fa-1x fa-cog "></i> -->
        </div>
        <div class="clearfix"></div>
    </div>

@endif
<!--Full width header End-->