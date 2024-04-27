@extends('layouts.dashboard_layout')
@section('title', 'Edit Property')

@section('dash_content')

    <h3>Edit Property</h3>

    <form action="{{ route('properties.update', $property->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $property->name }}" required>
        </div>
        <!-- Add more fields as needed -->
        <button type="submit" class="btn btn-primary">Update Property</button>
    </form>

@endsection
