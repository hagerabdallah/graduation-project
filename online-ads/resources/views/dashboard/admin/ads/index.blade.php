
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
                   <button type="button"  class="edit_btn btn btn-primary py-3 px-4" value="{{$ad->id}}" ></button>
                      <a data-toggle="modal " data-target="#exampleModalCenter" class="btn btn-info  fa fa-pencil"> Edit</a>
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
          <form id="UpdateModal" method="POST"  enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
            
            <div class="row">
            <div  class=" col-md-6">
              <input type="hidden" name="id" id="ad_id"  > 
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
             
                <select class="form-control" name="user_id" id="user_id" >
                  
                    <option selected>Select User</option>
                    @foreach ($user as $us)
                      <option value="{{$us->id}}">{{$us->email}}</option> 
                      @endforeach
                  
                </select>
            
             
                
              </div>
              <div  class=" col-md-6">
                <br>
                <label  >Category
                </label>
               
                  <select class="form-control" name='category_id' id="category_id">
                    <option selected>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option> 
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

                    <input class="form-control" type="file" id="formFile" name=img id="img">

                    <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                </div>
              </div>
              <div class=" col-md-6 ">
                <br>
                <div class="input-group  ">

                  <input class="form-control " type="file" id="formFile"   name="images[]"  id="images"
                   
                  accept="image/*"
                  multiple>

                  <label class="input-group-text" for="inputGroupFile02">Upload all Images</label>
              </div>
            </div>
               
              
              <div class="ln_solid"></div>
              <div class="form-group">
                <br>
                <div class="col-md-6 ">
                  <button  type="submit" class="btn btn-primary btn_update ">submit</button>
                  
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
      $('#user_id').val(response.user.email);
      $('#is_accepted').val(response.advertisment.is_accepted);
      $('#is_active').val(response.advertisment.is_active);
      

    }
  
    
  }
 
}
)})
// end get edit
// post
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  
$(document).on('click','.btn_update',function(e)
{
e.preventDefault();
var id=$('#ad_id').val();
var data = {
                'title': $('#title').val(),
                'desc': $('#desc').val(),
                'category_id': $('#category_id').val(),
                'user_id': $('#user_id').val(),
                'condition': $('#condition').val(),
                'price': $('#price').val(),
                'img': $('#img').val(),
                'images': $('#images').val(),          

              }
let EditformtData=new FormData($('#UpdateModal')[0]);
$.ajax(
  {
   type:"POST",
   
  url:"update/"+id,
  data:data,
  dataType: "json",
  contentType:false,
  processData:false,
  success: function (response){
  if (response.status==400)
  {
    $('#updateerrors').html("");
    $('#updateerrors').removeClass('d-none');
    $.each(response.errors,function(key,err_value)
    {
      $('#updateerrors').append(`<li>`+err_value+`</li>`);
    });
  }
  elseif (response.status==404)
  {
    alert(response.message);

  }
  elseif(response.status==200)
  {
 $('#EditEmployeeModal').modal('hide');
 alert(response.message);
  }
}})})
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
                   <td><button id="myButton2"  type="button" value="`+advertisment.id+`" class="btn btn-info  fa fa-pencil">edit</button>
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
             document.getElementById("myButton2").onclick = function () {

                location.href="edit/"+ advertisment.id

};
  
  }
        }
    )


})

// end real time search
</script>
    
@endsection