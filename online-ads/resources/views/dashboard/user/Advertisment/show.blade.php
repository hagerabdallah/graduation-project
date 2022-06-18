{{-- @foreach ($images as $image)
        
            <!-- <img scr="'/Uploads/Advertisments/'.$image->image"  width="270" height="250" alt="Image" > -->
            <img src="{{asset("Uploads/Advertisments/$image->image")}}" alt="">
            
             <h1>{{$image->image}}<h1>
              
         
  @endforeach
  --}}
  @extends('home.layout')

  @section('content')
  @include('dashboard.admin.inc.errors')
  <div class="container-fluid  " style="margin-top:7% ">


    <div class="row">



        <div class="col-lg-6">


            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner ms-3">
                        @foreach($images as $key =>$image)

                        <div class="carousel-item {{$key == 0 ? 'active' : '' }} ">
                            <img src="{{asset("Uploads/advertisments/$image->image")}}" class="d-block w-100"  alt="..."> 
                        </div>
                    
                        @endforeach                    
                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
            <div class=" desc ms-3 mt-3" style="height: 300px ;">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true"
                            style="color:  #012970; font-size: 17px; font-family: Verdana, Geneva, Tahoma, sans-serif;">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false"
                            style="color:  #012970; font-size: 17px; font-family: Verdana, Geneva, Tahoma, sans-serif;">About
                            seller</button>
                    </li>


                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0"
                        style="padding: 20px 20px ;font-family:cursive; font-weight: 500; color: #324260; ">
                       {{$advertisment->desc}}</div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0" style="padding: 20px 20px ">

                        <table class="about-seller ">

                            <tbody class="">
                                <tr>
                                    <th style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-weight: 500;
                                        color: #485e85; ">
                                        <i class=" bi bi-person p-1"> Name</i>
                                    </th>
                                    <td>
                                        <p style="font-family:cursive; font-weight: 500; color: #485e85; ">
                                            {{$advertisment->user->first_name}} {{$advertisment->user->first_name}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-weight: 500; color: #485e85; ">
                                        <i class=" bi bi-phone p-1"> Phone number </i>
                                    </th>
                                    <td>
                                        <p class="pt-3 ps-2"
                                            style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; color: #485e85; ">
                                            {{$advertisment->user->phone}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-weight: 500; color: #485e85; "
                                        s>
                                        <i class=" bi bi-geo-alt p-1"> Address </i>
                                    </th>
                                    <td>
                                        <p
                                            style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; color: #485e85; ">
                                            {{$advertisment->address}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-weight: 500; color: #485e85; ">
                                        <i class=" bi bi-chat p-1"> Email</i>
                                    </th>
                                    <td>
                                        <p
                                            style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; color: #485e85; ">
                                            {{$advertisment->user->email}} </p>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>





        </div>




        <div class="col-lg-4 mx-3">
            <div class=" ms-3  " style=" font-family: Verdana, Geneva, Tahoma, sans-serif; ">

                <h3 style="color: #012970;">About Advertisement</h3>
                <hr>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        <p
                            style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:20px ;">
                              title<span class="mx-2">{{$advertisment->title}} </span> </p>
                        <p
                            style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:20px ">
                            Price <span class="mx-2">{{$advertisment->price}}</span></p>
                        <p
                            style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif ;font-size:20px ;">
                            Condition <span class="mx-2">{{$advertisment->condition}}</span></p>


                        <i class="bi bi-heart mt-2"
                            style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 13px;">
                            Favotite</i>


                    </div>



                </div>





                <div class="  col-lg-12 mt-5">
                    <div class="card " style="border-radius: 40px;">
                        <div class="desc-header fluid">

                            <div class="card-header "
                                style="background: #2c5396; color: #fff; border-radius: 10px;">
                                <ul class="nav nav-pills card-header-pills">
                                    <li class="nav-item" style="margin-left: 20">
                                        <strong
                                            style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px;">
                                            Be
                                            Careful !</strong>
                                    </li>



                                </ul>
                            </div>
                        </div>
                        <div class="card-body"
                            style="text-align: left ;font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px; background: #f5f5f5;">
                            <p class="card-title">Special title treatment</p>
                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.</p>

                        </div>

                    </div>
                </div>
            </div>









        </div>
    </div>
@endsection

@section('scripts')
<script>
    var nav = document.querySelector('.fixed-top');
    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 100) {
            nav.classList.add('bg-light', 'shadow');
  
        } else {
            nav.classList.remove('bg-light', 'shadow');
        }
    });
  </script>
  <script src="{{asset('user/js')}}/bootstrap.js"></script> 
@endsection
