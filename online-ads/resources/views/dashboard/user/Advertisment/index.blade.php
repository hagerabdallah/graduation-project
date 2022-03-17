@foreach ($advertisment as $ad)
<h1>{{$ad->title}}</h1>
<h1>{{$ad->desc}}</h1>
<h1>{{$ad->price}}</h1>
<h1>{{$ad->condition}}<h1>
<h1>{{$ad->category->name ?? 'none' }}<h1>
<a class="btn btn-primary" href="{{route('user.advertisment.delete', $ad->id )}}">delete</a>   

{{-- <a class="btn btn-primary" href="{{route('user.advertisment.addtowishlist', $ad->id )}}">add to wishlist</a>    --}}
<form action="{{route('user.advertisment.addtowishlist', $ad->id)}}" method="POST">
    @csrf
      {{-- <input type="hidden" name="advertisment_id" value="{{$advertisment->id}}"> --}}
     
      <button  class="btn btn-primary">addtowishlist</button>
    </form>
@endforeach
 