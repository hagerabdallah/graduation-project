@extends('home.layout')

@section('content')

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">



            <div class=" section-header">
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">
              
                
                <h2>Our Advertisments</h2>
                <p>We have everything you want</p>

                {{-- <div class="container search-bar mt-4">
                    <form action="" class="">
                        <input type="text " placeholder="search anything">
                        <button type="submit"><i class="bi bi-search-heart-fill"></i></button>
                    </form>

                </div> --}}
                 <!-- Nav tabs -->

             <div class="container justify-content-center p-2">
                <ul class="nav nav-tabs justify-content-center " id="myTab" role="tablist">
                    @foreach($category as $item)
                <li role="presentation" class="{{ $item->id == 1 ? 'active' : '' }} nav-item " >
                    <a class="nav-link  btn-outline-light btn tabs-item" id="home-tab" href="#home{{ $item->id }}" aria-controls="home" role="tab" data-toggle="tab">{{ $item->name }}</a>

              {{-- <a class="nav-item nav-link active btn btn-outline-hanger yourbtn " id="{{$item->id}}" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{$cat->name}}</a> --}}
            </li>
              @endforeach
                </ul>
            </div>

            </div> 

              <div class="tab-content">
                @foreach ($category as $item)
                     <div role="tabpanel" class="tab-pane {{ $item->id == 1 ? 'active' : '' }}" id="home{{ $item->id }}" class="active">
                       {{-- <ul>
                         @foreach ($item->advertisments as $element)
                            <li>{{ $element->title}}</li>
                         @endforeach
                       </ul> --}}
                       <div class="row gy-5">
                        @foreach ($item->advertisments as $element)
                          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                              <div class="post-item position-relative h-100">
          
                                  <div class="post-img position-relative overflow-hidden">

                                    {{-- <img src="{{asset("Uploads/Advertisments/$image->image")}}" alt=""> --}}
                                      <img src="{{asset("Uploads/Advertisments/$element->img")}}" class="img-fluid" alt="">
          
                                  </div>
          
                                  <div class="post-content d-flex flex-column">
          
                                      <h3 class="post-title">
                                        {{ $element->title}}</h3>
          
                                      <div class="meta d-flex align-items-center">
                                          <div class="d-flex align-items-center">
                                              <i class="bi bi-cash"></i> <span class="ps-2">{{ $element->price}}
                                                  EGP
                                              </span>
                                          </div>
          
          
                                      </div>
          
                                      <hr>
          
                                      <a href="blog-details.html" class="readmore stretched-link"><span>Show More</span><i
                                              class="bi bi-arrow-right"></i></a>
          
                                  </div>
          
                              </div>
                          </div><!-- End post item -->
             @endforeach
          
          </div>



               
               
             </div>
             @endforeach
              </div>
            </div>
        </div>
    </section>
    <!-- End Recent Blog Posts Section -->
@endsection
