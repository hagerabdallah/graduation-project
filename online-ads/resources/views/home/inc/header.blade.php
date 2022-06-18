    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="HomePage.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <div class="dropdown">
                    <span>Quick</span>
                    <div class="dropdown-content">
                    <a href="HomePage.html">Home</a>
                    <a href="#">Categories</a>
                    <a href="AllAuctions.html">Auctions</a>
                    <a href="#">Advertisments</a>
                    <a href="#">Login</a>
                    {{-- <a href="#">logout</a> --}}

                  </div>
                </div>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="" style="color: white">Home</a></li>
                    <li><a class="nav-link scrollto" href="">About</a></li>
                    <div class="nav-dropdown">

                    <li><a class="nav-link scrollto" href="HomePage.html#categories">Categories</a></li>
                        <div class="cat-drop">
                            <a href="">Shoses</a>
                            <a href="#">Clothes</a>
                            <a href="#">Accessories</a>
                            <a href="#">Bags</a>
                            <a href="#">Horses</a>
                            <a href="#">Cars</a>
                            <a href="#">Houses</a>
                            <a href="#">Electronics</a>
                          </div>
                        </div>
                         <div class="nav-dropdown">

                    <li><a href="AllAuctions.html">Auctions</a></li>
                         <div class="cat-drop">
                        <a href="#">All Auctions</a>
                        <a href="#">My Auctions</a>
                        <a href="#">Create Auction</a>
                      </div>
                    </div>
                    <div class="nav-dropdown">

                    <li><a href="Ad.html">Advertisements</a></li>
                    <div class="cat-drop">
                        <a href="#">All Advertisements</a>
                        <a href="#">My Advertisements</a>
                        <a href="#">Create Advertisement</a>
                      </div>
                    </div>
                   @auth
                   <li><a class="nav-link scrollto" href="{{url('user/profile')}}">Profile</a></li>
                   <li> <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: #012970 ;font-family:  'Poppins',sans-serif;" class="bi bi-lock mx-3 "><span class="mx-3">Logout</span></a></li>
                    <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>  
                   @endauth
                    


                    {{-- <li><a class="nav-link scrollto" href="">Logout</a></li> --}}

                  
  
                    
                    @guest
                    <a href="#" class="sign "> <i class="bi bi-person nav-link scrollto sign ">
                      Sign in</i></a>     
                    @endguest
                      
                   
                 
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
                
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header --> 