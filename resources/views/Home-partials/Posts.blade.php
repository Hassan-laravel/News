<div class="container py-4">
    @foreach($categories as $category)
        @php
            // Filter posts: Check if the current category ID exists within the post's categories array
            $categoryPosts = array_filter($posts, function($post) use ($category) {
                // Verify that the 'categories' key exists in the post and is an array
                if (isset($post['categories']) && is_array($post['categories'])) {
                    // Search for the current category ID within the post's categories column
                    return in_array($category['id'], array_column($post['categories'], 'id'));
                }
                return false;
            });
        @endphp

        {{-- Only display the section if it contains posts --}}
        @if(count($categoryPosts) > 0)
            <div class="category-section mb-5">

                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                    <h3 class="fw-bold m-0 position-relative">
                        {{ $category['name'] }}
                        <span class="position-absolute bottom-0 start-0 bg-primary" style="height: 3px; width: 60px; margin-bottom: -9px;"></span>
                    </h3>
                    <a href="{{ url('/category/' . $category['id']) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        {{ __('site.more') }} <i class="bi bi-chevron-right"></i>
                    </a>
                </div>

                <div class="row g-4">
                    {{-- Limit the display to the first 4 posts of the category --}}
                    @foreach(array_slice($categoryPosts, 0, 4) as $post)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm overflow-hidden news-card">
                                <a href="{{ url('/post/' . $post['slug']) }}" class="text-decoration-none text-dark">
                                    <div class="position-relative" style="height: 180px;">
                                        <img src="{{ $post['main_image'] }}" class="w-100 h-100 object-fit-cover transition-img" alt="{{ $post['title'] }}">
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="fw-bold lh-base mb-2" style="height: 2.8em; overflow: hidden;">
                                            {{ $post['title'] }}
                                        </h6>
                                        <div class="text-muted small">
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
