@extends('frontend.layouts.app')
@section('title', 'Home')

@section('content')

    @include('frontend.partials.home-slider')
    @include('frontend.partials.featured-categories')
    @include('frontend.partials.home-banners')
    @include('frontend.partials.popular-products')

{{-- @include('frontend.partials.best-sales') --}}


@endsection
@section('script')

    
@endsection