<!doctype html>
{{-- تحديد اتجاه الصفحة واللغة ديناميكياً بناءً على إعداداتنا --}}
<html lang="{{ app()->getLocale() }}"
      dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
      data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Multi-Lang') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>



    {{-- منطق استدعاء ملفات الستايل --}}
    @if(config('language.supported.' . app()->getLocale() . '.dir') == 'rtl')
        {{-- استدعاء ملف البوتستراب الخاص باللغة العربية RTL --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    @else
        {{-- استدعاء ملف البوتستراب القياسي LTR --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @endif

    <style>
        body { min-height: 100vh; display: flex; flex-direction: column; font-family: 'Tajawal', sans-serif !important;}
        main { flex: 1; }
        footer { background-color: #f8f9fa; padding: 20px 0; margin-top: auto; }
        :root {
        /* تحكم هنا في حجم الخط الأساسي للموقع بالكامل */
        --base-font-size: 1.3rem;
    }

    body {
        font-size: var(--base-font-size) !important;
        line-height: 1.6; /* لضمان راحة العين عند القراءة */
    }

    /* تكبير العناوين بشكل متناسب تلقائياً */
    h1 { font-size: calc(var(--base-font-size) * 2.5) !important; }
    h2 { font-size: calc(var(--base-font-size) * 2) !important; }
    h3 { font-size: calc(var(--base-font-size) * 1.75) !important; }
    h4 { font-size: calc(var(--base-font-size) * 1.5) !important; }
    h5 { font-size: calc(var(--base-font-size) * 1.25) !important; }
    h6 { font-size: var(--base-font-size) !important; }

    /* ضبط خاص للنصوص الصغيرة (مثل الفوتر والوصف المصغر) */
    .small, small {
        font-size: calc(var(--base-font-size) * 0.85) !important;
    }
    </style>

</head>

<body>
{{-- @if($settings['maintenance_mode'])
    <div class="alert alert-warning text-center mb-0">
        الموقع حالياً في وضع الصيانة المجدولة.
    </div>
@else --}}
@include('partials.navbar')

<main class="bg-light py-5 min-vh-100">
    <div class="container">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-4"> {{-- p-0 لضمان عدم وجود هوامش داخلية إذا كنت لا تريدها --}}

                @yield('content')

            </div>
        </div>
    </div>
</main>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('assets/js/theme.js') }}"></script>
{{-- @endif --}}
</body>
</html>
