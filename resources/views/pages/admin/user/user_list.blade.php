@extends('layouts.dashboard_layout')
@section('title', 'User List')
@section('dash_content')

    <div class="form-row mb-3">
        <div class="pt-3 col-md-6">
            <form action="{{ route('user.list.search') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" style="width: 500px;" class="form-control"
                        placeholder="Search by name, email, or phone" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                    @if (session('success'))
                        <p id="success" style="color: green; padding:12px;">{{ session('success') }}</p>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="user_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Photo</th>
                                <th>Registered At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->photo)
                                            <img src="{{ asset($user->photo) }}" alt="User Photo" class="img-thumbnail"
                                                style="width: 100px; height: auto;">
                                        @else
                                            No Photo Available
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.view', $user->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        @if ($user->role !== 'admin')
                                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $users->appends(['search' => request('search')])->links() }}
                    <!-- Pagination Links with search query appended -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection
