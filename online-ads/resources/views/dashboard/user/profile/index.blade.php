@extends('dashboard.user.layout')
@section('content')

<div class="main-content">

    <div class="row ">


        <div class="col-lg-4 col-md-5">
            <div class="card" style="min-height: 450px">
                <div class="card-header card-header-text">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-content">

                    <section class=" text-center"> <img src="{{asset('/Uploads/users/'.$user->img)}}" class="img-circle rounded-circle"
                                  width="150" />
                        <h4 class="card-title mt-2">{{$user->first_name." ".$user->last_name}}</h4>
                            {{-- <input type="submit" id="file" class="upload"> --}}
                            {{-- <label for="file" class=" text-center upload-label"> --}}
                                <form action="{{route('user.upload',$user->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="mt-3">
                                        <input type="file" id="file" class="upload" name="img">
                                        <label for="file" class=" text-center upload-label">

                                            <i class="bi bi-folder-plus"></i> Choose a photo
                                        </label>
                                    </div>
                                         <input class="mt-2 p-2 btn" type="submit" value="upload" style="background-color: #012970;color:aliceblue" >
                                    
                                </form>
                                

                    </section>

                </div>
            </div>

        </div>






        <div class="col-lg-8 col-md-7">
            <div class="card" style="min-height: 470px">
                <div class="card-header card-header-text ">

                    <h4 class="m-2">edit personal information</h4>
                    <hr>
                    <form method="post" action="{{route('user.profile.update',$user->id)}}" class="form-horizontal form-material mx-2 m-2" 
                        style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                        @csrf
                        <div class="form-group m-2">
                            <label class="col-md-12 mb-1">First Name</label>
                            <div class="col-md-12">
                                <input type="text"name="first_name" value="{{old('first_name')??$user->first_name}}"
                                
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group m-2">
                            <label class="col-md-12 mb-1">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" name="last_name" value="{{old('last_name')??$user->last_name}}"
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group m-2">
                            <label class="col-md-12 mb-1">Phone No</label>
                            <div class="col-md-12">
                                <input type="text"name="phone" value="{{old('phone')??$user->phone}}"
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        

                        <div class="form-group mt-4">
                            <div class=" m-2 ">
                                <button type="submit" class="btn " style="background-color: #012970; color: white">Save
                                    Changes
                                </button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>


        </div>

    </div>

    <div class=" w-100 " style="padding-left:416px ;">
        <div class="col-lg-12 col-xlg-9 col-md-7   ">
            <div class="card">
                <!-- Tab panes -->
                <div class="card-body">
                    <h4 class="m-2">edit password</h4>
                    <hr>
                    <form method="post" action="{{route('user.profile.storepass')}}"class="form-horizontal form-material mx-2 w-75  p-3 m-2"
                        style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                        @csrf
                        <div class="form-group m-2 ">
                            <label class="col-md-12 mb-1">Current password</label>
                            <div class="col-md-12">
                                <input type="password" name="current_password"
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group m-2">
                            <label class="col-md-12 mb-1">New password</label>
                            <div class="col-md-12">
                                <input type="password"name="new_password" 
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group m-2">
                            <label class="col-md-12 mb-1">Confirm password</label>
                            <div class="col-md-12">
                                <input type="password"name="new_confirm_password"
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div class=" m-2 ">
                                <button type="submit"class="btn " style="background-color: #012970; color: white">Change
                                    password</button>
                            </div>
                        </div>

                </div>
            </div>


        </div>

    </div>


</div>
@endsection