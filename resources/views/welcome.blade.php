@extends('layouts.home_layout')
@section('title', 'Home')

@section('content')

    @include('shared.home.header')
    @include('shared.home.search')
    @include('shared.home.category')
    {{-- @include('shared.home.about') --}}
    @include('shared.home.property_list')
    {{-- @include('shared.home.call_action') --}}
    @include('shared.home.team')


@endsection
