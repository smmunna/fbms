@php
    $villaCount = DB::table('flats')->where('property_type', 'Villa')->where('status', 'approved')->count();
    $familyHouseCount = DB::table('flats')
        ->where('property_type', 'Family House')
        ->where('status', 'approved')
        ->count();
    $officeCount = DB::table('flats')->where('property_type', 'Office')->where('status', 'approved')->count();
    $buildingCount = DB::table('flats')->where('property_type', 'Building')->where('status', 'approved')->count();
    $shopCount = DB::table('flats')->where('property_type', 'Shop')->where('status', 'approved')->count();
    $hostelCount = DB::table('flats')->where('property_type', 'Hostels')->where('status', 'approved')->count();
    $garageCount = DB::table('flats')->where('property_type', 'Garage')->where('status', 'approved')->count();
    $allCount = DB::table('flats')->where('status', 'approved')->count();
@endphp


<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Types</h1>
            <p>Discover a space that resonates with your aspirations, offering comfort, warmth, and the promise of a
                beautiful life together. Welcome to a place where dreams come alive, and every corner echoes the
                laughter of your family. </p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="{{ route('properties.by_type', ['property_type' => 'Family House']) }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('home/img/icon-apartment.png') }}" alt="Icon">
                        </div>
                        <h6>Family House</h6>
                        <span>{{ $familyHouseCount }} Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="{{ route('properties.by_type', ['property_type' => 'Villa']) }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('home/img/icon-villa.png') }}" alt="Icon">
                        </div>
                        <h6>Villa</h6>
                        <span>{{ $villaCount }} Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="{{ route('properties.by_type', ['property_type' => 'Office']) }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('home/img/icon-house.png') }}" alt="Icon">
                        </div>
                        <h6>Office</h6>
                        <span>{{ $officeCount }} Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="{{ route('properties.by_type', ['property_type' => 'Building']) }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('home/img/icon-housing.png') }}" alt="Icon">
                        </div>
                        <h6>Building</h6>
                        <span>{{ $buildingCount }} Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="{{ route('properties.by_type', ['property_type' => 'Shop']) }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('home/img/icon-building.png') }}" alt="Icon">
                        </div>
                        <h6>Shop</h6>
                        <span>{{ $shopCount }} Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="{{ route('properties.by_type', ['property_type' => 'Hostels']) }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('home/img/icon-neighborhood.png') }}" alt="Icon">
                        </div>
                        <h6>Hostel</h6>
                        <span>{{ $hostelCount }} Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="{{ route('properties.by_type', ['property_type' => 'Garage']) }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('home/img/icon-condominium.png') }}" alt="Icon">
                        </div>
                        <h6>Garage</h6>
                        <span>{{ $garageCount }} Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('home.all.properties') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('home/img/icon-luxury.png') }}" alt="Icon">
                        </div>
                        <h6>All</h6>
                        <span>{{ $allCount }} Properties</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Category End -->
