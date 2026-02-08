<header class="sticky-top shadow-sm">
    <div class="bg-light border-bottom py-2 d-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center small">

            <div class="d-flex align-items-center gap-4">
                <div class="d-flex gap-3 border-end pe-3">
                    @foreach ($pages as $page)
                        <a class="text-decoration-none text-secondary fw-medium"
                            href="{{ route('page', $page['slug']) }}">
                            {{ $page['title'] }}
                        </a>
                    @endforeach
                    <a class="text-decoration-none text-secondary fw-medium"
                        href="{{ route('contact') }}">{{ __('site.contact_us') }}</a>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <a href="https://facebook.com" target="_blank" class="text-secondary hover-primary"><i
                            class="bi bi-facebook"></i></a>
                    <a href="https://twitter.com" target="_blank" class="text-secondary hover-primary"><i
                            class="bi bi-twitter-x"></i></a>
                    <a href="https://instagram.com" target="_blank" class="text-secondary hover-primary"><i
                            class="bi bi-instagram"></i></a>
                    <a href="https://youtube.com" target="_blank" class="text-secondary hover-primary"><i
                            class="bi bi-youtube"></i></a>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="dropdown border-start ps-3">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle border-0 shadow-none"
                        data-bs-toggle="dropdown">
                        🌐 {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        @foreach (config('language.supported') as $langKey => $langData)
                            <li>
                                <a class="dropdown-item @if (app()->getLocale() == $langKey) active @endif"
                                    href="{{ route('switch.language', $langKey) }}">
                                    {{ $langData['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <button class="btn btn-sm text-secondary p-0 ms-1" onclick="toggleTheme()">🌙</button>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-white border-bottom p-2">
        <div class="d-flex align-items-center gap-3">
            <a href="https://facebook.com" target="_blank" class="text-secondary hover-primary"><i
                    class="bi bi-facebook"></i></a>
            <a href="https://twitter.com" target="_blank" class="text-secondary hover-primary"><i
                    class="bi bi-twitter-x"></i></a>
            <a href="https://instagram.com" target="_blank" class="text-secondary hover-primary"><i
                    class="bi bi-instagram"></i></a>
            <a href="https://youtube.com" target="_blank" class="text-secondary hover-primary"><i
                    class="bi bi-youtube"></i></a>
        </div>
        <div class="container d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-2">
                <button class="navbar-toggler border-0 shadow-none d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand fw-bold d-lg-none" href="/">
                    {{ $settings['website_name'] }}
                </a>
            </div>

            <div class="d-flex align-items-center">
                <a class="navbar-brand m-0" href="/">
                    @if ($settings['logo'])
                        <img src="{{ $settings['logo'] }}" alt="{{ $settings['website_name'] }}" height="40">
                    @else
                        <span class="d-none d-lg-inline fw-bold">{{ $settings['website_name'] }}</span>
                    @endif
                </a>
            </div>

            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav mx-auto gap-3">
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link fw-medium text-dark"
                                href="/category/{{ $category['id'] }}">{{ $category['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="d-flex align-items-center gap-2 d-lg-none">
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        🌐 {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        @foreach (config('language.supported') as $langKey => $langData)
                            <li><a class="dropdown-item"
                                    href="{{ route('switch.language', $langKey) }}">{{ $langData['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <button class="btn btn-sm btn-outline-dark" onclick="toggleTheme()">🌙</button>
            </div>

        </div>
    </nav>

    <div class="offcanvas {{ app()->getLocale() == 'ar' ? 'offcanvas-start' : 'offcanvas-start' }} d-lg-none"
        tabindex="-1" id="mobileMenu" style="width: 280px;">
        <div class="offcanvas-header border-bottom bg-light">
            <h5 class="offcanvas-title fw-bold">Menu</h5>
            <button type="button" class="btn-close text-reset shadow-none" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="accordion accordion-flush" id="menuAccordion">

                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold bg-white shadow-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseCats">
                            <i class="bi bi-grid-fill me-2 text-secondary px-2"></i> Categories
                        </button>
                    </h2>
                    <div id="collapseCats" class="accordion-collapse collapse show" data-bs-parent="#menuAccordion">
                        <div class="accordion-body p-0">
                            <div class="list-group list-group-flush">
                                @foreach ($categories as $category)
                                    <a href="/category/{{ $category['id'] }}"
                                        class="list-group-item list-group-item-action border-0 ps-5 py-2 small">
                                        {{ $category['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mt-1">
                    <h2 class="accordion-header border-top">
                        <button class="accordion-button collapsed fw-bold bg-white shadow-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapsePages">
                            <i class="bi bi-link-45deg me-2 text-secondary px-2"></i> Quick Links
                        </button>
                    </h2>
                    <div id="collapsePages" class="accordion-collapse collapse" data-bs-parent="#menuAccordion">
                        <div class="accordion-body p-0 border-bottom">
                            <div class="list-group list-group-flush">
                                @foreach ($pages as $page)
                                    <a class="list-group-item list-group-item-action border-0 ps-5 py-2 small"
                                        href="{{ route('page', $page['slug']) }}">
                                        {{ $page['title'] }}
                                    </a>
                                @endforeach
                                <a class="list-group-item list-group-item-action border-0 ps-5 py-2 small"
                                    href="{{ route('contact') }}">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
