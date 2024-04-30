@extends('layouts.dashboard_layout')
@section('title', 'Dashboard Home')

@section('dash_content')
    {{-- For admin --}}
    @if (auth()->user()->role == 'admin')
        @include('pages.admin.dashboard.card_section')
        @include('pages.admin.dashboard.recent_orders')
        @include('pages.admin.dashboard.pending_flat')
    @endif

    {{-- For Owner --}}
    @if (auth()->user()->role == 'owner')
        @include('pages.owner.dashboard.cart_section')
        @include('pages.owner.dashboard.recent_order')
    @endif

    {{-- For user --}}
    @if (auth()->user()->role == 'user')
        @include('pages.user.dashboard.recent_order')
    @endif

@endsection
