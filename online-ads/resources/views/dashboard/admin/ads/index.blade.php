@foreach ($ads as $ad)
<h1>{{$ad->title}}</h1>
<h1>{{$ad->desc}}</h1>
<h1>{{$ad->price}}</h1>
<h1>{{$ad->condition}}<h1>
<h1>{{$ad->category->name ?? 'none' }}<h1>


    <form action="{{route('admin.ads.accept', $ad->id )}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <button type="submit" class="btn btn-primary">accept</button>

        </div> 
    </form>
        <a class="btn btn-primary" href="{{route('admin.ads.cancle', $ad->id )}}">cancle</a> 

@endforeach
 