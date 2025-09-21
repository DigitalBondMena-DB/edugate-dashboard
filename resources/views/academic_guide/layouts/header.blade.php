<!-- Navbar -->
    <nav class="header-navbar main-header-navbar navbar-expand-xl navbar navbar-with-menu">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
                        </ul>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <!-- your navbar here -->
              <li>
                  <a href="{{ url('/en/logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('خروج') }}
                  </a>
    
                 <form id="logout-form" action="{{ url('/en/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
        </div>
    </nav>
  <!-- End Navbar -->