@extends('home.layout')
@section('content')

   
<div class="container-fluid jac">


  <div class="row">



    <div class="col-lg-6">
      <div class="demo">
        <p id="demo"></p>
      </div>

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner ms-3">
          <div class="carousel-item active">
            <img src="imgs/background.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="imgs/background.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="imgs/background.png" class="d-block w-100" alt="...">
          </div>
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
      <div class="desc ms-3">

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
            tabindex="0"
            style="padding: 20px 20px ; font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size:16px ; color: #141619;">
            {{$auction->desc}}</div>
          <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"
            style="padding: 20px 20px ">

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
      </div>

    </div>
    <div class="col-lg-1">
    </div>



    <div class="col-lg-4">
      <div id="auction-title" class="auction-title"
        style="color:  #012970; font-size: 19px; font-family: Verdana, Geneva, Tahoma, sans-serif;">{{$auction->name}}</div>
      <div class="current-price-propductpage">
        <ul>
          <li id="lastprice" class="lastprice" style=" color: #012970; font-size: 17px; font-family: Verdana,
            Geneva, Tahoma, sans-serif;">last Price:</li>
          <li id=" lastprice-num" class="lastprice-num ms-2">{{$last_price}}EGP</li>
        </ul>
      </div>

      <div class="price">

            <form action="{{route('user.auction.join')}}" class="row g-3"  method="POST">
             @csrf
             <input type="hidden" name="auction_id" value="{{$auction->id}}">
             <input type="hidden" id="now" name="now" value="{{\Carbon\Carbon::now()}}">

          <div class="col-lg-8">
            <input type="number" class="form-control" id="number"  name="price" placeholder="Enter your price">
            @if(App\Models\Price::where('auction_id','=',$auction->id)->where('user_id', '=', Auth::guard('web')->user()->id)->exists())
               
              
            @if($f_prcentag<=3900000)
            <button disabled class="btn btn-primary " id="myBtn" > <a href="{{route('user.auction.disenroll', $auction->id )}}">go out</a></button>
               @else
               <button  class="btn btn-primary " id="myBtn" > <a href="{{route('user.auction.disenroll', $auction->id )}}">go out</a></button>
              @endif
          
          @endif
          </div>
          <div class="col-lg-4">
            <button type="submit " class="btn btn-primary mb-3  ">Place Bid</button>
          </div>
        </form>
      </div>
      <div class="fav">
        <a href="/account/login.aspx"><i class="bi bi-heart"
            style="color:  #012970; font-size: 17px; font-family: Verdana, Geneva, Tahoma, sans-serif;"> Add to
            favourite</i></a>

      </div>

      <div class=" Insights col-lg-12">
        <div class="card ">
          <div class="desc-header fluid">

            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item" style="margin-left: 20">
                  <strong style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px;">
                    Insights</strong>
                </li>



              </ul>
            </div>
          </div>
          <div class="card-body ">
            <p class=" card-title ">
            <div class=" row">
              <div class=" col-lg-12 col-md-12 col-sm-12">
                <div class="count-item watching ">

                  <span
                    style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 20px ; color: #012970;">Watching</span><br>
                  <strong style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px;">63</strong>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="count-item total-bids ">

                  <span style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 20px ; color: #012970;">
                    Total bids
                  </span><br>
                  <strong style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px;">{{$count}}</strong>
                </div>
              </div>

            </div>
            </p>

          </div>

        </div>
      </div>







      <div class=" desc col-lg-12">
        <div class="card text-center">
          <div class="desc-header fluid">

            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item" style="margin-left: 20">
                  <strong style="font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px;"> Be
                    Careful</strong>
                </li>

              </ul>
            </div>
          </div>
          <div class="card-body"
            style="text-align: left ;font-family:Verdana, Geneva, Tahoma, sans-serif ; font-size: 18px;">
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

var timeout = $('#disenroll_value').val();
const btn= document.getElementById("myBtn");
// var timeout= document.getElementById("disenroll_value").value;
console.log(timeout);

function disable() {
  // localStorage.setItem("disabled",true);

 btn.disabled = true;
}
const myTimeout = setTimeout(disable,timeout);
// console.log(myTimeout);



$(window).load(function(){
  if(window.localStorage && localStorage.getItem("disabled") === "true") {
  document.getElementById("myBtn").disabled = true;
}})







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
<script src="{{asset('user/js')}}/bootstrap.js"></script>
@endsection

  