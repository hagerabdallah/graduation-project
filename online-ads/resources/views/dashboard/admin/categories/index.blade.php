
@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
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

     
      {{-- new --}}
      <div class="row" >
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All Categories </h2>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                    
                  </tr>
                </thead>

                  
                <tbody id="allcategories">
                  @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                   
                    <td>{{$category->name}}</td>
                    <td>{{$category->desc}}</td>
                    <td><a  class="btn  btn btn-info fa fa-pencil " href="{{route('admin.categories.edit', $category->id )}}"> Edit </a>
                        <a  class="btn btn-danger fa fa-trash-o " href="{{route('admin.categories.delete', $category->id )}}"> Delete </a></td>
                   
                  </tr>
                  @endforeach
                  
                    
                 
                </tr>
                  
                
                 
              
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

  @endsection

  @section('scripts')
  <script>
   $('#keyword').keyup(function()
  {
      let keyword=$(this).val()
      let url ="{{route('admin.categories.search')}}"+"?keyword="+keyword
      console.log(url);
  
      $.ajax(
          {
              type:"GET",
              url:url,
              contentType:false,
              processData:false,
              success: function ( data)
               {
                  $('#allcategories').empty()
                  
                 
                 
                  for (category of data){
                      $('#allcategories').append(
  
                      `
                    
                   
                     
                      
                                      
                     <tr>
                     <td>${category.id}</td> 
                     <td>${category.name}</td> 
                     <td>${category.desc}</td>
                     <td><button id="myButton2"  type="button" value="`+category.id+`" class="edit_btn btn btn-info  fa fa-pencil">edit</button>
                   <button id="myButton"  type="button" value="`+category.id+`" class="edit_btn btn btn-danger fa fa-trash-o">deletet</button></td> 
                    
                    
                     
                     
                    
                    
  
                    
                  
                 </tr>
                   
                 
               
                 
                 
               
             
          
                
                     
                     
                      
                      
                     
                   
                     
      
  
                      `
              
  
                  )
  
              }
            
             //delete
             document.getElementById("myButton").onclick = function () {

location.href="delete/"+ category.id
};
//edit
document.getElementById("myButton2").onclick = function () {

location.href="edit/"+ category.id
};
            
            
            
            
            }
          }
      )
  })
  </script>
      
  @endsection