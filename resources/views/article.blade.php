@extends('layouts.app')

@section('title', __('articles.sample_title'))

@section('content')
<article>

  <h1 class="mb-3">{{ __('articles.sample_title') }}</h1>

  <img src="/assets/images/post1.jpg" class="img-fluid rounded mb-4">

  <p>{{ __('articles.sample_content') }}</p>

  <h4 class="mt-5">{{ __('site.gallery') }}</h4>

  <div class="row g-3">
    <div class="col-4">
      <img src="/assets/images/gallery/1.jpg" class="img-fluid gallery-img" onclick="openImage(this.src)">
    </div>
  </div>

</article>

<div id="lightbox" class="lightbox" onclick="closeImage()">
  <img id="lightbox-img">
</div>
@endsection
