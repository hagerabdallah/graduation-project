<form method="POST" action="{{route('admin.categories.update',$categories->id)}}" enctype="multipart/form-data"  >
    @csrf
    @if (Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
@if (Session::get('fail'))
<div class="alert alert-danger">
   {{ Session::get('fail') }}
</div>
@endif

    <div class="form-group">
      
    <input type="text" class="form-control" name="name"  placeholder="name" value="{{old('name')??$categories->name}}">
    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
    </div>
    <div class="form-group">
      
        <input type="text" class="form-control" name="desc"  placeholder="desc" value="{{old('desc')??$categories->desc}}">
        <span class="text-danger">@error('desc'){{ $message }} @enderror</span>
        </div>
   
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
