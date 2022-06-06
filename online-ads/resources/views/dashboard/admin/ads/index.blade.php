
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

      <div class="row" >
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All Advertisments </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" >
                <div class="row" >
                    <div class="col-sm-12" >
                      <div class="card-box table-responsive" >
             
              <table  class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>category</th>
                    <th>price</th>
                    <th>img</th>
                    <th>condition</th>
                   
                    <th>actions</th>
                    
                    
                  </tr>
                </thead>

                  
                <tbody id="allbooks">
                
                    @foreach ($ads as $ad)                  
                    <tr>
                    <td>{{$ad->id}}</td> 
                   
                    <td>{{$ad->user->first_name ." ".$ad->user->last_name  }}</td>
                    <td>{{$ad->title}}</td>
                    <td>{{$ad->desc}}</td>
                    <td>{{$ad->category->name ?? 'none' }}</td>
                    <td>{{$ad->price}}</td>
                    <td> <img src="{{asset("Uploads/Advertisments/$ad->img")}}" alt=""  height="40px" ></td>
                    <td>{{$ad->condition}}</td>
                    <td>
                         <button type="button"  class="edit_btn btn btn-info  fa fa-pencil" value="{{$ad->id}}" > Edit</button>
                         
                         <a  class="btn btn-danger fa fa-trash-o" href="{{route('admin.ads.delete', $ad->id )}}"> Delete</a></td>
                    
                   
              
                

            
               
                   
               
               
                 
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
              
              <input type="hidden" name="id" id="ad_id"    > 
              <ul class="alert alert-warning d-none" id="updateerrors"> </ul>
              <label  >title</span>
              </label>
              <div >
                <input type="text" required="required" class="form-control " name="title" id="title" >
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
              <label  >user
              </label>
             
                <select class="form-control" name="user_id"    >
                  
                  
                  <option selected class="t_dn"  id="userid"> </option>
                    @foreach ($user as $us)
                    
                      <option  value="{{$us->id}}">{{$us->email}}</option> 
                      @endforeach
                  
                </select>
            
             
                
              </div>
              
              <div  class=" col-md-6">
                <br>
                <label  >Category
                </label>
               
                  <select class="form-control" name='category_id' >
                    
                    @foreach ($categories as $category)
                    <option id="category_id" value="{{$category->id}}" >{{$category->name}}</option> 
                    @endforeach
                    
                  </select>
              
               
                  
                </div>
                <div  class=" col-md-6">
                  <br>
                  <label  >price</span>
                  </label>
                  <div >
                    <input type="text" required="required" class="form-control " name="price"  id="price">
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
                
                 <div class=" col-md-6 ">
                  <br>
                  <div class="input-group  ">

                    <input class="form-control" type="file" id="formFile" name="img" id="img">

                    <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                </div>
              </div> 
              

               
                <div  id="allphotos" class=" photos m-5 container-fluid" >
               
                  
                 
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

  
 @endsection
 @section('scripts')



<script>
  
// get edit
$(document).ready(function(){
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
});

$(document).on('click','.edit_btn',function(e)
{
e.preventDefault();
var ad_id=$(this).val();

$('#EditEmployeeModal').modal('show');

$.ajax(
  {
   type:"GET",
   
  url:"edit/"+ad_id,
  success: function (response)
  {
    if(response.status==404)
    {
      alert(response.message);
      $('#EditEmployeeModal').modal('hide');
    }
    else
    {
      $('#ad_id').val(response.advertisment.id);
      $('#title').val(response.advertisment.title);
      $('#desc').val(response.advertisment.desc);
     
      $('#price').val(response.advertisment.price);
      $('#condition').val(response.advertisment.condition);
      
      // console.log(response.advertisment.price);
      $('#userid').html("");
      $('#userid').removeClass('t_dn');
      
      $.each(response.users, function (key, users) { 

         $('#userid').val(users.id);
         $('#userid').append(``+users.email+` `);
         
      });

      $('#allphotos').html("");
      $('#allphotos').removeClass('photos');
      console.log(response.images)
  $.each(response.images, function (key, images) { 
                      console.log(images)
							$('#allphotos').append(`
                
    
     
      <img  src="{{asset("Uploads/Advertisments/`+images.image+`")}}" alt=""  height="40px" >
      `
               
      );
//       document.getElementById("delete").onclick = function () {

// location.href="deleteimage/"+images.id
// };

						});
      
      
   

    
  
    
  }
 
}
})})
//delete sub images




//end delete sub images
// end get edit
// post

  
$(document).on('submit','#UpdateModal',function(e)
{
e.preventDefault();

var id=$('#ad_id').val();


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
 $('#EditEmployeeModal').modal('hide');

 alert(data.message);
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})})})
// end post
// real timesearch
$('#keyword').keyup(function()
{
    let keyword=$(this).val()
   let url ="{{route('admin.ads.search')}}"+"?keyword="+keyword
    console.log(url);
   
   


    $.ajax(
        {
            type:"GET",
            url:url,
            contentType:false,
            processData:false,
            success: function ( data)
             {
                $('#allbooks').empty()
                
               
               
                for (advertisment of data){
                    $('#allbooks').append(
                     

                    `
       
                   <tr>
                   <td>${advertisment.id}</td> 
                   <td>${advertisment.user.first_name }</td>
                  
                   <td>${advertisment.title}</td>
                   <td>${advertisment.desc}</td>
                   <td>${advertisment.category.name }</td>
                  
                   <td>${advertisment.price}</td>
                   <td> <img src="{{asset("Uploads/Advertisments/`+advertisment.img+`")}}" alt=""  height="40px" ></td>
                   <td>${advertisment.condition}</td>
                   <td>
                    <a data-toggle="modal " data-target="#exampleModalCenter" class="btn btn-info  fa fa-pencil" value="`+advertisment.id+`"> Edit</a>
                    <button type="button"  class="edit_btn btn btn-primary py-3 px-4" value="`+advertisment.id+`" ></button>
                   <button id="myButton"  type="button" value="`+advertisment.id+`" class=" btn btn-danger fa fa-trash-o">deletet</button></td>
                
               </tr>
    

                    `

                )

            } 
            //delete
            document.getElementById("myButton").onclick = function () {

              location.href="delete/"+ advertisment.id
   };
   //edit

  
  }
        }
    )


})

// end real time search
</script>
    
@endsection