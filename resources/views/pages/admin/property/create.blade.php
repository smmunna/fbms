@extends('layouts.dashboard_layout')
@section('title', 'Create Property')

@section('dash_content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Create Property</h3>
                <form action="{{ route('properties.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Property Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter property name" required>
                    </div>
                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
