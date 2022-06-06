<form method="POST" action="{{route('user.advertisment.update',$advertisment->id)}}" enctype="multipart/form-data"  >
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
      <select class="form-select" aria-label="Default select example" name="category_id" >
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
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="imgs[]"  multiple >
      </div>


      @foreach ($images as $image)
      <div >
      
      <a href="{{route('user.adv.delete.imgs' , $image->id)}}">X</a>
      <br>
       <img src="{{asset("Uploads/Advertisments/$image->image")}}" alt="">
       <h1>{{$image->image}}</h1>
        </div>
       @endforeach
      
      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
 


 
    
    

 

  