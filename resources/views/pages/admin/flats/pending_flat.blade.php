@extends('layouts.dashboard_layout')
@section('title', 'Flats')

@section('dash_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Pending Flats</h1>
                @if (session('success'))
                    <p id="success" style="text-align: center; color:green; padding:12px;">{{ session('success') }}</p>
                @endif
                <hr>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
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
                                <td>{{ $flat->location }}</td>
                                <td>{{ $flat->address }}</td>
                                <td>{{ $flat->price }}</td>
                                <td>
                                    <a href="{{ route('admin.flat.details', $flat->flat_id) }}" class="btn btn-info">View</a>
                                    <form id="approve-form-{{ $flat->flat_id }}"
                                        action="{{ route('flat.approve', $flat->flat_id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('PUT')
                                    </form>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('approve-form-{{ $flat->flat_id }}').submit();"
                                        class="btn btn-primary">Approve</a>
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
    </div>
@endsection
