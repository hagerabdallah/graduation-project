
 
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset("Uploads/Admins/1.png")}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          {{-- <h2>{{ Auth::guard('admin')->user()->name }}</h2> --}}
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Dashboard </a>
             
            </li>
            <li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('admin/categories/index')}}">All Categories</a></li>
                <li><a href="{{url('admin/categories/create')}}">Add New category</a></li>
                
              </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Advertisments <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('admin/advertisment/index')}}">ALL Advertisments</a></li>
                <li><a href="{{url('admin/advertisment/create')}}">Add New Advertisment</a></li>
               
              </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Auctions <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('admin/auction/index')}}">All Auctions</a></li>
                <li><a href="{{url('admin/auction/create')}}">Add New Auction</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-user"></i>Users <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('admin/users/index')}}">All Users</a></li>
                <li><a href="{{url('admin/users/create')}}">Add New User</a></li>
               
              </ul>
            </li>
            <li > <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="fa fa-power-off"></i>Logout</a>
              <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form></i>  </a>
             
            </li>
           
          </ul>
          <div class="sidebar-footer hidden-small">
      
        </div>
        </div>

        

      </div>
      <!-- /sidebar menu -->

    
      <!-- /menu footer buttons -->
    </div>
  </div>