{{-- <form method="POST" action="{{route('admin.categories.update',$categories->id)}}" enctype="multipart/form-data"  >
    @csrf
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

    <div class="form-group">
      
    <input type="text" class="form-control" name="name"  placeholder="name" value="{{old('name')??$categories->name}}">
    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
    </div>
    <div class="form-group">
      
        <input type="text" class="form-control" name="desc"  placeholder="desc" value="{{old('desc')??$categories->desc}}">
        <span class="text-danger">@error('desc'){{ $message }} @enderror</span>
        </div>
   
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> --}}

  @extends('dashboard.admin.layout')
  @section('content')
    <div class="right_col" role="main">
      <div class="">
          
          <div class="clearfix"></div>
          <div class="row">
              <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Add New Category</h2>
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
   <form method="POST" action="{{route('admin.categories.update',$categories->id)}}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                              @csrf
                              <div class="item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"> Category Name 
                                  </label>
                                  <div class="col-md-6 col-sm-6 ">
                                      <input name="name" type="text"  required="required" class="form-control "  value="{{old('name')??$categories->name}}">
                                  
                              </div>
                            </div>
                              <div  class="item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description 
                                  </label>
                                  <div class="col-md-6 col-sm-6 ">
              <textarea  required="required"
              name="desc" 
               class="form-control" name="message" data-parsley-trigger="keyup"
                data-parsley-minlength="20" data-parsley-maxlength="100"
                 data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." 
                 data-parsley-validation-threshold="10"> {{old('desc')??$categories->desc}}
              </textarea>
              </div>
                              </div>
                              <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 offset-md-3">
                                      <button class="btn btn-primary" type="submit">submit</button>
                                      
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


