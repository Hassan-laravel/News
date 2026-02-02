<header class="sticky-top">

    <!-- الشريط العلوي: صفحات + لغة + Dark Mode -->
    <div class="bg-light border-bottom py-1">
        <div class="container d-flex justify-content-between align-items-center small">

            <!-- روابط الصفحات -->
            <div class="d-flex gap-3">
                @foreach ($pages as $page)
                    <a class="text-decoration-none text-secondary" href="{{ route('page', $page['slug']) }}">
                        {{ $page['title'] }}
                    </a>
                @endforeach
                <a class="text-decoration-none text-secondary" href="{{ route('contact') }}">contact</a>
            </div>

            <!-- Language + Dark Mode -->
            <div class="d-flex align-items-center gap-2">

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

                <!-- Dark Mode Toggle -->
                <button class="btn btn-sm btn-outline-dark" onclick="toggleTheme()">🌙</button>

            </div>
        </div>
    </div>

    <!-- شريط التصنيفات -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">

            <!-- الشعار -->
            <a class="navbar-brand fw-bold" href="/">
                 {{ $settings['website_name'] }}
            </a>

            <!-- Toggle للـ mobile -->
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#categoryNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- قائمة التصنيفات -->
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
            <div><a class="navbar-brand" href="{{ url(app()->getLocale()) }}">
                    @if ($settings['logo'])
                        <img src="{{ $settings['logo'] }}" alt="{{ $settings['website_name'] }}" height="40">
                    @else
                        {{ $settings['website_name'] }}
                    @endif
                </a></div>
        </div>
    </nav>

</header>
