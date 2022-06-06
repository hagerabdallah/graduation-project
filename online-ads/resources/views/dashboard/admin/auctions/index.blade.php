


@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input id="keyword" type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>

      

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All Auctions </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
             
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Auction Name</th>
                    <th>Description</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>minimum_price</th>
                    <th>cover photo</th>
                    <th>condition</th>
                    <th>Actions</th>
                    
                  </tr>
                </thead>


                <tbody id="allauctions">
                    @foreach ($auction as $auc)
                  <tr>
                    <td>{{$auc->id}}</td> 
                   
                    <td>{{$auc->user->first_name .$auc->user->last_name  }}</td>
                    <td>{{$auc->name}}</td>
                    <td>{{$auc->desc}}</td>
                    <td>{{$auc->start_date }}</td>
                    <td>{{$auc->end_date }}</td>
                    <td>{{$auc->min_price}}</td>
                    <td> <img src="{{asset("Uploads/Auctions/$auc->img")}}" alt=""  height="40px" ></td>
                    <td>{{$auc->condition}}</td>

                    <td>
                      
                      <button type="button"  class="edit_btn btn btn-primary py-3 px-4" value="{{$auc->id}}" ></button>
                      <a  class="btn btn-info  btn-xs fa fa-pencil" href="{{route('admin.auction.edit', $auc->id )}}"> Edit</a>
                      <a  class="btn btn-danger fa fa-trash-o" href="{{route('admin.auction.delete', $auc->id )}}"> Delete</a>
                      <a  class="btn btn-primary btn-xs fa fa-folder" href="{{route('admin.auction.bidders_info', $auc->id )}}">Info</a>
                    
                    </td>
                  </tr>
                  @endforeach
              
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
          </div>
        </div>

       

        

        


       
      </div>
    </div>
  </div>
{{-- pop up edit --}}
<div class="modal fade" id="EditEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <input type="hidden" name="id" id="auction_id"    > 
              <ul class="alert alert-warning d-none" id="updateerrors"> </ul>
            <label  >Name</span>
            </label>
            <div >
              <input type="text" required="required" class="form-control " name="name" id="name">
            </div>
          </div>
          <div  class=" col-md-6">
            <label  >description</span>
            </label>
            <div >
              <input type="text" required="required" class="form-control " name="desc" id="desc">
            </div>
          </div>
        

         
            
               <div  class=" col-md-6">
            
            <br>
            <label  >user
            </label>
         
            <select class="form-control" name="user_id"    >
                  
                  
              <option selected class="t_dn"  id="userid"> </option>

                @foreach ($users as $us)
                
                  <option  value="{{$us->id}}">{{$us->email}}</option> 
                  @endforeach
              
            </select>
        
           
              
            </div>
              <div  class=" col-md-6">
                <br>
                <label  >minimum price</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="min_price" id="min_price">
                </div>
              </div>
              <div  class=" col-md-6">
                <br>
                <label  >Start date
                </label>
                
                  <input type="date" class="form-control "  aria-describedby="inputSuccess2Status" name='start_date' id="start_date" >
                  {{-- <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> --}}
                  {{-- <span id="inputSuccess2Status" class="sr-only">(success)</span> --}}
                
                
                 
              
               
          
                </div>
                <div  class=" col-md-6 ">
                  <br>
                  <label  >End date
                  </label>
                 
                    <input type="date" class="form-control"   aria-describedby="inputSuccess2Status" name='end_date' id="end_date">
                   
                  
                   
                
                 
                    
                  </div>

              <div  class=" col-md-6">
            <br>
            
                <label  >Condition</span>
                </label>
                <br>
                <select class="form-control" name="condition" >
                  <option selected id="condition"></option>
                  <option>used</option>
                  <option>new</option>
                  
                </select>
    
                
              </div>
             
              
              <div class=" col-md-6 ">
                <br>
                
                
                <div class="input-group  ">

                  <input class="form-control" type="file"  name=img id="img">

                  <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
              </div>
            </div>
            <div class=" col-md-6 ">
              <br>
            <div id="allphotos" class="photos">
              
            
            </div>
          </div>
            <div class=" col-md-6 ">
              <br>
              <div class="input-group  ">

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
                <button type="submit" class="btn btn-primary">submit</button>
                
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

{{-- end pop up edit --}}




 @endsection
 @section('scripts')
 <script>
$(document).ready(function(){
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
});
// get method
$(document).on('click','.edit_btn',function(e)
{
e.preventDefault();
var auction_id=$(this).val();
$('#EditEmployeeModal').modal('show');

$.ajax(
  {
   type:"GET",
   
  url:"edit/"+auction_id,
  success: function (response)
  {
    if(response.status==404)
    {
      alert(response.message);
      $('#EditEmployeeModal').modal('hide');
    }
    else
    {
      $('#auction_id').val(response.auction.id);
      $('#name').val(response.auction.name);
      $('#desc').val(response.auction.desc);
      $('#min_price').val(response.auction.min_price);
      $('#start_date').val(response.auction.start_date);
      $('#end_date').val(response.auction.end_date);
     
      $('#condition') .append(``+response.auction.condition+` `);
     
      
      
      $('#userid').html("");
      $('#userid').removeClass('t_dn');
      $.each(response.users, function (key, users) { 

         $('#userid').val(users.id);
         $('#userid').append(``+users.email+` `);
         console.log(users.email)
         
      });

      $('#allphotos').html("");
      $('#allphotos').removeClass('photos');
      
  $.each(response.images, function (key, images) { 
                      console.log(images)
							$('#allphotos').append(`
                
          <button id="delete"  value="`+images.id+`" ">x</button>
                  <br>
      <img class=" containerfluid" src="{{asset("Uploads/auctions/`+images.image+`")}}" alt=""  height="40px" >`
               
      );
      document.getElementById("delete").onclick = function () {

      location.href="deleteimage/"+images.id
};

						});
      
      
   

    
  
    
  }
 
}
})})
// end get method
//post update
$(document).on('submit','#UpdateModal',function(e)
{
e.preventDefault();

var id=$('#auction_id').val();


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

// var formData = new FormData();
// formData.append("_token", document.querySelector("meta[name=_token]").content);



// var data = {

//                "_token": $('#token').val(),
//                 'title': $('#title').val(),
//                 'desc': $('#desc').val(),
//                 'category_id': $('#category_id').val(),
//                 'user_id': $('#user_id').val(),
//                 'condition': $('#condition').val(),
//                 'price': $('#price').val(),
//                 'img': $('#img').val(),
                    

//               }
//               console.log(data);
           
              
 let edit =new FormData($('#UpdateModal')[0]);         
// var data={
//   'id': $('#ad_id').val(),
// "_token": $('#token').val(),
//  'title': $('#title').val(),
 
//  'desc': $('#desc').val(),
//  'category_id': $('#category_id').val(),
//  'user_id': $('#user_id').val(),
//  'condition': $('#condition').val(),
//  'price': $('#price').val(),
 

// };
// console.log(data);


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
 $('#EditEmployeeModal').modal('hide');

 alert(data.message);
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})})
//end post update
  //  real time 
  $('#keyword').keyup(function()
 {
     let keyword=$(this).val()
     let url ="{{route('admin.auction.search')}}"+"?keyword="+keyword
     console.log(url);
 
     $.ajax(
         {
             type:"GET",
             url:url,
             contentType:false,
             processData:false,
             success: function ( data)
              {
                 $('#allauctions').empty()
                 
                
                
                 for (auction of data){
                     $('#allauctions').append(
 
                     `
                   
                  
                    
                     
                                     
                    <tr>
                    <td>${auction.id}</td> 
                    <td>${auction.user.first_name }</td>
                   
                    <td>${auction.name}</td>
                    <td>${auction.desc}</td>
                    <td>${auction.start_date}</td>
                    <td>${auction.end_date}</td>
                   
                    <td>${auction.min_price}</td>
                    <td> <img src="{{asset("Uploads/auctions/`+auction.img+`")}}" alt=""  height="40px" ></td> 
                    <td>${auction.condition}</td>
                    <td><button id="myButton2"  type="button" value="`+auction.id+`" class="edit_btn btn btn-info  fa fa-pencil">Edit</button>
                    <button id="myButton"  type="button" value="`+auction.id+`" class="edit_btn btn btn-danger fa fa-trash-o">Deletet</button>
                    <button id="myButton3"  type="button" value="`+auction.id+`" class="edit_btn btn btn-primary btn-xs fa fa-folder ">Info</button>
                    </td>
                   
                   
 
                   
                 
                </tr>
                  
                
              
                
                
              
            
         
               
                    
                    
                     
                     
                    
                  
                    
     
 
                     `
             
 
                 )
 
             } 
  //delete
 document.getElementById("myButton").onclick = function () {

location.href="delete/"+ auction.id
};
//edit
document.getElementById("myButton2").onclick = function () {

location.href="edit/"+ auction.id
};
//info
document.getElementById("myButton3").onclick = function () {

location.href="bidders/"+ auction.id
};
            
            
            }
         }
     )
 })})
 </script>
     
 @endsection
 