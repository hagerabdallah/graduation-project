{{-- 

                
<form action="{{ route('admin.create') }}" method="post" enctype="multipart/form-data" >
    @if (Session::get('success'))
         <div class="alert alert-success">
             {{ Session::get('success') }}
         </div>
    @endif
    @if (Session::get('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif

    @csrf
      <div class="form-group">
          <label >firstName</label>
          <input type="text" class="form-control" name="first_name" placeholder="Enter first name" value="{{ old('first_name') }}">
          <span class="text-danger">@error('first_name'){{ $message }} @enderror</span>
      </div>
      <div class="form-group">
        <label >lastName</label>
        <input type="text" class="form-control" name="last_name" placeholder="Enter last name" value="{{ old('last_name') }}">
        <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>
    </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
    </div>
      <div class="form-group">
          <label >Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
      </div>
      <div class="form-group">
        <label >Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
        <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
    </div>
     <div class="form-group">
        <label >phone</label>
        <input type="phone" class="form-control" name="phone" placeholder="Enter phone" value="{{ old('phone') }}">
        <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
    </div>

     <div class="form-group">
        <label >city</label>
        <input type="text" class="form-control" name="city" placeholder="Enter city" value="{{ old('city') }}">
        <span class="text-danger">@error('city'){{ $message }} @enderror</span>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="img" >
      </div> 



      <div class="form-group">
          <button type="submit" class="btn btn-primary">Register</button>
      </div>



  </form>
            
     --}}
     

@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
  <div class="">
    
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Design <small>different form elements</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a class="dropdown-item" href="#">Settings 1</a>
                  </li>
                  <li><a class="dropdown-item" href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form  method="POST" action="{{route('admin.user.check')}}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
              @csrf
              <div class="row">
              <div  class=" col-md-6">
                <label  >First Name</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="first_name">
                </div>
              </div>
              <div  class=" col-md-6">
                <label  >Last Name</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="last_name">
                </div>
              </div>
              <div  class=" col-md-6">
                  <br>
                <label  >Password</span>
                </label>
                <div >
                  <input type="password" required="required" class="form-control " name="password">
                </div>
              </div>
              <div  class=" col-md-6">
                  <br>
                <label  >Confirm Password</span>
                </label>
                <div >
                  <input type="password" required="required" class="form-control " name="cpassword">
                </div>
              </div>
            
                  <div  class=" col-md-6">
                    <br>
                    <label  >Email</span>
                    </label>
                    <div >
                      <input type="email" required="required" class="form-control " name="email">
                    </div>
                  </div>
                  
                  <div  class=" col-md-6">
                    <br>
                    <label  >phone</span>
                    </label>
                    <div >
                      <input type="phone" required="required" class="form-control " name="phone">
                    </div>
                  </div>
                 
                  <div  class=" col-md-6">
                    <br>
                    <label  >City</span>
                    </label>
                    <div >
                      <input type="text" required="required" class="form-control " name="city">
                    </div>
                  </div>
               
                  <div class=" col-md-6 ">
                    <br>
                    <br>

                    <div class="input-group  ">

                      <input class="form-control" type="file" id="formFile" name=img>

                      <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                  </div>
                </div>
               
                 
                
                <div class="ln_solid"></div>
                <div class="form-group">
                  <br>
                  <div class="col-md-6 ">
                    <button type="submit" class="btn btn-primary">submit</button>
                    
                  </div>
                </div>
              
           
              
              
              
              </div>
              

            </form>
          </div>
        </div>
      </div>
    </div>

   

    


    
  </div>
</div>

@endsection
