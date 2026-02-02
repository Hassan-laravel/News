@extends('layouts.app')

@section('title', __('site.contact_us'))

@section('content')
<div class="container my-5">

  <h1 class="mb-4">{{ __('site.contact_us') }}</h1>

  <div class="row g-4">

    <!-- معلومات التواصل -->
    <div class="col-md-4">
      <h5>{{ __('site.contact_info') }}</h5>
      <p class="text-muted">📍 {{ __('site.address') }}</p>
      <p class="text-muted">📞 {{ __('site.phone') }}</p>
      <p class="text-muted">💬 {{ __('site.whatsapp') }}</p>
    </div>

    <!-- نموذج الاتصال -->
    <div class="col-md-8">
      <form>
        <div class="mb-3">
          <label class="form-label">{{ __('site.name') }}</label>
          <input type="text" class="form-control" placeholder="{{ __('site.enter_name') }}">
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('site.email') }}</label>
          <input type="email" class="form-control" placeholder="{{ __('site.enter_email') }}">
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('site.message') }}</label>
          <textarea class="form-control" rows="5" placeholder="{{ __('site.enter_message') }}"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('site.send') }}</button>
      </form>
    </div>

  </div>
</div>
@endsection
