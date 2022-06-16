

<form method="POST" action="{{route('user.auction.update',$auction->id)}}" enctype="multipart/form-data"  >
    @csrf
    <div class="form-group">
      
    <input type="text" class="form-control" name="name"  placeholder="name" value="{{old('name')??$auction->name}}">
    </div>
    
   
    <div class="form-group">
   
      <textarea class="form-control"  rows="3" placeholder="description" name="desc">{{old('desc')??$auction->desc}}</textarea>
    </div>
    <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="min_price" name="min_price">{{old('min_price')??$auction->min_price}}</textarea>
      </div>
      <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="condition" name="condition">{{old('condition')??$auction->condition}}</textarea>
      </div>
      <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="start_date" name="start_date">{{old('start_date')??$auction->start_date}}</textarea>
      </div>
      <div class="form-group">
   
        <textarea class="form-control"  rows="3" placeholder="end_date" name="end_date">{{old('end_date')??$auction->end_date}}</textarea>
      </div>
    
    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="img" >
      </div>

      
     
    
     
      <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="imgs[]"  multiple >
      </div>

      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


  <div>
    {{-- show images --}}
      @foreach ($images as $image)
      <form action="{{route('user.auction.deleteimage',$image->id)}}" method="post">
       <button class="btn text-danger">X</button>
       @csrf
       </form>
    <img src="{{asset("Uploads/Auctions/$image->image")}}" alt="">


  <h1>{{$image->image}}</h1>
  @endforeach
    {{--  end show images --}}
  </div>

  

                    


                   

                     