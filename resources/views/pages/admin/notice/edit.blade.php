@extends('layouts.dashboard_layout')
@section('title', 'Edit Notice')

@section('dash_content')

    <div class="container">
        <h2>Edit Notice</h2>
        <hr>
        <form action="{{ route('notices.update', $notice->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $notice->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control summernote" id="content" name="content" rows="5">{{ $notice->content }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Notice</button>
        </form>
    </div>

@endsection
