@extends('layouts.app')

@section('content')
    <div class="container py-5" x-data="{
    search: '',
    // هذه الدالة ستتحكم في ظهور المقال أو اختفائه
    postMatches(title, content) {
        if (!this.search) return true;
        let s = this.search.toLowerCase();
        return title.toLowerCase().includes(s) || content.toLowerCase().includes(s);
    }
}">
<style>
    /* منع الوميض المفاجئ */
    [x-cloak] { display: none !important; }

    /* فرض تمكين الحركات حتى لو كان هناك إعدادات تعطلها في الثيم */
    .col-12[x-show] {
        transition: all 0.5s ease-in-out;
    }

    /* تنسيق إضافي لضمان نعومة حركة الـ Grid */
    .row.g-4 {
        transition: all 0.5s ease;
    }
</style>
    <h2 class="text-center mb-4 fw-bold">{{ $categoryName }}</h2>

    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <input type="text"
                   x-model.debounce.200ms="search"
                   placeholder="{{ app()->getLocale() == 'ar' ? 'ابحث هنا...' : 'Search here...' }}"
                   class="form-control py-2 shadow-sm">
        </div>
    </div>

   <div class="row g-4">
    @foreach($posts as $post)
        {{-- لاحظ إضافة x-cloak و style --}}
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
                        {{ app()->getLocale() == 'ar' ? 'المزيد' : 'More' }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
