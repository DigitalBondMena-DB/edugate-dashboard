<!doctype html>
<html lang="en">

<head>
  <title> Dashboard </title>
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
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/styleNew.css">
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

  </style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
            
            <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg bg-white navbar navbar-with-menu">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                
                    <ul class="nav navbar-nav justify-content-center ">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <img src="{{asset('frontend/img/edugate logo final.png')}}" class="h-80px" alt="" style="width: 217.688px;">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
            <div class="app-content content w-100 m-0">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="container-fluid">
                    <div class="card big-card" style="background-color: #f3f8f9;">
                      <div class="card-body">
          
                        <div class="row">
                          
                          
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/sliders-creative-icon-design-free-vector.jpg')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Sliders
                                    </p>
                                    <a class="btn btn-success" href="{{ route('sliders.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/001.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      About
                                    </p>
                                    <a class="btn btn-success" href="{{ route('about.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/partner.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Partners
                                    </p>
                                    <a class="btn btn-success" href="{{ route('clients.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/contacts.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Contacts Infromation
                                    </p>
                                    <a class="btn btn-success" href="{{ route('contact-us.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/google_contacts.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Users Contacts
                                    </p>
                                    <a class="btn btn-success" href="{{ route('feeback.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          
                         
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/feedbackimg.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Users Feedbacks
                                    </p>
                                    <a class="btn btn-success" href="{{ route('service.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/services-icon-2.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Services
                                    </p>
                                    <a class="btn btn-success" href="{{ route('serviceuser.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/Events-icon.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Event Category
                                    </p>
                                    <a class="btn btn-success" href="{{ route('event-categery.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/eventdetail.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Event Details
                                    </p>
                                    <a class="btn btn-success" href="{{ route('event-detail.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/article.ico')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Article Category
                                    </p>
                                    <a class="btn btn-success" href="{{ route('articleSubCategory.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/newartcle.png')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      News Article
                                    </p>
                                    <a class="btn btn-success" href="{{ route('newArticle.index') }}">View </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                              <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-12">
                                  <img src="{{ asset('frontend/img/Logout.jpg')}}" class="w-100 card-image" alt="">
                                </div>
                                <div class="col-lg-8  col-12">
                                  <div class="card-body">
                                    <p class="  card-text text-ellipsis" style="color:#00732f !important">
                                      Logout
                                    </p>
                                    
                                    
                                        <form id="submit_form" class="logout-form" action="{{ url('/en/logout') }}" method="POST" style="" >
                                            @csrf
                                        <button class="btn btn-danger" type="submit" id="checkout" href="{{ url('/en/logout') }}">Log Out</button>
                                            
                                        </form>
                                   
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
          
              
                        </div>
                      </div>
                    </div>
          
                    </div>
                <!-- Dashboard Ecommerce ends -->
                </section>

            </div>
        </div>
    </div>
    
    
    
    <!--   Core JS Files   -->
   <script src="/backend/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="/backend/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="/backend/app-assets/vendors/js/extensions/swiper.min.js"></script>

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
    <script>
    $(function(){
        $("#submit_form").on("submit",function(){
            $("#checkout").attr("disabled",true);
        })
    });
    </script>
</body>    
</html>
