@extends('layouts.dashboard_layout')
@section('title', 'View User')

@section('dash_content')

    <div class="row py-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 text-center">
                        @if ($user->photo)
                            <img src="{{ asset($user->photo) }}" alt="User Photo" class="img-thumbnail"
                                style="width: 150px; height: auto;">
                        @else
                            No Photo Available
                        @endif
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Present Address</th>
                                <td>{{ $user->present_address }}</td>
                            </tr>
                            <tr>
                                <th>Permanent Address</th>
                                <td>{{ $user->permanent_address }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $user->country }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
