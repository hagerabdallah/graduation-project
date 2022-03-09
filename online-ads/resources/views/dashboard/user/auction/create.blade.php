<form method="POST" action="{{route('user.auction.store')}}" enctype="multipart/form-data"  >
    @csrf
    <div class="form-group">
      
    <input type="text" class="form-control" name="name"  placeholder="name" value="{{old('name')}}">
    </div>
    
   
    <div class="form-group">
   
      <textarea class="form-control"  rows="3" placeholder="description" name="desc">{{old('desc')}}</textarea>
    </div>
    <div class="form-group">
   
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
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="img" >
      </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>