@extends('home.layout')

@section('content')

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active carousel-item1 " >
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>

        <div class="container ">
          <div class="carousel-caption  ">
            
              <h1>ADVERTISMENT SERVICE</h1>
            <p style="font-family: Verdana, Geneva, Tahoma, sans-serif">hello friend, we glad to have a customer like you,
                you can display your products which you want to sell and manage them our website for free,
                you can see your interesting products and contact with sellers,
                you can put your Favourite products in Favourite List.
            </p>
               <img src="imgs/buy-sell-icon-29.jpg" >
            
          </div>
        </div>
      </div>
      <div class="carousel-item1 carousel-item ">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
        <div class="container">
          <div class="carousel-caption ">
            <h1>AUCTION SERVICE</h1>
            <p style="font-family: Verdana, Geneva, Tahoma, sans-serif">hello friend, we glad to have a customer like you,
                you can display your products which you want to sell and manage them our website for free,
                you can see your interesting products and contact with sellers,
                you can put your Favourite products in Favourite List.
            </p>             
               <img src="imgs/bidders.jpg" >
          </div>
        </div>
      </div>
     
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
        <div class="container">

            <div class="section-title">
                <h2 data-aos="fade-in">Advertisements</h2>
                <p data-aos="fade-in">New Advertisements Arrival</p>
            </div>
            <div class="row portfolio-container" data-aos="fade-up">


                 @foreach($Advertisment as $ads)
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{asset("Uploads/advertisments/$ads->img")}}" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="{{asset("Uploads/advertisments/$ads->img")}}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                            <a href="adverts.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>

                    </div>
                    <div class="adsContent">
                        <h4>{{$ads->title}}</h4>
                        <p> {{$ads->price}}EGP</p>

                    </div>
                </div>
                 @endforeach


            </div>

        </div>
    </section>

    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg bg-light">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-in">Auctions</h2>
                    <p data-aos="fade-in">New Auctions Arrival</p>
                </div>



                <div class="row portfolio-container" data-aos="fade-up">

                  
                    @foreach($Auction as $auc )
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset("Uploads/auctions/$auc->img")}}" class="img-fluid" alt="">
                            <div class="portfolio-links">
                                <a href="{{asset("Uploads/auctions/$auc->img")}}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                                <a href="{{route('user.auction.show',$auc->id)}}" title="More Details"><i class="bi bi-link"></i></a>
                            </div>

                        </div>
                        <div class="adsContent">
                            <h4>{{$auc->name}}</h4>
                            <button  class="btn btn-outline-dark adContentbtn"><a style="color: white" href="{{route('user.auction.show',$auc->id)}}">Join Auction</a></button>

                        </div>
                    </div>
                    @endforeach


                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>
                        Privacy policy</h2>

                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">Norhan Sabry</a></h4>
                            <p>This is my very first order through site, and I am totally and completely
                                satisfied! The
                                fit is great and so are the prices. I will definitely return again and again...
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Hager Ahmed</a></h4>
                            <p>Just received my order & am thrilled with everything I purchased! and the
                                shipping was
                                awesome it took 3 days best yet! i will shop again thanks you</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->


     


       
    @endsection
    @section('scripts')
   
    <script   src="{{asset('user/js')}}/bootstrap.bundle.min.js"></script>

        <script>
            var nav = document.querySelector('.fixed-top');
            window.addEventListener('scroll', function () {
                if (window.pageYOffset > 100) {
                    nav.classList.add('bg-light', 'shadow');

                } else {
                    nav.classList.remove('bg-light', 'shadow');
                }
            });
        </script>

      @endsection
