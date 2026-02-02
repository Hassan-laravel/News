<footer class="mt-5 border-top bg-body-tertiary pt-5 pb-4">
    <div class="container">
        <div class="row gy-5">

            <div class="col-lg-4 col-md-6">
                <div class="footer-logo mb-3">
                    <h4 class="fw-bold text-primary">{{ $settings['website_name'] ?? 'اسم الموقع' }}</h4>
                </div>
                <p class="text-secondary small lh-lg mb-4">
                    {{ $settings['description'] ?? 'هنا يكتب وصف مختصر عن الموقع وأهدافه الإخبارية لتظهر في التذييل بشكل أنيق.' }}
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-4">{{ __('site.quick_links') }}</h6>
                <ul class="nav flex-column gap-2">
                    @foreach ($pages as $page)
                    <li class="nav-item">
                        <a href="{{ route('page', $page['slug']) }}" class="nav-link p-0 text-secondary small hover-link">
                           <i class="bi bi-chevron-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} me-1"></i>
                           {{ $page['title'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4">{{ __('site.contact_info') }}</h6>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="p-2 bg-primary bg-opacity-10 rounded-3">
                            <i class="bi bi-envelope-at text-primary"></i>
                        </div>
                        <span class="small text-secondary text-break">{{ $settings['email'] ?? 'info@example.com' }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="p-2 bg-primary bg-opacity-10 rounded-3">
                            <i class="bi bi-telephone text-primary"></i>
                        </div>
                        <span class="small text-secondary" dir="ltr">{{ $settings['phone'] ?? '+966 000 000' }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4">اشترك في النشرة</h6>
                <p class="small text-secondary mb-3">كن أول من يعرف أهم الأخبار.</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm bg-body" placeholder="بريدك الإلكتروني">
                    <button class="btn btn-primary btn-sm" type="button">اشتراك</button>
                </div>
            </div>

        </div>

        <hr class="my-5 opacity-25">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 small text-secondary">
            <p class="mb-0">© {{ date('Y') }} {{ $settings['website_name'] }}. {{ __('site.all_rights_reserved') }}</p>
            <div class="d-flex gap-4">
                <a href="#" class="text-decoration-none text-secondary">شروط الخدمة</a>
                <a href="#" class="text-decoration-none text-secondary">الخصوصية</a>
            </div>
        </div>
    </div>
</footer>
