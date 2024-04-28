@extends('layouts.home_layout')
@section('title', 'All Properties')

@section('content')

    <div class="container  py-3">
        <form action="{{ route('filter.properties') }}" method="GET">
            <div class="row mb-3">
                <!-- Location Filter -->
                <div class="col-md-4">
                    <label for="location" class="form-label">Location:</label>
                    <select name="location" id="location" class="form-select">
                        <option value="">Select Location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->name }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Property Type Filter -->
                <div class="col-md-4">
                    <label for="property_type" class="form-label">Property Type:</label>
                    <select name="property_type" id="property_type" class="form-select">
                        <option value="">Select Property Type</option>
                        @foreach ($propertyTypes as $type)
                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Search Bar -->
                <div class="col-md-4">
                    <label for="search" class="form-label">Search:</label>
                    <input type="text" name="search" id="search" class="form-control"
                        placeholder="Search by Title, Size, Bed, Bath">
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </div>
            </div>
        </form>


        @if (session('success'))
            <p id="success" style="text-align: center; color:green; padding:12px;">{{ session('success') }}</p>
        @endif
        @if (session('failure'))
            <p id="failure" style="text-align: center; color:red; padding:12px;">{{ session('failure') }}</p>
        @endif

        <div class="row g-4">
            @foreach ($properties as $flat)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="property-item rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <a href=""><img class="img-fluid" src="{{ asset($flat->photo) }}" alt=""
                                    style="height: 300px; width: 100%; object-fit: cover;"></a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                For {{ $flat->sale_status }}
                            </div>
                            <div
                                class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                {{ $flat->property_type }}
                            </div>
                        </div>
                        <div class="p-4 pb-0">
                            <h5 class="text-primary mb-3">{{ $flat->price }} TK</h5>
                            <a class="d-block h5 mb-2"
                                href="{{ route('public.flat.details', ['id' => $flat->flat_id]) }}">{{ $flat->title }}</a>
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $flat->address }},
                                {{ $flat->location }}</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-ruler-combined text-primary me-2"></i>{{ $flat->size }}
                                Sqft</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-bed text-primary me-2"></i>{{ $flat->bed }} Bed</small>
                            <small class="flex-fill text-center py-2"><i
                                    class="fa fa-bath text-primary me-2"></i>{{ $flat->bath }} Bath</small>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Pagination Links -->
            {{ $properties->links() }}
        @endsection
    </div>
