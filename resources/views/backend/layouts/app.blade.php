<!doctype html>
<html lang="en">

<head>
  <title> @yield('title') </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="shortcut icon" href="{{ asset('frontend/img/Icon.png') }}">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- BEGIN: Vendor CSS-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/vendors.min.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/tables/datatable/datatables.min.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/charts/apexcharts.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/extensions/swiper.min.css">-->
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/css-rtl/bootstrap.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/css-rtl/bootstrap-extended.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/css-rtl/colors.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/css-rtl/components.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/css-rtl/themes/dark-layout.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/css-rtl/themes/semi-dark-layout.css">-->
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/app-assets/css-rtl/pages/dashboard-ecommerce.css">-->

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!--<link rel="stylesheet" type="text/css" href="/backend/assets/css/style-rtl.css">-->
    <!-- END: Custom CSS-->
    <!-- BEGIN: Vendor CSS-->
    
    
    
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.50/es2015/jodit.fat.min.css"
      integrity="sha512-2cfnJ8ZMBqkaNXsi/6ucIcFRvKVFKW69HEP5S7L2fQtAaPrVg5XLkkUgl46kkaN5PPArXwLPCOqhbsAAiHQiXA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/style-rtl.css">
    
    
    <!-- END: Custom CSS-->
  @stack('css')
  <style>
    
    .dataTables_filter{
      display: none !important;
    }

    .box{
      width:800px;
      margin:0 auto;
    }
    
    .cke_notifications_area {
            display:none;
        }
        
        .cke_chrome  {
            width:100% !important;
        }

  </style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
  

    @include('backend.layouts.header')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
        @include('backend.layouts.side-bar')

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
              @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    
    <script>
    $(function(){
        $("#submit_form").on("submit",function(){
            $("#checkout").attr("disabled",true);
        })
    });
    </script>
    
   

    <!--   Core JS Files   -->
   <script src="/backend/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="/backend/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="/backend/app-assets/vendors/js/extensions/swiper.min.js"></script>
    
    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

    <!-- BEGIN: Page Vendor JS-->
    <script src="/backend/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/backend/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/backend/app-assets/js/scripts/configs/vertical-menu-light.js"></script>
    <script src="/backend/app-assets/js/core/app-menu.js"></script>
    <script src="/backend/app-assets/js/core/app.js"></script>
    <script src="/backend/app-assets/js/scripts/components.js"></script>
    <script src="/backend/app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <script src="/backend/app-assets/js/scripts/modal/components-modal.min.js"></script>

    <!-- BEGIN: Page JS-->
    <script src="/backend/app-assets/js/scripts/datatables/datatable.js"></script>
    <script src="/backend/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  @yield('js')



  @stack('js')
</body>

</html>