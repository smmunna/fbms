@extends('layouts.dashboard_layout')
@section('title', 'Locations')

@section('dash_content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All Locations</h1>
                @if (session('success'))
                    <p id="success" style="text-align: center; color:green; padding:12px;">{{ session('success') }}</p>
                @endif
                <hr>
                <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Create Location</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->id }}</td>
                                <td>{{ $location->name }}</td>
                                <td>
                                    <a href="{{ route('locations.edit', $location->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $locations->links() }} <!-- Pagination links -->
            </div>
        </div>
    </div>

@endsection
