
@foreach ($auction as $auc)
<h1>{{$auc->name}}</h1>
<h1>{{$auc->desc}}</h1>
<h1>{{$auc->min_price}}</h1>
<h1>{{$auc->start_date}}</h1>
<h1>{{$auc->end_date}}</h1>
<h1>{{$auc->condition}}<h1>
<img scr="{{asset('Uploads/auctions/'.$auc->img)}}"   alt="" width="500" height="600" >
<img src="/Uploads/auctions/{{$auc->img}}" class="card-img-top" width="500" height="600">
<a class="btn btn-primary" href="{{route('user.auction.delete', $auc->id )}}">delete</a> 
<a class="btn btn-primary" href="{{route('user.auction.bidders_info', $auc->id )}}">more info</a>

@endforeach
 