<header class="sticky-top">

<div class="bg-light border-bottom py-2">
    <div class="container d-flex flex-wrap justify-content-between align-items-center small">

        <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start mb-2 mb-md-0">
            @foreach ($pages as $page)
                <a class="text-decoration-none text-secondary fw-medium" href="{{ route('page', $page['slug']) }}">
                    {{ $page['title'] }}
                </a>
            @endforeach
            <a class="text-decoration-none text-secondary fw-medium" href="{{ route('contact') }}">contact</a>
        </div>

        <div class="d-flex align-items-center justify-content-center justify-content-md-end gap-3 flex-grow-1 flex-md-grow-0">

            <div class="d-flex align-items-center gap-2 border-start ps-3 ms-1 d-none d-sm-flex">
                <a href="https://facebook.com" target="_blank" class="text-secondary"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com" target="_blank" class="text-secondary"><i class="bi bi-twitter-x"></i></a>
                <a href="https://instagram.com" target="_blank" class="text-secondary"><i class="bi bi-instagram"></i></a>
                <a href="https://youtube.com" target="_blank" class="text-secondary"><i class="bi bi-youtube"></i></a>
            </div>

            <div class="d-flex align-items-center gap-2 border-start ps-3">
           <!-- Language Switch -->
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        🌐 {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
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
                <button class="btn btn-sm btn-outline-dark py-0 px-2" onclick="toggleTheme()" style="font-size: 0.8rem;">🌙</button>
            </div>
        </div>
    </div>
</div>

    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                 {{ $settings['website_name'] }}
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#categoryNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="categoryNav" class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto gap-lg-3 text-center">
                    @if (empty($categories))
                        <p>لا توجد تصنيفات متاحة حالياً.</p>
                    @else
                        @forelse($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link fw-medium" href="/category/{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </a>
                            </li>
                        @empty
                            <li class="nav-item">
                                <span class="nav-link text-muted">{{ __('site.no_categories') }}</span>
                            </li>
                        @endforelse
                    @endif
                </ul>
            </div>

            <div>
                <a class="navbar-brand" href="{{ url(app()->getLocale()) }}">
                    @if ($settings['logo'])
                        <img src="{{ $settings['logo'] }}" alt="{{ $settings['website_name'] }}" height="40">
                    @else
                        {{ $settings['website_name'] }}
                    @endif
                </a>
            </div>
        </div>
    </nav>
</header>
