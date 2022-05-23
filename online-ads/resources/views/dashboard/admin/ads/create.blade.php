

@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
  <div class="">
    
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add new Advertisment</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form form method="POST" action="{{route('admin.ads.store')}}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
              @csrf
              <div class="row">
              <div  class=" col-md-6">
                <label  >title</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="title">
                </div>
              </div>
              <div  class=" col-md-6">
                <label  >description</span>
                </label>
                <input type="text" required="required" class="form-control " name="title">
              </div>
            

              <div  class=" col-md-6">
                
                <br>
                <label  >description
                </label>
               
                  <select class="form-control" name="user_id">
                    
                      <option selected>Select User</option>
                      @foreach ($users as $user)
                      <option value="{{$user->id}}">{{$user->email}}</option> 
                      @endforeach
                    
                  </select>
              
               
                  
                </div>
                <div  class=" col-md-6">
                  <br>
                  <label  >description
                  </label>
                 
                    <select class="form-control" name='category_id'>
                      <option selected>Select Category</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option> 
                      @endforeach
                    </select>
                
                 
                    
                  </div>
                  <div  class=" col-md-6">
                    <br>
                    <label  >price</span>
                    </label>
                    <div >
                      <input type="text" required="required" class="form-control " name="price">
                    </div>
                  </div>
                  <div  class=" col-md-6">
                    <br>
                    <label  >condition</span>
                    </label>
                    <select class="form-control" name="condition">
                      <option>select condition</option>
                      <option>used</option>
                      <option>new</option>
                      
                    </select>

                    
                  </div>
                  
                  <div class=" col-md-6 ">
                    <br>
                    <div class="input-group  ">

                      <input class="form-control p-1"  type="file" id="formFile" name=img>

                      <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                  </div>
                </div>
                <div class=" col-md-6 ">
                  <br>
                  <div class="input-group  ">

                    <input class="form-control p-1 " type="file" id="formFile"   name="images[]"
                     
                    accept="image/*"
                    multiple>

                    <label class="input-group-text" for="inputGroupFile02">Upload all Images</label>
                </div>
              </div>
                  <div class="col-md-6">
                    <br>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name='is_accepted'>
                      <label class="form-check-label" for="flexCheckDefault">
                        accepted
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <br>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name='is_active'>
                      <label class="form-check-label  fs-2" for="flexCheckDefault">
                        active
                      </label>
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
