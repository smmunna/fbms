@extends('layouts.dashboard_layout')
@section('title', 'View Flat')

@section('dash_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Flat Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $flat->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $flat->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $flat->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sale Status</th>
                                        <td>{{ $flat->sale_status }}</td>
                                    </tr>
                                    <tr>
                                        <th>isFeatured</th>
                                        <td>{{ $flat->featured }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $flat->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>{{ $flat->price }} TK</td>
                                    </tr>
                                    <tr>
                                        <th>Property Type</th>
                                        <td>{{ $flat->property_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Size</th>
                                        <td>{{ $flat->size }} sqft</td>
                                    </tr>
                                    <tr>
                                        <th>Bedrooms</th>
                                        <td>{{ $flat->bed }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bathrooms</th>
                                        <td>{{ $flat->bath }}</td>
                                    </tr>
                                    <tr>
                                        <th>Photo</th>
                                        <td>
                                            @if ($flat->photo)
                                                <img src="{{ asset($flat->photo) }}" alt="Flat Photo" class="img-fluid">
                                            @else
                                                No Photo Available
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('flats.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
