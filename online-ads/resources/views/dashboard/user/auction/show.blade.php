@extends('dashboard.user.layout')
@section('content')

    <h1>this timer</h1>
    {{-- <h1 id="h" value="">{{$auction->end_date}}</h1> --}}

    <div class="mb-3" >
      <label class="form-label">end</label>
      <input class="form-control" id="h" type="text" placeholder="" aria-label="" 
        value="{{\Carbon\Carbon::parse($auction->end_date)->format('M d, Y H:i:s')}}"
       >
       
    </div>

    <p id="demo"></p>


    <form action="{{route('user.auction.join')}}"  method="POST">
      @csrf
        <input type="hidden" name="auction_id" value="{{$auction->id}}">
        <input type="hidden" id="now" name="now" value="{{\Carbon\Carbon::now()}}">

      <div class="form-group">
        
        <input type="text" class="form-control" name="price"  placeholder="price" >
        <span class="text-danger">@error('name'){{ $price }} @enderror</span>
        </div>

        @if(App\Models\Price::where('user_id', '=', Auth::guard('web')->user()->id)->exists())

          <input type="hidden" name="disenroll_value" id="disenroll_value" value="{{$f_prcentag}}">
          <button  class="btn btn-primary " id="myBtn" > <a href="{{route('user.auction.disenroll', $auction->id )}}">go out</a></button>

        @endif

       
        <button type="submit" class="btn btn-primary stop_btn" id="edi_btn"  >Submit</button>
      </form>
    <h1>{{$last_price}}<h1>
     {{-- </h1> {{$price->user_id}}</h1> --}}
      {{-- @if($price===null) --}}
      {{-- @endif --}}
      {{-- <button type="submit"  class="btn btn-primary"  >dd</button> --}}



    {{-- <h1>{{$getDate = date("F d, Y", $auction); }}</h1> --}}
    <div id="element"></div>

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
    //  console.log(counts);


     // Take what is the date of last 30 days of today's date.
  //  $disable_date = date('Y-m-d',strtotime('+$c',strtotime($auction->current_date)));

// Now check is buyed date is greater then last 30 days then disable otherwise enable.
// if(strtotime($auction->now)= strtotime($tDays)){
//      echo 'DISABLE';
//  } else {
//      echo 'ENABLE';
//  }
  
      //  var m= count.format('Y/m/d h:i:s') ;
      //  console.log(m);  
        // var L=count.getMonth()
        // console.log(count); 
     var count= document.getElementById("h").value;   
    //  console.log(count);
    var m =String(count);
    // console.log(m);
    
  //  date.getTime();

      // console.log(d);
    // var s =String(count_start);
// console.log('Converted date: '+count.format('MMMM D, YYYY h:m:s')); 
                   
//         const currentMonth = 09-24-2022 13:23:35;
// const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
// console.log(months[currentMonth.getMonth()]);


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
@endsection

  {{-- <td> 
    @foreach ($images as $img )
   <ul class="list-inline ">
   
   
     <li>
       <img class="avatar" src="{{asset("Uploads/Advertisments/$img->image")}}"  height="20px" alt="">
     </li>
   
    
   
   </ul>
   @endforeach
 </td>
 --}}






  {{-- @foreach ($images as $image)
        
  <img src="{{asset("Uploads/Auctions/$image->image")}}" alt="">

  
   <h1>{{$image->image}}<h1>
@endforeach

<img src="{{asset("Uploads/Auctions/$advertisment->img")}}" alt=""> --}}

