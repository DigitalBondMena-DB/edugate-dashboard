<!-- Navbar -->
<!-- Navbar -->
<div class="header-navbar-shadow"></div>
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
        <div class="collapse navbar-collapse ">
            <ul class="navbar-nav">
              <!-- your navbar here -->
              <li>
                  <form id="submit_form" class="logout-form" action="{{ url('/en/logout') }}" method="POST" style="" >
                                            @csrf
                                        <button class="btn btn-danger" type="submit" id="checkout" href="{{ url('/en/logout') }}" style="margin-right: 50px;width: max-content;">Log Out</button>
                                            
                                        </form>
    
              
              </li>
            </ul>
        </div>
    </nav>

    <script>
    $(function(){
        $("#submit_form").on("submit",function(){
            $("#checkout").attr("disabled",true);
        })
    });
    </script>
  <!-- End Navbar -->
  <!-- End Navbar -->