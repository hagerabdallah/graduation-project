 <!-- Sidebar  -->
 <nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="assets/img/logo.png" class="img-fluid " style="width: 20px;">
            <span class="" style="color: #012970 ; font-size:22px ;">Quick</span>
        </h3>
    </div>
    <ul class="list-unstyled components ">
        <li class="list-unstyled components active">
            <a href="{{url('user/profile')}}"class="dashboard links p-2" style="color: #012970 ;"><span class=""> <i
                        class="bi bi-person-circle"></i>Profile</span></a>
        </li>
        <hr class=" w-75 text-center m-3" style="height:0.5px; color: cornflowerblue" ;>






        <li class="list-unstyled components menu  "><a href="" class=""
                style="color: #012970 ;font-family: 'Poppins',sans-serif;"><i class="bi bi-grid "></i>
                My Advertisements
                <span class="bi bi-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li class="menu "><a href="{{url('user/advertisment/index')}}">All Advertisements</a></li>
                <li class=" menu "><a href="{{url('user/advertisment/create')}}">Create New</a>
                </li>
            </ul>
        </li>
        <hr class=" w-75 text-center m-3" style="height:0.5px; color: cornflowerblue" ;>
        <li class="list-unstyled components menu "><a href=""
                style="color: #012970 ;font-family: 'Poppins',sans-serif;"><i class="bi bi-grid"></i>
                My Auctions
                <span class="bi bi-chevron-down p-1"></span></a>
            <ul class="nav child_menu">
                <li class=" menu "><a href="{{url('user/auction/index')}}"> All
                        Auction</a> </li>
                <li class=" menu"><a href="{{url('user/auction/create')}}">Create
                        New</a>
                </li>
            </ul>
        </li>
        <hr class=" w-75 text-center m-3" style="height:0.5px; color: cornflowerblue" ;>

        <li class=" list-unstyled components menu "><a href=""
                style=" color: #012970 ;font-family: 'Poppins' ,sans-serif;"><i class="bi bi-heart"></i>
                My Favorites
                <span class="bi bi-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li class=" menu"><a href="favoritePage.html">Advertisements</a></li>
                <li class="menu"><a href="favoritePage.html">Auctions</a>
                </li>
            </ul>
        </li>
        <hr class=" w-75 text-center m-3" style="height:0.5px; color: cornflowerblue" ;>
        <li class="list-unstyled components btn">

            

              <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: #012970 ;font-family:  'Poppins',sans-serif;" class="bi bi-lock mx-3 "><span class="mx-3">Logout</span></a>
                                     <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
            {{-- <a href="" style="color: #012970 ;font-family:  'Poppins',sans-serif;"><i
                    class="bi bi-lock "></i>LogOut</a> --}}
        </li>


    </ul>



</nav>