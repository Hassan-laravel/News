<!doctype html>
{{-- Dynamically set page direction and language based on application settings --}}
<html lang="{{ app()->getLocale() }}"
      dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
      data-bs-theme="light">
<head>
    {{-- Asset loading logic for RTL/LTR support --}}
    @if(app()->getLocale() == 'ar')
        {{-- Load Bootstrap RTL for Arabic support --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
        {{-- خط تجوال للعربية --}}
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    @else
        {{-- Load Standard LTR Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        {{-- خط Inter للإنجليزية - عصري وأنيق جداً للمواقع التقنية والإخبارية --}}
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @endif
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
        :root {
            --base-font-size: 1.1rem; /* قللت الحجم قليلاً ليتناسب مع الخطوط الأجنبية */
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            /* التبديل الذكي للخطوط */
            font-family: {{ app()->getLocale() == 'ar' ? "'Tajawal', sans-serif" : "'Inter', sans-serif" }} !important;
            font-size: var(--base-font-size) !important;
            line-height: 1.6;
        }

        /* تحسينات إضافية للأرقام والعناوين */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700 !important;
        }

        main { flex: 1; }
        footer { background-color: #f8f9fa; padding: 20px 0; margin-top: auto; }

        /* تدرج أحجام العناوين */
        h1 { font-size: calc(var(--base-font-size) * 2.2) !important; }
        h2 { font-size: calc(var(--base-font-size) * 1.8) !important; }
        /* ... باقي التنسيقات ... */
    </style>
</head>

<body>
{{-- Maintenance Mode Logic --}}
{{-- @if($settings['maintenance_mode'])
    <div class="alert alert-warning text-center mb-0">
        The site is currently undergoing scheduled maintenance.
    </div>
@else --}}

@include('partials.navbar')



<main class="bg-light py-5 min-vh-100">
    <div class="container">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-4"> {{-- Set p-0 if you want to remove internal margins --}}
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
