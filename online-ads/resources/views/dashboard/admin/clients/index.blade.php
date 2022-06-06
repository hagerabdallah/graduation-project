
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
              <h2>All Users </h2>
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
                    <th>photo</th>
                    <th>Email</th>
                    <th>phone</th>
                    
                    <th>city</th>
                    <th>Actions</th>
                    
                    
                  
                    
                  </tr>
                </thead>


                <tbody id="allusers">
                    @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td> 
                   
                    <td>{{$user->first_name . " " .$user->last_name  }}</td>
                    <td> <img src="{{asset("Uploads/users/$user->img")}}" alt=""  height="40px" ></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    
                   
                    <td>{{$user->city}}</td>
                    <td>
                      {{-- <a  class="btn btn-info  fa fa-pencil" href="{{route('admin.user.edit', $auc->id )}}">Edit</a>  --}}
                      <a  class="btn btn-danger  btn-xs fa fa-trash-o " href="{{route('admin.user.delete', $user->id )}}"> </i>Delete</a></td>
                  </tr>
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
 @endsection
 @section('scripts')
 <script>
  $('#keyword').keyup(function()
 {
     let keyword=$(this).val()
     let url ="{{route('admin.user.search')}}"+"?keyword="+keyword
     console.log(url);
 
     $.ajax(
         {
             type:"GET",
             url:url,
             contentType:false,
             processData:false,
             success: function ( data)
              {
                 $('#allusers').empty()
                 
                
                
                 for (user of data){
                     $('#allusers').append(
 
                     `
                                  
                    <tr>
                    <td>${user.id}</td> 
                    <td>${user.first_name }</td>
                    <td> <img src="{{asset("Uploads/users/`+user.img+`")}}" alt=""  height="40px" ></td> 
                    
                    <td>${user.email }</td>
                    <td>${user.phone }</td>
                    <td>${user.city }</td>
                    <td><button id="myButton"  type="button" value="`+user.id+`" class="edit_btn btn btn-danger fa fa-trash-o">Deletet</button></td>
                   
                   
 
                   
                 
                </tr>
                  
                
              
                
                
              
            
         
               
                    
                    
                     
                     
                    
                  
                    
     
 
                     `
             
 
                 )
 
             } 
             document.getElementById("myButton").onclick = function () {

            location.href="delete/"+ user.id
           };
            
            
            }
         }
     )
 })
 </script>
     
 @endsection