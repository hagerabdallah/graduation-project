{{-- <form method="POST" action="{{route('admin.ads.update',$advertisment->id)}}" enctype="multipart/form-data"  >
    @csrf
    <div class="form-group">
      
    <input type="text" class="form-control" name="title"  placeholder="title" value="{{old('title')??$advertisment->title}}">
    </div>
    
   
    <div class="form-group">
   
      <textarea class="form-control"  rows="3" placeholder="description" name="desc"> {{old('desc')?? $advertisment->desc}}</textarea>
    </div>
    <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="price" name="price">{{old('price')?? $advertisment->price}}</textarea>
      </div>
      <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="condition" name="condition">{{old('condition')?? $advertisment->condition}}</textarea>
      </div>
      <div class="form-group">
      <select class="form-select" aria-label="Default select example" name="category_id" }}>
        <option selected>Select Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option> 
        @endforeach
    </select>

      </div>
        
      <div class="form-group">
        <select class="form-select" aria-label="Default select example" name="user_id">
          <option selected>Select User</option>
          @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->email}}</option> 
          @endforeach
      </select>
        </div>
        
      
  
    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="img" >
      </div>
  
    <button type="submit" class="btn btn-primary">Submit</button> --}}
  </form>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="row">
          <div class="container">
          <div class="col-md-12 mb-5 ">
            <div class="modal-body ">
              
          <form form method="POST" action="{{route('admin.ads.store')}}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
            @csrf
            <div class="row">
            <div  class=" col-md-6">
              <label  >title</span>
              </label>
              <div >
                <input type="text" required="required" class="form-control " name="title" value="{{old('title')??$advertisment->title}}">
              </div>
            </div>
            <div  class=" col-md-6">
              <label  >description</span>
              </label>
              <div >
                <input type="text" required="required" class="form-control " name="desc" value=" {{old('desc')?? $advertisment->desc}}">
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
                <label  >Category
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
                    <input type="text" required="required" class="form-control " name="price" value="{{old('price')?? $advertisment->price}}">
                  </div>
                </div>
                <div  class=" col-md-6">
                  <br>
                  <label  >condition</span>
                  </label>
                  <select class="form-control" name="condition" >
                    <option>select condition</option>
                    <option>{{old('condition')?? $advertisment->condition}}</option>
                   
                  </select>

                  
                </div>
                
                <div class=" col-md-6 ">
                  <br>
                  <div class="input-group  ">

                    <input class="form-control" type="file" id="formFile" name=img>

                    <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                </div>
              </div>
              <div class=" col-md-6 ">
                <br>
                <div class="input-group  ">

                  <input class="form-control " type="file" id="formFile"   name="images[]"
                   
                  accept="image/*"
                  multiple>

                  <label class="input-group-text" for="inputGroupFile02">Upload all Images</label>
              </div>
            </div>
                <div class="col-md-6">
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name='is_accepted' value="{{old('is_accepted')?? $advertisment->is_accepted}}">
                    <label class="form-check-label" for="flexCheckDefault">
                      accepted
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name='is_active' value="{{old('is_active')?? $advertisment->is_active}}>
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
  </div>
  