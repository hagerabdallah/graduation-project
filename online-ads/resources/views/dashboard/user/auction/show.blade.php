@extends('home.layout')

@section('content')
@include('dashboard.admin.inc.errors')

<input type="hidden" id="now" name="now" value="{{\Carbon\Carbon::now()}}">
<div class="mb-3" >
 <input class="form-control" id="h" type="hidden" placeholder="" aria-label="" 
   value="{{\Carbon\Carbon::parse($auction->end_date)->format('M d, Y H:i:s')}}"
  >
</div>


<div class="container-fluid " style="margin-top: 7%">
  
  <div class="row">
    <div class="col-lg-6 mx-5">
      <div class="demo" style="">
        <p id="demo" style="font-size: 25px"></p>
      </div>
     
  <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="true">
   <div class="carousel-indicators">
     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
   </div>
   <div class="carousel-inner ">
    @foreach($images as $key =>$image)
    <div class="carousel-item {{$key == 0 ? 'active' : '' }} ">
        <img src="{{asset("Uploads/auctions/$image->image")}}" class="d-block w-100"  alt="..."> 
    </div>
    @endforeach

   </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Previous</span>
   </button>
   <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Next</span>
   </button>
   
  </div>

        {{-- <div class="desc pt-40 ">    
     <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" >Description</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">About seller</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"  style="padding: 20px 20px">{{$auction->desc}}</div>
    <div class="tab-pane fade"id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0" style="padding: 20px 20px ">
      <table class="about-seller ">

        <tbody style="color:  #141619; font-size: 17px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
          <tr>
            <th>Name</th>
            <td>
              <p>{{$auction->user->first_name}} {{$auction->user->last_name}}</p>
            </td>
          </tr>
          <tr>
            <th>Phone number</th>
            <td>
              <p>{{$auction->user->phone}}</p>
            </td>
          </tr>
          <tr>
            <th>Address</th>
            <td>
              <p>{{$auction->address}}</p>
            </td>
          </tr>
          <tr>
            <th>Email</th>
            <td>
              <p>{{$auction->user->email}}</p>
            </td>
          </tr>


        </tbody>
      </table>
      </div>
   
  </div>
              </div> --}}

              <div class=" desc ms-3 mt-2" style="height: 300px ;">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                      type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"
                      style="color:  #012970; font-size: 17px; font-family: Verdana, Geneva, Tahoma, sans-serif;">Description</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                      type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"
                      style="color:  #012970; font-size: 17px; font-family: Verdana, Geneva, Tahoma, sans-serif;">About
                      seller</button>
                  </li>
      
      
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0" style="padding: 20px 20px ;font-family:cursive; font-weight: 500; color: #324260; ">
                    {{$auction->desc}}
                   </div>
                  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"
                    style="padding: 20px 20px ">
      
                    <table class="about-seller ">
      
                      <tbody>
                        <tr>
                          <th style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-weight: 500; color: #485e85; ">
                            <i class=" bi bi-person p-1"> Name</i>
                          </th>
                          <td>
                            <p style="font-family:cursive; font-weight: 500; color: #485e85; ">
                              {{$auction->user->first_name}} {{$auction->user->last_name}}</p>
                          </td>
                        </tr>
                        <tr>
                          <th style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-weight: 500; color: #485e85; ">
                            <i class=" bi bi-phone p-1"> Phone number </i>
                          </th>
                          <td>
                            <p style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; color: #485e85; " class="pt-3;ps-2">
                              {{$auction->user->phone}}</p>
                          </td>
                        </tr>
                        <tr>
                          <th style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-weight: 500; color: #485e85; " s>
                            <i class=" bi bi-geo-alt p-1"> Address </i>
                          </th>
                          <td>
                            <p style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; color: #485e85; ">
                              {{$auction->address}}</p>
                          </td>
                        </tr>
                        <tr>
                          <th style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-weight: 500; color: #485e85; ">
                            <i class=" bi bi-chat p-1"> Email</i>
                          </th>
                          <td>
                            <p style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; color: #485e85; ">
                              {{$auction->user->email}}  </p>
                          </td>
                        </tr>
      
      
                      </tbody>
                    </table>
                  </div>
      
                </div>
              </div>
         
     
  </div>
        {{-- <div class="col-lg-1">
  </div> --}}
   
  <div class="col-lg-4 mx-3">
    <div class="  mt-3" style=" font-family: Verdana, Geneva, Tahoma, sans-serif; ">

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
          tabindex="0" style="padding: 20px 20px ; font-weight: 500; color: #324260; ">
          <h3 style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif" class="">About Auction</h3> <hr>
          <h3>{{$auction->name}}</h3>
          <h6>price<span class="mx-2">{{$last_price}}</span></h6>
          <h6>Number of Bids<span class="mx-2">{{$count}}</span></h6>
          <form  class="row g-3" action="{{route('user.auction.join')}}"  method="POST">
            @csrf
            <input type="hidden" name="auction_id" value="{{$auction->id}}">

          <input  name="price"style=" border-color: #8e9fbc; border-radius:7px ; text-align: center;" class="p-1 btn btn-light"
            placeholder="Enter Your Price">
    @auth
        
    
            @if(App\Models\Price::where('auction_id','=',$auction->id)->where('user_id', '=', Auth::guard('web')->user()->id)->exists())
              @if($f_prcentag<=3900000)
              <button disabled class="btn btn-primary " id="myBtn" > <a href="{{route('user.auction.disenroll', $auction->id )}}">go out</a></button>
                 @else
                 <button  class="btn " style="color: #fff;border-radius: 15px; background: #012970;" id="myBtn" > <a href="{{route('user.auction.disenroll', $auction->id )}}" style="color: #fff">go out</a></button>
                @endif   
              @endif
              @endauth
              <button type="submit" class="btn btn-outline-dark  mb-3 btn btn-info" style="border-radius: 15px; background: #012970; color: #fff;">Place Bid</button>
          {{-- <span class="btn btn-info" style="border-radius: 15px; background: #012970; color: #fff;"> place BID
          </span> --}}
          </form>
          {{-- <span class="btn btn-info mt-1" style="border-radius: 10px; background: #5274ae; color: #fff;"> place BID --}}
          </span>

          <h5 style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 12px;">By placing a bid, you're
            committing to buy
            this item if you win</h5>

          <i class="bi bi-heart" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 13px;">
            Favotite</i>
        </div>

      </div>

      </div>
      <div class=" desc col-lg-12">
        <div class="card " style="border-radius: 40px;">
          <div class="desc-header fluid">
    
            <div class="card-header " style="background: #2c5396; color: #fff; border-radius: 10px;">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item" style="margin-left: 20">
                  <strong style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px;"> Be
                    Careful !</strong>
                </li>
    
    
    
              </ul>
            </div>
          </div>
          <div class="card-body"
            style="text-align: left ;font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px; background: #f5f5f5;">
            <p class="card-title">Special title treatment</p>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    
          </div>
    
        </div>
      </div>

    </div>





  </div>
  </div>

  
@endsection



@section('scripts')
<script>
$(document).ready(function(){

// var timeout = $('#disenroll_value').val();
// const btn= document.getElementById("myBtn");
// // var timeout= document.getElementById("disenroll_value").value;
// console.log(timeout);

// function disable() {

//  btn.disabled = true;
// }
// const myTimeout = setTimeout(disable,timeout);

// $(window).load(function(){
//   if(window.localStorage && localStorage.getItem("disabled") === "true") {
//   document.getElementById("myBtn").disabled = true;
// }})

var counts= document.getElementById("now").value;   
  
     var count= document.getElementById("h").value;   
    var m =String(count);
    


// Set the date we're counting down to
var countDownDate = new Date(m).getTime();

// Update the count down every 1 second
var x = setInterval(function() {
    
  // Get today's date and time
  var now = new Date().getTime();
    // console.log(now);
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    // console.log(distance);
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);


})



</script>
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