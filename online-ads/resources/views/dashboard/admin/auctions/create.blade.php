
  

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
            
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form  method="POST" action="{{route('admin.auction.store')}}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
              @csrf
              <div class="row">
              <div  class=" col-md-6">
                <label  >Name</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="name">
                </div>
              </div>
              <div  class=" col-md-6">
                <label  >description</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="desc">
                </div>
              </div>
            

             
                
                   <div  class=" col-md-6">
                
                <br>
                <label  >user
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
                    <label  >minimum price</span>
                    </label>
                    <div >
                      <input type="text" required="required" class="form-control " name="min_price">
                    </div>
                  </div>
                 
                  
                  <div class=" col-md-6 ">
                    <br>
                    
                    
                    <div class="input-group  ">

                      <input class="form-control" type="file"  name=img>

                      <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                  </div>
                </div>
                <div class=" col-md-6 ">
                  <br>
                  <div class="input-group  ">

                    <input class="form-control " type="file" id="formFile"   name="imgs[]"
                     
                    accept="image/*"
                    multiple>

                    <label class="input-group-text" for="inputGroupFile02">Upload all Images</label>
                </div>
              </div>
              
              <div  class=" col-md-6">
                
                
                <label  >Condition</span>
                </label>
                <select class="form-control" name="condition">
                  <option>select condition</option>
                  <option>used</option>
                  <option>new</option>
                  
                </select>

                
              </div>
                  <div class="col-md-6">
                    <div class="col-md-6">
                    <br>
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
                    <br>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name='is_active'>
                      <label class="form-check-label  fs-2" for="flexCheckDefault">
                        active
                      </label>
                    </div>
                  </div>
                </div>
                <div  class=" col-md-6">
                  <br>
                  <label  >Start date
                  </label>
                  
                    <input type="datetime-local" class="form-control "  aria-describedby="inputSuccess2Status" name='start_date' >
                    {{-- <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> --}}
                    {{-- <span id="inputSuccess2Status" class="sr-only">(success)</span> --}}
                  
                  
                   
                
                 
            
                  </div>
                  <div  class=" col-md-6 ">
                    <br>
                    <label  >End date
                    </label>
                   
                      <input type="datetime-local"  class="form-control"   aria-describedby="inputSuccess2Status" name='end_date'>
                     
                    
                     
                  
                   
                      
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

   
<<<<<<< HEAD
        <textarea class="form-control"  rows="3" placeholder="min_price" name="min_price">{{old('min_price')}}</textarea>
      </div>
      <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="condition" name="condition">{{old('condition')}}</textarea>
      </div>
      <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="start_date" name="start_date">{{old('start_date')}}</textarea>
      </div>
      <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="end_date" name="end_date">{{old('end_date')}}</textarea>
      </div>
      <div class="form-group">
    <select class="form-select" aria-label="Default select example" name="user_id">
      <option selected>Select user</option>
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{$user->email}}</option> 
      @endforeach
      </select>
    </div>
      
    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="img" >
      </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
=======

    


    
  </div>
</div>

@endsection
>>>>>>> 3edcbca5aeed28a33617710a607e7125402ac835
