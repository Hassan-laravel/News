@extends('layouts.app')

@section('title', __('site.latest_news'))

@section('content')
<h1 class="mb-4">{{ __('site.site_name') }}</h1>

<div class="row g-4">
{{-- <div class="filter-bar">
    @foreach($categories as $category)
        <a href="?category={{ $category['slug'] }}"
           class="{{ request('category') == $category['slug'] ? 'active' : '' }}">
            {{ $category['name'] }}
        </a>
    @endforeach
</div> --}}

<hr>

{{-- <div class="news-grid">
    @forelse($posts as $post)
        <div class="post-card">
            <img src="{{ $post['main_image'] }}" alt="{{ $post['title'] }}">
            <h3>{{ $post['title'] }}</h3>
            <p>{{ Str::limit($post['content'], 100) }}</p>
            <a href="/{{ app()->getLocale() }}/post/{{ $post['slug'] }}">اقرأ المزيد</a>
        </div>
    @empty
        <p>لا توجد أخبار متاحة حالياً في هذا القسم.</p>
    @endforelse
</div> --}}

</div>
@endsection
