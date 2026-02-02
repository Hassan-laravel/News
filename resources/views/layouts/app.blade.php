<!doctype html>
{{-- تحديد اتجاه الصفحة واللغة ديناميكياً بناءً على إعداداتنا --}}
<html lang="{{ app()->getLocale() }}"
      dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
      data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Multi-Lang') }}</title>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>



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
{{-- @if($settings['maintenance_mode'])
    <div class="alert alert-warning text-center mb-0">
        الموقع حالياً في وضع الصيانة المجدولة.
    </div>
@else --}}
@include('partials.navbar')

<main class="container my-4 fade-in">
  @yield('content')
</main>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('assets/js/theme.js') }}"></script>
{{-- @endif --}}
</body>
</html>
