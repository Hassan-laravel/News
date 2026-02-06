@extends('layouts.app')

@section('title', __('site.about_us'))

@section('content')
<div class="container my-5">

  <h1 class="mb-4">{{ __('site.about_us') }}</h1>

  <div class="row g-4">
    <div class="col-md-6">
      <h4>{{ __('site.our_mission') }}</h4>
      <p class="text-muted">
        {{ __('site.about_text') }}
      </p>
    </div>

    <div class="col-md-6">
      <img src="/assets/images/about.jpg" class="img-fluid rounded" alt="{{ __('site.about_us') }}">
    </div>
  </div>

  <div class="mt-5">
    <h4>{{ __('site.our_team') }}</h4>



    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">

      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="/assets/images/team1.jpg" class="card-img-top" alt="Team Member">
          <div class="card-body text-center">
            <h6 class="card-title">Ahmed Ali</h6>
            <p class="card-text text-muted">{{ __('site.editor') }}</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="/assets/images/team2.jpg" class="card-img-top" alt="Team Member">
          <div class="card-body text-center">
            <h6 class="card-title">Sarah Mohamed</h6>
            <p class="card-text text-muted">{{ __('site.reporter') }}</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="/assets/images/team3.jpg" class="card-img-top" alt="Team Member">
          <div class="card-body text-center">
            <h6 class="card-title">Layla Hassan</h6>
            <p class="card-text text-muted">{{ __('site.photographer') }}</p>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
@endsection
