<!-- resources/views/profile/edit.blade.php -->

@extends('layouts.dashboard_layout')
@section('title', 'Edit Profile')

@section('dash_content')

    <h3>Edit Profile</h3>

    <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="present_address">Present Address</label>
                    <input type="text" name="present_address" id="present_address" class="form-control"
                        value="{{ $user->present_address }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="permanent_address">Permanent Address</label>
                    <input type="text" name="permanent_address" id="permanent_address" class="form-control"
                        value="{{ $user->permanent_address }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" class="form-control" value="{{ $user->country }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="photo">Profile Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control-file">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>

@endsection
