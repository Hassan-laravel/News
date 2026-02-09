<footer class="mt-5 border-top border-secondary-subtle bg-body-tertiary pt-5 pb-4">
    <div class="container">
        <div class="row gy-5">

            {{-- 1. شعار الموقع والوصف --}}
            <div class="col-lg-4 col-md-6">
                <div class="footer-logo mb-3">
                    <h4 class="fw-bold text-primary">{{ $settings['website_name'] ?? __('site.default_site_name') }}</h4>
                </div>
                {{-- تم تغيير text-body-secondary إلى text-body لتوحيد اللون --}}
                <p class="text-body small lh-lg mb-4">
                    {{ $settings['description'] ?? __('site.footer_description') }}
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center social-btn">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center social-btn">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center social-btn">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>

            {{-- 2. روابط سريعة --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-4 text-body">{{ __('site.quick_links') }}</h6>
                <ul class="nav flex-column gap-2">
                    @foreach ($pages as $page)
                        <li class="nav-item">
                            <a href="{{ route('page', $page['slug']) }}" class="nav-link p-0 text-body small hover-link">
                                <i class="bi bi-chevron-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} me-1"></i>
                                {{ $page['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- 3. معلومات التواصل --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4 text-body">{{ __('site.contact_info') }}</h6>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="p-2 bg-primary bg-opacity-10 rounded-3 border border-primary border-opacity-10">
                            <i class="bi bi-envelope-at text-primary"></i>
                        </div>
                        {{-- تم التغيير إلى text-body --}}
                        <span class="small text-body text-break">{{ $settings['email'] ?? 'info@example.com' }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="p-2 bg-primary bg-opacity-10 rounded-3 border border-primary border-opacity-10">
                            <i class="bi bi-telephone text-primary"></i>
                        </div>
                        {{-- تم التغيير إلى text-body --}}
                        <span class="small text-body" dir="ltr">{{ $settings['phone'] ?? '+966 000 000' }}</span>
                    </div>
                </div>
            </div>

            {{-- 4. الاشتراك في النشرة البريدية --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4 text-body">{{ __('site.newsletter_title') }}</h6>
                {{-- تم التغيير إلى text-body --}}
                <p class="small text-body mb-3">{{ __('site.newsletter_desc') }}</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm bg-body border-secondary-subtle text-body shadow-none" placeholder="{{ __('site.email_placeholder') }}">
                    <button class="btn btn-primary btn-sm" type="button">{{ __('site.subscribe_btn') }}</button>
                </div>
            </div>

        </div>

        <hr class="my-5 border-secondary-subtle opacity-50">

        {{-- 5. شريط حقوق النشر السفلي --}}
        {{-- تم تغيير text-body-secondary للأب ليشمل الفقرة والروابط بالأسفل --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 small text-body">
            <p class="mb-0">© {{ date('Y') }} {{ $settings['website_name'] }}. {{ __('site.all_rights_reserved') }}</p>
            <div class="d-flex gap-4">
                {{-- تم التغيير إلى text-body --}}
                <a href="#" class="text-decoration-none text-body hover-primary-text">{{ __('messages.terms_of_service') }}</a>
                <a href="#" class="text-decoration-none text-body hover-primary-text">{{ __('site.privacy_policy') }}</a>
            </div>
        </div>
    </div>
</footer>
