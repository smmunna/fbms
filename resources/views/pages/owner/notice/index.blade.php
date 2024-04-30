@extends('layouts.dashboard_layout')
@section('title', 'Notices')

@section('dash_content')

    <div class="container">
        @if ($notices->isNotEmpty())
            <h2>Notices</h2>
            <hr>
            <div class="notice-list">
                @foreach ($notices as $key => $notice)
                    <div class="notice">
                        <h3>#{{ $key + $notices->firstItem() }}</h3>
                        <hr>
                        <h3>{{ $notice->title }}</h3>
                        <p>{!! $notice->content !!}</p>
                        <p><strong>Created At:</strong> {{ $notice->created_at }}</p>
                    </div>
                    <hr>
                @endforeach
            </div>
            {{ $notices->links() }}
        @else
            <p>No notices found.</p>
        @endif
    </div>

@endsection
