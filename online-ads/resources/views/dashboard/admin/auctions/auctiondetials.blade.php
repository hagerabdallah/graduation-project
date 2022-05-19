@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
    <div class="">
      

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All Bidders</h2>
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
                    <th>Auction ID</th>
                    <th>User Name</th>
                    <th>User photo</th>
                    <th>Auction Name</th>
                    <th>cover photo</th>
                    <th>Price</th>
                    <th>phone</th>
                    <th>city</th>
                    
                    
                  </tr>
                </thead>


                <tbody>
                    @foreach ($inf as $in)
                    <tr>
                        <td>{{$in->auction->id}}
                        <td>{{$in->user->first_name ." ". $in->user->last_name  }}</td>
                        <td> <img src="{{asset('Uploads/users/'.$in->user->img)}}" alt=""  height="40px" ></td>
                        <td>{{$in->auction->name}}</td>
                        <td> <img src="{{asset('Uploads/auctions/'.$in->auction->img)}}" alt=""  height="40px" ></td>
                        <td>{{$in->price}}</td>
                        <td>{{$in->user->phone}}</td>
                        <td>{{$in->user->city}}</td>
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