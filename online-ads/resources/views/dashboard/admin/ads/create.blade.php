<form method="POST" action="{{route('admin.ads.store')}}" enctype="multipart/form-data"  >
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
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>