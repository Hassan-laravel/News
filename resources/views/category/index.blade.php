@extends('layouts.app')

@section('content')
    <div class="container py-5" x-data="{
    search: '',
    // This function controls the visibility of posts based on the search input
    postMatches(title, content) {
        if (!this.search) return true;
        let s = this.search.toLowerCase();
        return title.toLowerCase().includes(s) || content.toLowerCase().includes(s);
    }
}">
<style>
    /* Prevent Alpine.js "flash" before initialization */
    [x-cloak] { display: none !important; }

    /* Force enable transitions even if the theme settings disable them */
    .col-12[x-show] {
        transition: all 0.5s ease-in-out;
    }

    /* Additional styling to ensure smooth grid movement */
    .row.g-4 {
        transition: all 0.5s ease;
    }
</style>

    <div class="row align-items-center mb-5">
        <div class="col-md-6 text-center text-md-start">
            <h2 class="fw-bold mb-3 mb-md-0">{{ $categoryName }}</h2>
        </div>
        <div class="col-md-6">
            <div class="search-wrapper">
                <i class="bi bi-search search-icon"></i>
                <input type="text"
                       x-model.debounce.200ms="search"
                       placeholder="{{ __('messages.search_placeholder') }}"
                       class="form-control shadow-sm">
            </div>
        </div>
    </div>

   <div class="row g-4">
    @foreach($posts as $post)
        {{-- Added x-cloak and inline style for Alpine.js transitions --}}
        <div class="col-12 col-md-6 col-lg-3 mb-4"
             x-show="postMatches('{{ addslashes($post['title']) }}', '{{ addslashes(strip_tags($post['content'] ?? '')) }}')"
             x-transition.duration.500ms
             x-cloak
             style="display: block;">

            <div class="card h-100 news-card border-0 shadow-sm">
                <div class="image-wrapper">
                    <img src="{{ $post['main_image'] }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $post['title'] }}</h5>
                    <p class="card-text text-muted small">
                        {{ Str::limit(strip_tags($post['excerpt'] ?? $post['content']), 80) }}
                    </p>
                    <a href="{{ url('/post/' . $post['slug']) }}" class="btn btn-primary-custom mt-auto">
                        {{ __('messages.read_more') }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
