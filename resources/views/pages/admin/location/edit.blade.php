@extends('layouts.dashboard_layout')
@section('title', 'Edit Location')

@section('dash_content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Location</h1>
            <form action="{{ route('locations.update', $location->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $location->name }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Add more fields as needed -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
