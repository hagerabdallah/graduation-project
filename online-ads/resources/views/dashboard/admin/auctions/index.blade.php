
{{-- @foreach ($auction as $auc)
<h1>{{$auc->name}}</h1>
<h1>{{$auc->desc}}</h1>
<h1>{{$auc->min_price}}</h1>
<h1>{{$auc->start_date}}</h1>
<h1>{{$auc->end_date}}</h1>
<h1>{{$auc->condition}}<h1>
<a class="btn btn-primary" href="{{route('admin.auction.cancle', $auc->id )}}">cancle</a> 
<form action="{{route('admin.auction.accept', $auc->id)}}" method="POST">
    @csrf
     
     
      <button  class="btn btn-primary">accept</button>
    </form>



@endforeach --}}

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
                    <td><a  class="btn btn-info  btn-xs fa fa-pencil" href="{{route('admin.auction.edit', $auc->id )}}"> Edit</a>
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
 @endsection
 @section('scripts')
 <script>
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
 })
 </script>
     
 @endsection
 