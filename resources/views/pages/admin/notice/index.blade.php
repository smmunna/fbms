@extends('layouts.dashboard_layout')
@section('title', 'Notices')

@section('dash_content')

    <div class="container">
        @if ($notices->isNotEmpty())
            <h2>Notices</h2>
            <a href="{{ route('notices.create') }}" class="btn btn-primary mb-3">Create Notice</a>
            @if (session('success'))
                <p id="success" style="text-align: center; color:green; padding:12px;">{{ session('success') }}</p>
            @endif
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @php
                        $serial = 1;
                    @endphp
                    @foreach ($notices as $notice)
                        <tr>
                            <td>{{ $serial++ }}</td>
                            <td>{{ $notice->title }}</td>
                            <td>{!! $notice->content !!}</td>
                            <td>{{ $notice->created_at }}</td>
                            <td>
                                <a href="{{ route('notices.edit', $notice->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('notices.destroy', $notice->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <!-- Add more columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $notices->links() }}
        @else
            <p>No notices found.</p>
        @endif
    </div>

@endsection
