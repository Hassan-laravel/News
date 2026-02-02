<footer class="mt-5 border-top pt-4 pb-3">
  <div class="container">

    <div class="row gy-4">

      <!-- معلومات الموقع -->
      <div class="col-md-4">
        <h5 class="fw-bold mb-3">
          {{ __('site.site_name') }}
        </h5>
        <p class="text-muted">
         <p>{{ $settings['description'] }}</p>
        </p>
      </div>

      <!-- روابط سريعة -->
      <div class="col-md-4">
        <h6 class="fw-bold mb-3">
          {{ __('site.quick_links') }}
        </h6>
        <ul class="list-unstyled">
                @foreach ($pages as $page)
                    <li class="text-decoration-none text-secondary" href="{{ route('page', $page['slug']) }}">
                        {{ $page['title'] }}
                    </li>
                @endforeach
        </ul>
      </div>

      <!-- معلومات التواصل -->
      <div class="col-md-4">
        <h6 class="fw-bold mb-3">
          {{ __('site.contact_info') }}
        </h6>
        <p class="mb-1">
          📍 <p>للتواصل: {{ $settings['email'] }}</p>
        </p>
        <p class="mb-1">
          📍 {{ __('site.address') }}
        </p>
        <p class="mb-1">
          📞 {{ __('site.phone') }}
        </p>
        <p class="mb-1">
          💬 {{ __('site.whatsapp') }}
        </p>
      </div>

    </div>

    <hr class="my-4">

    <!-- حقوق النشر -->
    <div class="text-center small text-muted">
      © {{ date('Y') }}
      {{ __('site.site_name') }} —
      {{ __('site.all_rights_reserved') }}
    </div>

  </div>
</footer>
