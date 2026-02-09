@extends('layouts.app')
@section('title', $post['title'] . ' | ' . ($post['categories'][0]['name'] ))
@section('meta_description', $post['meta']['keywords'] ?? $post['title'])
@section('meta_keywords',  $post['meta']['description'] ?? $post['title'])
@section('og_image', $post['main_image'])
@section('content')
    <article class=" ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <h5 class="display-7 fw-bold mb-3">{{ $post['categories'][0]['name']}}</h5> <h1 class="display-4 fw-bold mb-3">{{ $post['title'] }}</h1>

                    <div class="post-meta mb-4 text-muted d-flex align-items-center gap-3">
                        <span><i class="bi bi-person"></i> {{ $post['author'] }}</span>
                        <span><i class="bi bi-calendar"></i> {{ $post['created_at'] }}</span>
                    </div>

                    <div class="main-image-wrapper mb-5 shadow rounded overflow-hidden">
                        <img src="{{ $post['main_image'] }}" class="img-fluid w-100" alt="{{ $post['title'] }}">
                    </div>

                    <div class="post-content fs-5 leading-relaxed mb-5">
                        {!! $post['content'] !!}
                    </div>
                    {{-- Show gallery --}}
                    @include('post.gallery')
                    {{-- Show gallery --}}


                </div>
            </div>
        </div>
    </article>
<div class="share-sidebar d-flex flex-column gap-2 shadow-sm p-2 rounded-pill bg-white">
    {{-- فيسبوك --}}
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="share-link fb" title="Share on Facebook">
        <i class="bi bi-facebook"></i>
    </a>

    {{-- تويتر / X --}}
    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($post['title']) }}" target="_blank" class="share-link tw" title="Share on X">
        <i class="bi bi-twitter-x"></i>
    </a>

    {{-- واتساب --}}
    <a href="https://api.whatsapp.com/send?text={{ urlencode($post['title']) }}%20{{ url()->current() }}" target="_blank" class="share-link wa" title="Share on WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    {{-- تليجرام --}}
    <a href="https://t.me/share/url?url={{ url()->current() }}&text={{ urlencode($post['title']) }}" target="_blank" class="share-link tg" title="Share on Telegram">
        <i class="bi bi-telegram"></i>
    </a>
</div>
    <style>
        .post-details {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .post-content {
            line-height: 1.8;
            color: #333;
            text-align: justify;
        }

        .main-image-wrapper img {
            max-height: 500px;
            object-fit: cover;
        }

        .post-meta i {
            color: #007bff;
        }

        .shadow-hover:hover {
            transform: scale(1.05);
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        /* تنسيق المحتوى ليدعم فقرات الـ HTML القادمة من الـ API */
        .post-content p {
            margin-bottom: 1.5rem;
        }




        /* التنسيق الأساسي للقائمة العائمة */
.share-sidebar {
    position: fixed;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1000;
    /* هذا الجزء هو السحر: يغير مكانه حسب لغة الصفحة */
    @if(app()->getLocale() == 'ar')
        left: 20px; /* في العربية يظهر على اليسار */
    @else
        right: 20px; /* في الإنجليزية يظهر على اليمين */
    @endif
}

.share-link {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 1.2rem;
}

.share-link:hover {
    transform: scale(1.1);
    color: white;
}

/* ألوان المنصات */
.fb { background-color: #1877F2; }
.tw { background-color: #000000; }
.wa { background-color: #25D366; }
.tg { background-color: #0088cc; }

/* إخفاء القائمة في الشاشات الصغيرة جداً لتجنب تداخلها مع النص */
@media (max-width: 768px) {
    .share-sidebar {
        position: static;
        flex-direction: row !important;
        justify-content: center;
        margin-bottom: 20px;
        transform: none;
        box-shadow: none !important;
    }
}
    </style>
@endsection
