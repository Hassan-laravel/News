@extends('layouts.app')

@section('content')
    <article class=" ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <h1 class="display-4 fw-bold mb-3">{{ $post['title'] }}</h1>

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
    </style>
@endsection
