<div class="container py-4">
    @foreach($categories as $category)
        @php
            $categoryPosts = array_filter($posts, function($post) use ($category) {
                if (isset($post['categories']) && is_array($post['categories'])) {
                    return in_array($category['id'], array_column($post['categories'], 'id'));
                }
                return false;
            });
        @endphp

        @if(count($categoryPosts) > 0)
            <div class="category-section mb-5">
                {{-- العناوين: تم تغيير border-bottom و text color ليدعم الثيم --}}
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-secondary-subtle pb-2">
                    <h3 class="fw-bold m-0 position-relative text-body">
                        {{ $category['name'] }}
                        {{-- الخط الملون تحت العنوان --}}
                        <span class="position-absolute bottom-0 start-0 bg-primary" style="height: 3px; width: 60px; margin-bottom: -9px;"></span>
                    </h3>
                    <a href="{{ url('/category/' . $category['id']) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        {{ __('site.more') }} <i class="bi bi-chevron-right small"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach(array_slice($categoryPosts, 0, 4) as $post)
                        <div class="col-12 col-md-6 col-lg-3">
                            {{-- الكرت: تم استخدام bg-body ليتغير لونه تلقائياً و text-body للنصوص --}}
                            <div class="card h-100 border-0 shadow-sm overflow-hidden news-card bg-body transition-all">
                                <a href="{{ url('/post/' . $post['slug']) }}" class="text-decoration-none">
                                    <div class="position-relative" style="height: 180px;">
                                        <img src="{{ $post['main_image'] }}" class="w-100 h-100 object-fit-cover transition-img" alt="{{ $post['title'] }}">
                                    </div>
                                    <div class="card-body p-3">
                                        {{-- عنوان المقال: text-body يجعله أبيض في الليل وأسود في النهار --}}
                                        <h6 class="fw-bold lh-base mb-2 text-body" style="height: 2.8em; overflow: hidden;">
                                            {{ $post['title'] }}
                                        </h6>
                                        {{-- الوقت: text-body-secondary للون رمادي خفيف يتناسب مع الجهتين --}}
                                        <div class="text-body-secondary small">
                                            <i class="bi bi-clock me-1"></i>
                                            {{ \Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
</div>
