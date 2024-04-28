@extends('layouts.dashboard_layout')
@section('title', 'Create Flat')

@section('dash_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Flat</h1>
                <form action="{{ route('flats.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" id="title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Location -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select name="location" class="form-control @error('location') is-invalid @enderror"
                                    id="location">
                                    <option value="">Choose Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->name }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" id="price">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="row">
                        <!-- Address -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror" id="address"
                                    placeholder="House 21, Road 12">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Property Type -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="property_type">Property Type</label>
                                <select name="property_type"
                                    class="form-control @error('property_type') is-invalid @enderror" id="property_type">
                                    <option value="">Choose Category</option>
                                    @foreach ($propertyTypes as $propertyType)
                                        <option value="{{ $propertyType->name }}">{{ $propertyType->name }}</option>
                                    @endforeach
                                </select>
                                @error('property_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Size -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input type="number" name="size"
                                    class="form-control @error('size') is-invalid @enderror" id="size">
                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Sale Status -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sale_status">Sale Status</label>
                            <select name="sale_status" class="form-control @error('sale_status') is-invalid @enderror"
                                id="sale_status">
                                <option value="">Choose Sale Status</option>
                                <option value="Rent">Rent</option>
                                <option value="Sale">Sale</option>
                            </select>
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control summernote @error('description') is-invalid @enderror" id="description"
                            rows="3"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <!-- Bed -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bed">Bed</label>
                                <input type="number" name="bed" class="form-control @error('bed') is-invalid @enderror"
                                    id="bed">
                                @error('bed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Bath -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bath">Bath</label>
                                <input type="number" name="bath"
                                    class="form-control @error('bath') is-invalid @enderror" id="bath">
                                @error('bath')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Photo -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo"
                                    class="form-control-file @error('photo') is-invalid @enderror" id="photo">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
