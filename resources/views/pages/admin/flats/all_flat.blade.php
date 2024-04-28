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
                <!-- Search Form -->
                <form action="{{ route('admin.flats.search') }}" method="GET" class="mb-3">
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
                            <th>isFeatured</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flats as $flat)
                            <tr>
                                <td>{{ $flat->flat_id }}</td>
                                <td>{{ $flat->title }}</td>
                                <td>{{ $flat->status }}</td>
                                <td>
                                    <form action="{{ route('flats.toggle-featured', $flat->flat_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="featured" value="{{ $flat->featured == 'true' ? 'false' : 'true' }}">
                                        <input type="checkbox" class="featured-checkbox" {{ $flat->featured == 'true' ? 'checked' : '' }} onchange="this.form.submit()">
                                    </form>
                                </td>
                                

                                <td>{{ $flat->location }}</td>
                                <td>{{ $flat->address }}</td>
                                <td>{{ $flat->price }}</td>
                                <td>
                                    <a href="{{ route('admin.flat.details', $flat->flat_id) }}"
                                        class="btn btn-info">View</a>
                                    <form id="delete-form-{{ $flat->flat_id }}"
                                        action="{{ route('flat.delete', $flat->flat_id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <button
                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this flat?')) { document.getElementById('delete-form-{{ $flat->flat_id }}').submit(); }"
                                        class="btn btn-danger">Delete</button>
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
