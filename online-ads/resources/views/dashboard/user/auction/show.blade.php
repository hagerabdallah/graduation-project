
<h1>{{$auction->desc}}</h1>
<h1>{{$auction->id}}</h1>
<form action="{{route('user.auction.join')}}" method="POST">
  @csrf
    <input type="hidden" name="auction_id" value="{{$auction->id}}">
  <div class="form-group">
    
    <input type="text" class="form-control" name="price"  placeholder="price" >
    <span class="text-danger">@error('name'){{ $price }} @enderror</span>
    </div>
  
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<h1>{{$last_price}}<h1>










  {{-- @foreach ($images as $image)
        
  <img src="{{asset("Uploads/Auctions/$image->image")}}" alt="">

  
   <h1>{{$image->image}}<h1>
@endforeach

<img src="{{asset("Uploads/Auctions/$advertisment->img")}}" alt=""> --}}

