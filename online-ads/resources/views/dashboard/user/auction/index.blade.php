
@foreach ($auction as $auc)
<h1>{{$auc->name}}</h1>
<h1>{{$auc->desc}}</h1>
<h1>{{$auc->min_price}}</h1>
<h1>{{$auc->start_date}}</h1>
<h1>{{$auc->end_date}}</h1>
<h1>{{$auc->condition}}<h1>
   
<a class="btn btn-primary" href="{{route('user.auction.delete', $auc->id )}}">delete</a> 
<a class="btn btn-primary" href="{{route('user.auction.bidders_info', $auc->id )}}">more info</a>

@endforeach
 