
  <!-- BEGIN: side Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="row justify-content-between">
                <li class="nav-item mr-auto">
                    <a href="{{ route('home') }}" class="logo"><img class="sidebar__logo" src="{{ asset('frontend/images/logo/logo-footer.png') }}" alt="Egec logo"></a> 

                </li>
                <li class="nav-item nav-toggle">
                  <a class="nav-link modern-nav-toggle pr-0 text-white" data-toggle="collapse">
                    <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                  </a>
                </li>
            </ul>
        </div>
        <div class="main-menu-content mt-3">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('academicGuide.home') }}">
                <p class="mb-0">لوحة التحكم</p>
                <i class="bx bx-chevron-left"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link">
                  <span class="menu-title mb-0" style="font-size: 18px">الاحصائيات</span>
              </a>
              <ul class="menu-content">
                  <li>
                    <a href="{{ route('academicGuide.statistics') }}"><span class="menu-item" data-i18n="eCommerce">الاحصائيات العامة</span><i class="bx bx-left-arrow-alt"></i></a>
                  </li>
                  <li>
                    <a href="{{ route('academicGuide.bachelorStatistics') }}"><span class="menu-item" data-i18n="eCommerce">احصائيات البكالوريس</span><i class="bx bx-left-arrow-alt"></i></a>
                  </li>
                  <li>
                    <a href="{{ route('academicGuide.masterStatistics') }}"><span class="menu-item" data-i18n="eCommerce">احصائيات الماجستير</span><i class="bx bx-left-arrow-alt"></i></a>
                  </li>
                  <li>
                    <a href="{{ route('academicGuide.phdStatistics') }}"><span class="menu-item" data-i18n="eCommerce">احصائيات الدكتوراه</span><i class="bx bx-left-arrow-alt"></i></a>
                  </li>
              </ul>
            </li>

        <!-- your sidebar here -->
        </ul>
      </div>
    </div>
            <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>