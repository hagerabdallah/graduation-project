
{{-- @foreach ($auction as $auc)
<h1>{{$auc->name}}</h1>
<h1>{{$auc->desc}}</h1>
<h1>{{$auc->min_price}}</h1>
<h1>{{$auc->start_date}}</h1>
<h1>{{$auc->end_date}}</h1>
<h1>{{$auc->condition}}<h1>
   
<a class="btn btn-primary" href="{{route('user.auction.delete', $auc->id )}}">delete</a> 
<a class="btn btn-primary" href="{{route('user.auction.bidders_info', $auc->id )}}">more info</a>

@endforeach --}}


@extends('dashboard.user.layout')
@section('content')
<div class="main-content bg-white " style="padding:20px ">
  <!--tabs--------------->
  <div class="container ">


      <div class="tab-content">
          <div class="tab-pane active m-1 " id="All">


              <div class="row border g-0 rounded shadow-sm">
                  <!-- column -->
                  <div class="col-12  text-center  ">

                      <table class="table   "
                          style="background-color: rgb(200 200 200 / 20%); border-radius: 15px;">
                          <thead class="thu">
                              <tr class="">
                                <th scope="col">id</th>

                                  <th scope="col">Name</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Minimum Price	</th>
                                  <th scope="col">Condition</th>
                                  <th scope="col">Start Date</th>
                                  <th scope="col">End Date</th>
                                  <th scope="col">Is-active</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Actions</th>

                              </tr>

                          </thead>
                          <tbody>
                               {{-- @foreach ($auction as $auc) 
                                <tr style="font-family: Montserrat, sans-serif; color: #455a64; font-weight: 400 ;"
                                class="">
    
                                <td class="p-4">{{$auc->name}}</td>
                                <td class="p-4">{{$auc->desc}}</td>
                                <td class="p-4"> 
                                    <button type="button"  class="edit_btn btn btn-info  fa fa-pencil" value="{{$auc->id}}" > Edit</button>
                                    <button type="button"  class="delete_btn btn btn-danger  fa fa-trash-o" value="{{$auc->id}}" > Delete</button>
      
                                    
                                  </td>
                                  
                        </tr>
                        @endforeach  --}}

                               
                                
                           
                            
                            {{-- <td class="p-4"> {{$adv->category->name ?? 'none'}}</td>

                            <td class="p-4">{{$adv->price}}</td>
                            <td class="p-4">{{$adv->condition}}</td>
                         
                              <td class="p-4">{{$adv->is_active}}</td>
                            <td class="p-4">Pending</td>
                            <td> <img  
                              src="{{asset("uploads/Advertisments/$adv->img")}} "   
                                    class="  img-fluid img-circle  user-image p-2">
                            </td> --}}
                            


                            {{-- innerhtml --}}
                          </tbody>
                      </table>


                  </div>
              </div>
          </div>

      </div>



  </div>
</div>
     {{-- endtable --}}

     {{-- start modal --}}

     <div class="modal fade" id="EditauctionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
          <div class="modal-content">
            
            <div class="row">
              <div class="container">
              <div class="col-md-12 mb-5 ">
               
                <div class="modal-body ">
                  @include('dashboard.admin.inc.errors') 
              <form id="UpdateModal" method="POST"    data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="row">
                <div  class=" col-md-6">
                  
                  <input type="hidden" name="id" id="auc_id"> 
                  <ul class="alert alert-warning d-none" id="updateerrors"> </ul>
                  <label  >name</span>
                  </label>
                  <div >
                    <input type="text" required="required" class="form-control " name="name" id="name" >
                  </div>
                </div>
                <div  class=" col-md-6">
                  <label  >description</span>
                  </label>
                  <div >
                    <input type="text" required="required" class="form-control " name="desc" id="desc"  >
                  </div>
                </div>
              
                    <div  class=" col-md-6">
                      <br>
                      <label  >price</span>
                      </label>
                      <div >
                        <input type="text" required="required" class="form-control " name="min_price"  id="min_price">
                      </div>
                    </div>
                    <div  class=" col-md-6">
                      <br>
                      <label  >condition</span>
                      </label>
                      <div >
                        <input type="text" required="required" class="form-control " name="condition"  id="condition">
                      </div>
                    </div>
                    <div  class=" col-md-6">
                        <br>
                        <label  >StartDate</span>
                        </label>
                        <div >
                          <input type="text" required="required" class="form-control " name="start_date"  id="start_date">
                        </div>
                      </div>
                      <div  class=" col-md-6">
                        <br>
                        <label  >EndDate</span>
                        </label>
                        <div >
                          <input type="text" required="required" class="form-control " name="end_date"  id="end_date">
                        </div>
                      </div>
                      
                        
                     <div class=" col-md-6 ">
                      <br>
                      <div class="input-group  ">
                        {{-- cover-img --}}
                        <input class="form-control" type="file" id="formFile" name="img" id="img">
      
                        <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                    </div>
                  </div> 

                  <div class="form-group mt-1 is_active " id="is_active">
                    
                   
                    </div>
                   
                    <div  id="allphotos" class=" photos  container-fluid  xx" >
                   
                      {{-- هنا بنحط جواها الصور  --}}
          
                    </div>
                
                  
                  <div class=" col-md-6 ">
                    <br>
                    <div class="input-group  ">
                              {{-- sub-img --}}

                      <input class="form-control " type="file" id="formFile"   name="imgs[]"
                       
                      accept="image/*"
                      multiple>
      
                      <label class="input-group-text" for="inputGroupFile02">Upload all Images</label>
                  </div>
                </div>
                   
                  
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <br>
                    <div class="col-md-6 ">
                      <button  type="submit" class="btn btn-primary  ">submit</button>
                      
                    </div>
                  </div>
       
                </div>
           
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
        </div>
      </div>



























{{-- endmodal --}}
@endsection

@section('scripts')
<script>

$(document).ready(function(){
    //fetch-auction
    fetchauction();

function fetchauction() {
    $.ajax({
        type: "GET",
        url: "fetch-auction",
        dataType: "json",
        success: function (response) {
             console.log(response.auction);
            $('tbody').html("");
            $.each(response.auction, function (key, item) {
                //is_accepted apperance////////////
                var startus;
                 if(item.is_accepted== 1) {    
                    startus= "accepted"
                     
                        }
                        else{
                            startus= "pending"

                        }
                     // end is_accepted apperance////////////

                     //is_active apperance////////////
                var activation;
                 if(item.is_active== 1) {    
                    activation= "active"
                     
                        }
                        else{
                            activation= "in-active"

                        }
                     // end is_active apperance////////////


                     $('tbody').append(`<tr>\
                  <td>` + item.id + `</td>\
                  <td> `+ item.name +`</td>\
                    <td>` + item.desc + `</td>\
                    <td>` + item.min_price + `</td>\
                    <td>` + item.condition + `</td>\
                    <td>` + item.start_date + `</td>\
                    <td>` + item.end_date + `</td>\
                    <td>` + activation + `</td>\
                    <td>` + startus + `</td>\
                    <td> <img src="{{asset("Uploads/auctions/`+item.img+`")}}" alt=""  height="40px" ></td>\

                    
                    /<td>
                      
                      <button type="button" value="` + item.id + `" class="edit_btn btn btn-info  btn-xs fa fa-pencil"> Edit</button>\
                    <button type="button" value="` + item.id + `" class="btn btn-danger delete_btn fa fa-trash-o "> Delete</button></td>\
                \</tr>`);
            });
        }
    });
}
    //endfetch-ads

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
});
                        ///////////////////// edit auction //////////////////////
$(document).on('click','.edit_btn',function(e)
{
e.preventDefault();
var auc_id=$(this).val();

$('#EditauctionModal').modal('show');

$.ajax(
  {
   type:"GET",
   
  url:"edit/"+auc_id,
  success: function (response)
  {
    if(response.status==404)
    {
      alert(response.message);
      $('#EditauctionModal').modal('hide');
    }
    else
    {
      $('#auc_id').val(response.auction.id);
      $('#name').val(response.auction.name);
      $('#desc').val(response.auction.desc);
      $('#start_date').val(response.auction.start_date);
      $('#end_date').val(response.auction.end_date);
      $('#min_price').val(response.auction.min_price);
      $('#condition').val(response.auction.condition);
    //   $('#is_active').val(response.auction.is_active);
    //   var amountCollected = $(#is_active).val();
     console.log(response.auction.is_active);
    //  if (reaponse.auction.is_active==1)
    $('#is_active').html("");
       $('#is_active').removeClass('is_active');
    if (response.auction.is_active ==1){
        $('#is_active').append(
      `    
      <input type="checkbox" name="is_active"   
                  checked       class="switchery  m " data-color="success" />
      `
          );
    }else{
      

        $('#is_active').append(
      `    
      <input type="checkbox"name="is_active"   class="switchery  m " data-color="success" />
      `
          );
    }
    

     
        $('#allphotos').html("");
       $('#allphotos').removeClass('photos');  
        // بيرجع ال response من غيى مايشيل القديم
      console.log(response.images)
  $.each(response.images, function (key, images) { 
                      console.log(images)
							$('#allphotos').append(`
     
      <img  src="{{asset("Uploads/auctions/`+images.image+`")}}" alt=""  height="100px" >
         <a href="" download="new-filename"><i class="fas fa-download "></i></a>
    
      `
               
      );}
      );
fetchauction();
 
    }}})})

            ///////////////////   end edit auction////////////////////////////

             ////////////////////// update auctio//////////////
 $(document).on('submit','#UpdateModal',function(e)
{
e.preventDefault();

var id=$('#auc_id').val();


var xhr = new XMLHttpRequest(),
    method = "POST",
    url="update/"+id;

xhr.open(method, url, true);
xhr.onreadystatechange = function () {
  if(xhr.readyState === XMLHttpRequest.DONE) {
    var status = xhr.status;
    if (status === 0 || (status >= 200 && status < 400)) {
      // The request has been completed successfully
      console.log(xhr.responseText);
    } 
}};
       
 let edit =new FormData($('#UpdateModal')[0]);         

$.ajax(
  {
  
  
   type:"POST",
   
  url:"update/"+id,
  enctype:"multipart/form-data",
  data:edit,
 
  
  dataType: "json",
  
  
  contentType:false,
  processData:false,

  success: function (data){
  
  

  if (data.status==400)
  {
   
    $('#updateerrors').html("");
    $('#updateerrors').removeClass('d-none');
    $.each(data.errors,function(key,err_value)
    {
      $('#updateerrors').append(`<li>`+err_value+`</li>`);
    });
  }
  else if (data.status==404)
  {
    alert(data.message);

  }
  else if(data.status==200)
  {
 $('#EditauctionModal').modal('hide');
 fetchauction();

 alert(data.message);
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})})







             //////////////////////  end update auctio//////////////



})

    </script>
    
@endsection
 