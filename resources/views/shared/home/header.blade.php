<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With
                Your Family</h1>
            <p class="animated fadeIn mb-4 pb-2">Embark on the journey of finding your ideal home where every moment is
                cherished with your loved ones. Whether it's cozy family dinners or laughter-filled weekends, your
                perfect home sets the stage for lifelong memories. </p>
            <a href="{{ route('home.all.properties') }}" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get
                Started</a>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src={{ asset('home/img/carousel-1.jpg') }} alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src={{ asset('home/img/carousel-2.jpg') }} alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
