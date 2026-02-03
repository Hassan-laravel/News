@extends('layouts.app')

@section('title', __('site.latest_news'))

@section('content')
    <h1 class="mb-4">{{ __('site.site_name') }}</h1>
<!-- slider up -->
@include('Home-partials.slider-up')
<!-- slider up end -->
<!-- Posts by Category  -->
@include("Home-partials.Posts")
<!-- Posts by Category  -->
@endsection
