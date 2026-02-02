<!doctype html>
{{-- تحديد اتجاه الصفحة واللغة ديناميكياً بناءً على إعداداتنا --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ config('language.supported.' . app()->getLocale() . '.dir', 'ltr') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Multi-Lang') }}</title>

    {{-- منطق استدعاء ملفات الستايل --}}
    @if(config('language.supported.' . app()->getLocale() . '.dir') == 'rtl')
        {{-- استدعاء ملف البوتستراب الخاص باللغة العربية RTL --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    @else
        {{-- استدعاء ملف البوتستراب القياسي LTR --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @endif

    <style>
        body { min-height: 100vh; display: flex; flex-direction: column; }
        main { flex: 1; }
        footer { background-color: #f8f9fa; padding: 20px 0; margin-top: auto; }
    </style>
</head>
<body>

    {{-- الهيدر (Navbar) --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Laravel 12</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">{{ __('messages.home') ?? 'Home' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('messages.articles') ?? 'Articles' }}</a>
                    </li>
                </ul>

                {{-- القائمة المنسدلة لتبديل اللغة --}}
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{-- عرض اسم اللغة الحالية --}}
                            {{ config('language.supported.' . app()->getLocale() . '.name') }}
                             ({{ strtoupper(app()->getLocale()) }})
                        </a>
                        <ul class="dropdown-menu">
                            {{-- حلقة تكرارية لجلب كل اللغات من ملف الإعدادات --}}
                            @foreach(config('language.supported') as $langKey => $langData)
                                <li>
                                    <a class="dropdown-item @if(app()->getLocale() == $langKey) active @endif"
                                       href="{{ route('switch.language', $langKey) }}">
                                        {{ $langData['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- محتوى الصفحة المتغير --}}
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- الفوتر --}}
    <footer class="text-center text-muted">
        <div class="container">
            &copy; {{ date('Y') }} Laravel Project. {{ __('messages.all_rights_reserved') ?? 'All rights reserved.' }}
        </div>
    </footer>

    {{-- ملفات الجافاسكربت --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
