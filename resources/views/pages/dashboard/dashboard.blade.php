@extends('layouts.dashboard_layout')
@section('title', 'Dashboard Home')

@section('dash_content')
    {{-- For admin --}}
    @if (auth()->user()->role == 'admin')
        @include('pages.admin.dashboard.card_section')
    @endif

    {{-- For Owner --}}
    @if (auth()->user()->role == 'owner')
        @include('pages.admin.dashboard.card_section')
    @endif

    {{-- For user --}}
    @if (auth()->user()->role == 'user')
        @include('pages.admin.dashboard.card_section')
    @endif

@endsection
