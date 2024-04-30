@extends('layouts.dashboard_layout')
@section('title', 'Create Notice')

@section('dash_content')

    <div class="container">
        <h2>Create Notice</h2>
        <form action="{{ route('notices.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control summernote" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
