
@foreach ($auction as $auc)
<h1>{{$auc->name}}</h1>
<h1>{{$auc->desc}}</h1>
<h1>{{$auc->min_price}}</h1>
<h1>{{$auc->start_date}}</h1>
<h1>{{$auc->end_date}}</h1>
<h1>{{$auc->condition}}<h1>
<a class="btn btn-primary" href="{{route('admin.auction.cancle', $auc->id )}}">cancle</a> 
<form action="{{route('admin.auction.accept', $auc->id)}}" method="POST">
    @csrf
     
     
      <button  class="btn btn-primary">accept</button>
    </form>



@endforeach
 