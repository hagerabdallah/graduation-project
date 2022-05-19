
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
                    <td><a  class="btn btn-info  fa fa-pencil" href="{{route('admin.ads.edit', $ad->id )}}"> Edit</a>
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
 @endsection
 @section('scripts')
<script>
  
 
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
                   <td><button id="myButton2"  type="button" value="`+advertisment.id+`" class="edit_btn btn btn-info  fa fa-pencil">edit</button>
                   <button id="myButton"  type="button" value="`+advertisment.id+`" class="edit_btn btn btn-danger fa fa-trash-o">deletet</button></td>
                   
                   
                   
                   
                   
                   
                  
                
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


</script>
    
@endsection