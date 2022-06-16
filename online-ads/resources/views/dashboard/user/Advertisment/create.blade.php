{{-- 
<form method="POST" action="{{route('user.advertisment.store')}}" enctype="multipart/form-data"   >
  @csrf
  <div class="form-group">
    
  <input type="text" class="form-control" name="title"  placeholder="title" value="{{old('title')}}">
  </div>
  
 
  <div class="form-group">
 
    <textarea class="form-control"  rows="3" placeholder="description" name="desc">{{old('desc')}}</textarea>
  </div>
  <div class="form-group">
 
      <textarea class="form-control"  rows="3" placeholder="price" name="price">{{old('price')}}</textarea>
    </div>
    <div class="form-group">
 
      <textarea class="form-control"  rows="3" placeholder="condition" name="condition">{{old('condition')}}</textarea>
    </div>
    <div class="form-group">
      <select class="form-select" aria-label="Default select example" name="category_id">
        <option selected>Select Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option> 
        @endforeach
        </div>
      
       </select>
    

  <div class="form-group">
      <label for="exampleFormControlFile1">Example file input</label>
      <input type="file" class="form-control-file" name="img" >
    </div>

 

<div class="form-group">
                <label for="files" class="form-label mt-4">Upload Product Images:</label>
                <input 
                    type="file" 
                    name="images[]"
                    class="form-control" 
                    accept="image/*"
                    multiple
                >
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
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> --}}

                @extends('dashboard.user.layout')
                @section('content')
                @include('dashboard.admin.inc.errors')
              <form method="POST" action="{{route('user.advertisment.store')}}" enctype="multipart/form-data"   >
                @csrf
              <div class="row container-fluid ">
                  <div class="col-md-6">
          
                      <div class="container-fluid  ">
          
          
                          <div class="CreateForm ">
          
          
               <div class="mb-3 mt-2 ">
                                  <label for="Product Name:" class="form-label mt-5"
            style="color: #012970 ; font-family: Verdana, Geneva, Tahoma, sans-serif;">Title
                                  </label>
                                  {{-- <input type="text" class="form-control"  placeholder="title" > --}}

                       <input type="text" class="form-control" id="" placeholder="Title"  name="title" value="{{old('title')}}" style="border-radius: 5px; ">
            </div>
            <div class="  ">
              <label for="Product Name:" class="form-label"
style="color: #012970 ; font-family: Verdana, Geneva, Tahoma, sans-serif;">Address
              </label>
              {{-- <input type="text" class="form-control"  placeholder="title" > --}}

   <input type="text" class="form-control" id="" placeholder="Address"  name="address" value="{{old('address')}}" style="border-radius: 5px; ">
</div>

 <!---  <img src="imgs/electronics.jpg" class=" w-25 rounded-2"> -->
 <h5 style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;" class="mt-3"> Select cover Image for Your
  advertisment</h5>
<hr>


<div class=" input-group mb-3 ">

  <input type="file" class="form-control" id="inputGroupFile02" name="img"
      style="border-radius: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
  <label class="input-group-text" for="inputGroupFile02"
      style="border-radius: 5px; font-family:Verdana, Geneva, Tahoma, sans-serif ;">Upload
      Image</label>
</div>
<label for="exampleFormControlTextarea1"
style="color: #012970 ; font-family: Verdana, Geneva, Tahoma, sans-serif;"
    class="form-label">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                      style="border-radius: 5px;" name="desc">{{old('desc')}}</textarea>

              </div>
         
              
                              

                          </div>
          
                      </div>
          
    
          
                  <div class="col-md-6 mt-5">
          
                      <div class="container-fluid  ">
          
          
                          <div class="CreateForm">
                            <div class="mt-2">
                              <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: #012970;">Categories</span>
                              <select class="form-select mt-2" aria-label="Default select example" name="category_id">
                                  <option selected>Select Category</option>
                                  @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                              </select> 

                              <div class=" mt-3">
                                <label for="Product Price" class="form-label  "
                                    style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;" >Price</label>
                                <input type="text" class="form-control "  name="price" value="{{old('price')}} "placeholder=" EGP"
                                 >
                            </div>
                            <h5 style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;" class="mt-3"> Select sub Images for Your
                              advertisment</h5>
                          <hr>
      
      
                          <div class=" input-group mb-3 ">
      
                              <input type="file" class="form-control" id="inputGroupFile02"name="images[]"
                              class="form-control" 
                              accept="image/*"
                              multiple
                                  style="border-radius: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                              <label class="input-group-text" for="inputGroupFile02"
                                  style="border-radius: 5px; font-family:Verdana, Geneva, Tahoma, sans-serif ;">Upload
                                  Image</label>
                          </div>
      
                          <h6 class="mt-4 " style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                            Advertisment Condition</h6>
                
                            {{-- <input class="form-check-input p-2" type="radio" name="flexRadioDefault"> --}}
                            {{-- <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: #012970;">Categories</span> --}}
                            <select class="form-select mt-2 ml-5" aria-label="Default select example" name="condition">
                                <option selected>Select condition</option>
                                <option value="1">New</option>
                                <option value="2">used</option>
            
                            </select>
                               
                              
                            <span class="mt-4 " style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                              activation</span>
                              <div class="form-check ">
                                
                                  <input class="form-check-input p-2" type="checkbox"name='is_active'
                                      >
                                  <label class="form-check-label p-0" for="flexRadioDefault2">
                                    active
                                  </label>
          
                              </div>
                          </div>
                      </div>
          
          
                  </div>
          
              </div>
          
              </div>
          
              <div class="text-center p-3 mb-3">
                  <button class="btn p-2 " type="submit"
                      style="background-color: #012970 ; color: white; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                      Create
                      Advertisement</button>
              </div>             
                
              </form>    

              @endsection