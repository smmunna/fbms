@extends('layouts.dashboard_layout')
@section('title', 'Profile')

@section('dash_content')

    <h3>Profile</h3>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{ asset(auth()->user()->photo) }}" alt="Profile Photo" height="200" width="200"
                    class="img-fluid rounded-circle mb-4">
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Role</th>
                            <td>{{ auth()->user()->role }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Present Address</th>
                            <td>{{ auth()->user()->present_address }}</td>
                        </tr>
                        <tr>
                            <th>Permanent Address</th>
                            <td>{{ auth()->user()->permanent_address }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ auth()->user()->country }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ auth()->user()->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ auth()->user()->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('edit-profile') }}" class="btn btn-primary">Edit Profile</a>
                <!-- Added edit profile button -->
            </div>
        </div>
    </div>

@endsection
