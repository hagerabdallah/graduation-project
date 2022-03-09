@foreach ($categories as $category)
<h1>{{$category->name}}</h1>
<h1>{{$category->desc}}</h1>  
 <a class="btn btn-primary" href="{{route('admin.categories.delete', $category->id )}}">delete</a> 
 <a class="btn btn-primary" href="{{route('admin.categories.edit', $category->id )}}">update</a> 
@endforeach
