<h1>{{$Advertisment->desc}}</h1>
<h1>{{$Advertisment->id}}</h1>
<h1>{{$rating}}</h1>
<form action="{{route('user.advertisment.addtowishlist')}}" method="POST">
    @csrf
      <input type="hidden" name="advertisment_id" value="{{$Advertisment->id}}">
     
      <button  class="btn btn-primary">addtowishlist</button>
    </form>
    
  
  