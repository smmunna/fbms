@extends('layouts.dashboard_layout')
@section('title', 'Flats')

@section('dash_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All Flats</h1>
                @if (session('success'))
                    <p id="success" style="text-align: center; color:green; padding:12px;">{{ session('success') }}</p>
                @endif
                <hr>
                <a href="{{ route('flats.create') }}" class="btn btn-primary mb-3">Create Flat</a>

                <!-- Search Form -->
                <form action="{{ route('flats.search') }}" method="GET" class="mb-3">
                    <div class="form-row">
                        <div class="col-md-6">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by size,bed, location bath,...">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Booking Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flats as $flat)
                            <tr>
                                <td>{{ $flat->flat_id }}</td>
                                <td>{{ $flat->title }}</td>
                                <td>{{ $flat->status }}</td>
                                <td>{{ $flat->location }}</td>
                                <td>{{ $flat->address }}</td>
                                <td>{{ $flat->price }}</td>
                                <td>{{ $flat->booking_status }}</td>
                                <td>
                                    <a href="{{ route('flats.show', $flat->flat_id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('flats.edit', $flat->flat_id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('flats.destroy', $flat->flat_id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Pagination Links -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{ $flats->links() }}
            </div>
        </div>
    </div>
@endsection
