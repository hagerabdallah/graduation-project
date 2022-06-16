@extends('dashboard.user.layout')
@section('content')
@include('dashboard.admin.inc.errors')
  <div class="main-content " style="background-color:whitesmoke;">


    <div class="row">
        <div class="col-5 createInfo">
          <form method="POST" action="{{route('user.auction.store')}}" enctype="multipart/form-data"  >
            @csrf
            <div class="mb-3 mt-5 ">
                <label for="Product Name:" class="form-label mt-5">Auction Name</label>
                <input type="text" class="form-control" id="" placeholder="Enter Name"
                    style="border-radius: 5px;" name="name" value="{{old('name')}}">
            </div>



            <div class=" w-100">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                    style="border-radius: 5px;" name="desc">{{old('desc')}}</textarea>

            </div>

            <div class="mb-3">
              <label for="Product Name:" class="form-label mt-5">Address</label>
              <input type="text" class="form-control" id="" placeholder="Enter Address"
                  style="border-radius: 5px;" name="address">
          </div>

            <p>
                <label for=" date">Start date</label>
                <br>
                <input data-date-format="Y-M-D H:i:s" type="text" placeholder="2022-08-14 17:36:13"  id="date" class="w-50"
                    style="border-radius: 10px; color:#060d1a ; border-color: transparent; padding: 5px;" name="start_date" {{old('start_date')}}>
            </p>

            <p>
                <label for="date">End date</label>
                <br>
                <input data-date-format="Y-M-D H:i:s" type="text" placeholder="2022-08-14 17:36:13" id="date " class="w-50"
                    style="border-radius: 10px; color:#060d1a ; border-color: transparent; padding: 5px;" name="end_date" {{old('end_date')}}>
            </p>

            <div class=" mt-1">
                <label for="Product Price" class="form-label  ">Minmum Price:</label>
                <input type="text" class="form-control w-50" id="" placeholder="30 LE"
                    style="border-radius: 10px;" name="min_price" {{old('min_price')}}>
            </div>

        </div>

        <div class="col-7 mt-5 p-5 createInfo2 ">
            <h5> Select Cover Image for Your Auction</h5>
            <hr>
            <div class="mt-3">
                <input type="file" id="file" class="upload" name="img">
                <label for="file" class=" text-center upload-label" style="border-radius: 10px">

                    <i class=" bi bi-folder-plus" style="color: aliceblue;"></i> <span
                        style="color: aliceblue;"> choose a cover</span>
                </label>
            </div>

            <!----  <div class="input-group mb-3 w-75">

                <input type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
            </div> -->

            <h5 class="pt-3"> Select Images for Your Auction</h5>
            <hr>
            <input class="form-control " type="file" id="formFile"   name="imgs[]"
                     
            accept="image/*"
            multiple>

            {{-- <input type="file" id="file" class="upload" name="imgs[]" accept="image/*" multiple  > --}}
           

            {{-- <label for="file" class=" text-center upload-label" style="border-radius: 10px;">

                <i class="bi bi-folder-plus" style="color: aliceblue;"></i> <span style="color: aliceblue;">
                    choose a photo</span>
            </label> --}}





            <h6 class="mt-4 " style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                Auction Condition</h6>
    
                {{-- <input class="form-check-input p-2" type="radio" name="flexRadioDefault"> --}}
                {{-- <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: #012970;">Categories</span> --}}
                <select class="form-select mt-2 w-50 ml-5" aria-label="Default select example" name="condition">
                    <option selected>Select condition</option>
                    <option >New</option>
                    <option >used</option>

                </select>

                <span class="mt-4 " style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                    activation</span>
                    <div class="form-check ">
                      
                        <input class="form-check-input p-2" type="checkbox"name='is_active'
                            >
                        <label class="form-check-label p-0" for="flexRadioDefault2">
                          active
                        </label>

                    </div>

        </div>


        <div class="text-center p-2 mb-3 ">
            <button class="btn "
                style="background-color: #012970 ; color: white; font-family: Verdana, Geneva, Tahoma, sans-serif; border-radius: 10px;">
                Create New
                Auction</button>
        </div>










    </div>
  </form>
</div>
</div>



@endsection















