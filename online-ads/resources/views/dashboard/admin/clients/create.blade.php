

                
<form action="{{ route('admin.create') }}" method="post" enctype="multipart/form-data" >
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

    @csrf
      <div class="form-group">
          <label >firstName</label>
          <input type="text" class="form-control" name="first_name" placeholder="Enter first name" value="{{ old('first_name') }}">
          <span class="text-danger">@error('first_name'){{ $message }} @enderror</span>
      </div>
      <div class="form-group">
        <label >lastName</label>
        <input type="text" class="form-control" name="last_name" placeholder="Enter last name" value="{{ old('last_name') }}">
        <span class="text-danger">@error('last_name'){{ $message }} @enderror</span>
    </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
    </div>
      <div class="form-group">
          <label >Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
      </div>
      <div class="form-group">
        <label >Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
        <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
    </div>
     <div class="form-group">
        <label >phone</label>
        <input type="phone" class="form-control" name="phone" placeholder="Enter phone" value="{{ old('phone') }}">
        <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
    </div>

     <div class="form-group">
        <label >city</label>
        <input type="text" class="form-control" name="city" placeholder="Enter city" value="{{ old('city') }}">
        <span class="text-danger">@error('city'){{ $message }} @enderror</span>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="img" >
      </div> 



      <div class="form-group">
          <button type="submit" class="btn btn-primary">Register</button>
      </div>



  </form>
            
    