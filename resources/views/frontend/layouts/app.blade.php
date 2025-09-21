<!DOCTYPE html>
<html lang="en">

    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Edugate">

    <!-- ========== Page Title ========== -->

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('frontend/img/Icon.png') }} " type="image/x-icon">



   

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap" rel="stylesheet">


<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Digital Bond">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Your Title Page
    ============================================= -->
<title>@yield('title')</title>
<!-- Favicon Icons
     ============================================= -->
<link rel="shortcut icon" href="{{ asset('frontend/images/Icon.png') }}">
<!-- Bootstrap Links
     ============================================= -->
<!-- Bootstrap CSS  -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,500,700%7cRajdhani:400,500,600,700&display=swap">
<!-- Plugins
  ============================================= -->
    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('frontend/css/theme.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    
    <style>
        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.swiper-button-next, .swiper-button-prev{
    transform: translateY(-50%);
}
    </style>
    @yield('css')

   
    <!-- ========== End Stylesheet ========== -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    @if(app()->getLocale() == 'ar')



  <link href="{{ asset('frontend/css/style_ar.css') }}" rel="stylesheet">
@endif

</head>
<body class="device-touch">
    @yield('egec')
        <!-- jQuery Frameworks
    ============================================= -->
    
    <script src="{{ asset('frontend/js/theme.min.js') }} "></script>
    <script src="{{ asset('frontend/js/main.js') }} "></script>
    <!-- Core JS Libraries -->

    @yield('scripts')

<script>
    // swiper gallery slider
        const myMainSlider = document.querySelectorAll('.mainSlider');
        const myGalleryThumbs = document.querySelectorAll('.galleryThumbs');
        for (swiperCounter = 0; swiperCounter < myMainSlider.length; swiperCounter++) {
            myMainSlider[swiperCounter].classList.add('mainSlider' + swiperCounter);
            myGalleryThumbs[swiperCounter].classList.add('galleryThumbs' + swiperCounter);

            var galleryThumbs = new Swiper('.galleryThumbs' + swiperCounter , {
                spaceBetween: 10,
                slidesPerView: 6,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            });

            var mainSlider = new Swiper('.mainSlider' + swiperCounter, {
                spaceBetween: 10,
                autoplay:true,
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: galleryThumbs
                },
            }); 
        }
</script>


</body>
</html>