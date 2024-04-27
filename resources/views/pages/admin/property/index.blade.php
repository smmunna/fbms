@extends('layouts.dashboard_layout')
@section('title', 'Properties')

@section('dash_content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All Properties</h1>
                @if (session('success'))
                    <p id="success" style="text-align: center; color:green; padding:12px;">{{ session('success') }}</p>
                @endif
                <hr>
                <a href="{{ route('properties.create') }}" class="btn btn-primary mb-3">Create Property</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->id }}</td>
                                <td>{{ $property->name }}</td>
                                <td>
                                    <!-- Edit button -->
                                    <a href="{{ route('properties.edit', $property->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <!-- Delete button -->
                                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this property?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $properties->links() }} <!-- Pagination links -->
            </div>
        </div>
    </div>

@endsection
