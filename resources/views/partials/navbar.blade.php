<header class="sticky-top shadow-sm">
    <div class="bg-body-tertiary border-bottom py-2 d-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center small">
            <div class="d-flex align-items-center gap-4">
                <div class="d-flex gap-3 border-end pe-3">
                    @foreach ($pages as $page)
                        <a class="text-decoration-none text-body-secondary fw-medium" href="{{ route('page', $page['slug']) }}">
                            {{ $page['title'] }}
                        </a>
                    @endforeach
                    <a class="text-decoration-none text-body-secondary fw-medium" href="{{ route('contact') }}">{{ __('site.contact_us') }}</a>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="text-body-secondary hover-primary"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-body-secondary hover-primary"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-body-secondary hover-primary"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-body-secondary hover-primary"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="dropdown border-start ps-3">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle border-0 shadow-none text-body" data-bs-toggle="dropdown">
                        🌐 {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        @foreach (config('language.supported') as $langKey => $langData)
                            <li><a class="dropdown-item" href="{{ route('switch.language', $langKey) }}">{{ $langData['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <button class="btn btn-sm btn-outline-secondary border-0" onclick="toggleTheme()">
                    <i class="bi bi-moon-stars theme-icon"></i>
                </button>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body border-bottom p-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2 d-lg-none">
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand fw-bold text-body" href="/">{{ $settings['website_name'] }}</a>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a class="navbar-brand m-0" href="/">
                    <img src="{{ $settings['logo'] }}" alt="logo" height="40" class="d-inline-block align-top shadow-sm rounded">
                </a>
                <span class="fw-bold fs-4 d-none d-lg-block border-end pe-3 text-body">{{ $settings['website_name'] }}</span>
            </div>

            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav mx-auto gap-lg-3">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link fw-medium text-body-emphasis" href="/category/{{ $category['id'] }}">{{ $category['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="d-flex align-items-center gap-2 d-lg-none">
                <button class="btn btn-sm btn-outline-secondary border-0 text-body" onclick="toggleTheme()">
                    <i class="bi bi-moon-stars theme-icon"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="offcanvas {{ app()->getLocale() == 'ar' ? 'offcanvas-start' : 'offcanvas-start' }} d-lg-none"
        tabindex="-1" id="mobileMenu" style="width: 280px;">
        <div class="offcanvas-header border-bottom bg-body-secondary">
            <h5 class="offcanvas-title fw-bold text-body">Menu</h5>
            <button type="button" class="btn-close text-reset shadow-none" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0 bg-body">
            <div class="accordion accordion-flush" id="menuAccordion">

                <div class="accordion-item border-0 bg-transparent">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold bg-transparent text-body shadow-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseCats">
                            <i class="bi bi-grid-fill me-2 text-body-secondary px-2"></i> Categories
                        </button>
                    </h2>
                    <div id="collapseCats" class="accordion-collapse collapse show" data-bs-parent="#menuAccordion">
                        <div class="accordion-body p-0">
                            <div class="list-group list-group-flush">
                                @foreach ($categories as $category)
                                    <a href="/category/{{ $category['id'] }}"
                                        class="list-group-item list-group-item-action bg-transparent text-body border-0 ps-5 py-2 small">
                                        {{ $category['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                </div>
        </div>
    </div>
</header>
