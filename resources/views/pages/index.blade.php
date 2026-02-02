@extends('layouts.app')

@section('content')
<div class="page-header py-5 bg-light mb-5 shadow-sm">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">{{ $page['title'] }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="/">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a></li>
                <li class="breadcrumb-item active">{{ $page['title'] }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            @if($page['image'])
                <div class="main-page-image mb-5">
                    <img src="{{ $page['image'] }}" class="img-fluid rounded-4 shadow-lg w-100" alt="{{ $page['title'] }}">
                </div>
            @endif

            <div class="page-content fs-5 mb-5">
                {!! $page['content'] !!}
            </div>

            @if(!empty($page['gallery']))
                <hr class="my-5">
                <h3 class="mb-4 text-center fw-bold">{{ app()->getLocale() == 'ar' ? 'معرض الصور' : 'Photo Gallery' }}</h3>
                <div class="photo-gallery">
                    @foreach($page['gallery'] as $img)
                        <div class="gallery-item">
                            <a href="{{ $img['url'] }}" data-fancybox="gallery">
                                <img src="{{ $img['url'] }}" alt="Gallery Image" class="rounded-3 shadow-sm">
                                <div class="overlay"><i class="bi bi-zoom-in"></i></div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* تنسيق المحتوى */
    .page-content { line-height: 1.9; color: #444; text-align: justify; }

    /* تنسيق معرض الصور المنسق */
    .photo-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 15px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        height: 200px;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-item .overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 123, 255, 0.4);
        display: flex; align-items: center; justify-content: center;
        opacity: 0; transition: 0.3s; color: white; font-size: 2rem;
    }

    .gallery-item:hover img { transform: scale(1.1); }
    .gallery-item:hover .overlay { opacity: 1; }

    .main-page-image img { max-height: 450px; object-fit: cover; }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox='gallery']", {});
</script>
@endsection
