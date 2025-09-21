
  <!-- BEGIN: side Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="row justify-content-between my-2">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="logo"><img class="sidebar__logo" src="{{ asset('frontend/img/SMall.png') }}" alt="Egec logo"></a> 
                </li>
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between pr-0 text-white" data-toggle="collapse">
                    <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                  </a>
                </li>
            </ul>
        </div>
        <div class="main-menu-content mt-5">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
          
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('admin.home') }}">
                    <p class="mb-0">Control</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>


                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('sliders.index') }}">
                    <p class="mb-0">Sliders</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('about.index') }}">
                    <p class="mb-0">About</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('clients.index') }}">
                    <p class="mb-0">Partners</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>


                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('contact-us.index') }}">
                    <p class="mb-0">Contact Information</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('feeback.index') }}">
                    <p class="mb-0">Users Contacts</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('service.index') }}">
                    <p class="mb-0">Users FeedBacks</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('serviceuser.index') }}">
                    <p class="mb-0">Services</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('event-categery.index') }}">
                    <p class="mb-0">Event Category</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('event-detail.index') }}">
                    <p class="mb-0">Event Details</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('articleSubCategory.index') }}">
                    <p class="mb-0">Article Category</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('newArticle.index') }}">
                    <p class="mb-0">News Article</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                 <li class="nav-item">
                  <a class="nav-link row no-gutters justify-content-between" href="{{ route('tags.index') }}">
                    <p class="mb-0">SEO Tags</p>
                    <i class="bx bx-chevron-right"></i>
                  </a>
                </li>
                
                
            
                
                

                

        <!-- your sidebar here -->
          </ul>
        </div>
    </div>
        <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
      <!-- end: side Menu-->
