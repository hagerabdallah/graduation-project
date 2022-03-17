@foreach ($advertisment as $ad)
<h1>{{$ad->title}}</h1>
<h1>{{$ad->desc}}</h1>
<h1>{{$ad->price}}</h1>
<h1>{{$ad->condition}}<h1>
<h1>{{$ad->category->name ?? 'none' }}<h1>
 <h1>{{$ad->User->first_name ?? 'none' }}<h1>

<a class="btn btn-primary" href="{{route('admin.advertisment.delete', $ad->id )}}">delete</a>   
@endforeach