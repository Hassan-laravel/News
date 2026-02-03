<!-- slider up -->
    <div class="container py-4">
        <div class="row g-4">

            <div class="col-lg-8">
                <div id="heroCarousel" class="carousel slide h-100 shadow-sm rounded-3 overflow-hidden"
                    data-bs-ride="carousel">

                    <div class="carousel-indicators mb-0 pb-3 gap-2">
                        @foreach (array_slice($posts, 0, 5) as $index => $post)
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                                class="bg-white rounded-circle d-flex align-items-center justify-content-center fw-bold {{ $index == 0 ? 'active' : '' }}"
                                aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                                style="width: 30px; height: 30px; font-size: 0.8rem; color: #000; opacity: 1;">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>

                    <div class="carousel-inner h-100">
                        @foreach (array_slice($posts, 0, 5) as $index => $post)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }} h-100" data-bs-interval="2000">
                                <a href="{{ url('/post/' . $post['slug']) }}" class="text-decoration-none">
                                    <img src="{{ $post['main_image'] }}" class="d-block w-100 object-fit-cover"
                                        style="height: 450px;" alt="{{ $post['title'] }}">
                                    <div
                                        class="carousel-caption d-none d-md-block text-end start-0 end-0 px-4 bg-dark bg-opacity-50 w-100 mb-0 pb-5">
                                        <h2 class="fw-bold fs-3 mb-2">{{ $post['title'] }}</h2>
                                        <p class="small opacity-75">
                                            {{ Str::limit(strip_tags($post['excerpt'] ?? $post['content']), 100) }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="d-flex flex-column gap-3 h-100">
                    @foreach (array_slice($posts, 1, 4) as $post)
                        <div class="card border-0 shadow-sm overflow-hidden flex-fill">
                            <a href="{{ url('/post/' . $post['slug']) }}"
                                class="text-decoration-none d-flex align-items-center h-100">
                                <div class="row g-0 w-100 align-items-center">
                                    <div class="col-8 p-3">
                                        <h6 class="card-title fw-bold text-dark mb-0 small lh-base">
                                            {{ Str::limit($post['title'], 60) }}
                                        </h6>
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ $post['main_image'] }}" class="img-fluid h-100 object-fit-cover"
                                            style="min-height: 80px;" alt="{{ $post['title'] }}">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
