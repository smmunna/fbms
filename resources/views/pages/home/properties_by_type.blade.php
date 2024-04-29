@extends('layouts.home_layout')
@section('title', 'Properties')
@section('content')
    <div class="container py-3 ">
        @if ($properties->isEmpty())
            <div class="alert alert-info text-center" role="alert">
                No properties found.
            </div>
        @endif
        <div class="row g-4 mb-3">
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
        </div>
        <!-- Pagination Links -->
        {{ $properties->links() }}
    </div>
@endsection
