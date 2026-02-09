<!doctype html>
{{-- تحديد اتجاه الصفحة واللغة ديناميكياً --}}
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- التحكم بالعنوان ديناميكياً --}}
    <title>@yield('title') | {{ $settings['website_name'] }}</title>
    <meta name="description" content="@yield('meta_description', $settings['website_name'])">
    <meta name="keywords" content="@yield('meta_keywords', $settings['website_name'])">


    <meta property="og:site_name" content="{{ $settings['website_name'] }}">
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="@yield('title') | {{ $settings['website_name'] }}" />
    <meta property="og:description" content="@yield('meta_description', $settings['website_name'])" />
    <meta property="og:image" content="@yield('og_image', asset('assets/img/default-share.jpg'))" />

    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:type" content="image/webp" />
    {{-- <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title') | {{ config('app.name') }}">
    <meta name="twitter:description" content="@yield('meta_description', 'تدريب - تطوير - استشارات')"> --}}
    {{-- استدعاء ملفات Vite (CSS & JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- منطق استدعاء ملفات الستايل والخطوط --}}
    @if (app()->getLocale() == 'ar')
        {{-- Bootstrap RTL للعربية --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Tajawal', sans-serif;
            }
        </style>
    @else
        {{-- Bootstrap LTR للإنجليزية --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    {{-- يمكنك تفعيل وضع الصيانة هنا لاحقاً --}}

    @include('partials.navbar')

    <main class="bg-light py-5 min-vh-100">
        <div class="container">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-4">
                    {{-- عرض محتوى الصفحة --}}
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

    {{-- السكربتات --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script>
        // دالة تحديث أيقونة الثيم
        function updateThemeIcon(theme) {
            const themeIcons = document.querySelectorAll('.theme-icon');
            themeIcons.forEach(icon => {
                if (theme === 'dark') {
                    icon.classList.replace('bi-moon-stars', 'bi-sun-fill');
                } else {
                    icon.classList.replace('bi-sun-fill', 'bi-moon-stars');
                }
            });
        }

        // دالة التبديل بين الداكن والفاتح
        function toggleTheme() {
            const htmlElement = document.documentElement;
            const currentTheme = htmlElement.getAttribute('data-bs-theme') || 'light';
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';

            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        }

        // تطبيق الثيم المحفوظ عند التحميل
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
            window.addEventListener('DOMContentLoaded', () => {
                updateThemeIcon(savedTheme);
            });
        })();
    </script>
</body>

</html>
