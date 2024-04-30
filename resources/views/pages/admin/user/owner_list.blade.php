@extends('layouts.dashboard_layout')
@section('title', 'Owner')

@section('dash_content')

    <div class="container">
        <h2>Owner List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Photo</th>
                    <th>Present Address</th>
                    <th>Country</th>
                    <th>Created At</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($owners as $owner)
                    <tr>
                        <td>{{ $owner->id }}</td>
                        <td>{{ $owner->name }}</td>
                        <td>{{ $owner->email }}</td>
                        <td>{{ $owner->phone }}</td>
                        <td>
                            @if ($owner->photo)
                                <img src="{{ asset($owner->photo) }}" alt="Owner Photo" style="width: 50px;">
                            @else
                                No Photo Available
                            @endif
                        </td>
                        <td>{{ $owner->present_address }}</td>
                        <td>{{ $owner->country }}</td>
                        <td>{{ $owner->created_at }}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $owners->links() }}
    </div>

@endsection
