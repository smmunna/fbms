@extends('layouts.dashboard_layout')
@section('title', 'Edit Flat')

@section('dash_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Edit Flat</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('flats.update', $flat->flat_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ $flat->title }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control summernote" id="description" rows="3">{!! $flat->description !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select name="location" class="form-control" id="location">
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->name }}"
                                            {{ $location->name == $flat->location ? 'selected' : '' }}>{{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">Sale Status</label>
                                <select name="sale_status" class="form-control" id="sale_status">
                                    <option value={{ $flat->sale_status }}>{{ $flat->sale_status }}</option>
                                    <option value="Rent">Rent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    value="{{ $flat->address }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" id="price"
                                    value="{{ $flat->price }}">
                            </div>
                            <div class="form-group">
                                <label for="property_type">Property Type</label>
                                <select name="property_type" class="form-control" id="property_type">
                                    @foreach ($properties as $propertie)
                                        <option value="{{ $propertie->name }}"
                                            {{ $propertie->id == $flat->property_type ? 'selected' : '' }}>
                                            {{ $propertie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input type="number" name="size" class="form-control" id="size"
                                    value="{{ $flat->size }}">
                            </div>
                            <div class="form-group">
                                <label for="bed">Bed</label>
                                <input type="number" name="bed" class="form-control" id="bed"
                                    value="{{ $flat->bed }}">
                            </div>
                            <div class="form-group">
                                <label for="bath">Bath</label>
                                <input type="number" name="bath" class="form-control" id="bath"
                                    value="{{ $flat->bath }}">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" class="form-control-file" id="photo">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('flats.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
