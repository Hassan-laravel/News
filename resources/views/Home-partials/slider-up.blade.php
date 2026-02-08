<div class="container py-4">
    <div class="row g-4">

        {{-- القسم الأيسر: السلايدر الرئيسي --}}
        <div class="col-lg-8">
            <div id="heroCarousel" class="carousel slide h-100 shadow-sm rounded-3 overflow-hidden border border-secondary-subtle"
                data-bs-ride="carousel">

                {{-- مؤشرات السلايدر: استخدام كلاسات متوافقة مع الثيم للأرقام --}}
                <div class="carousel-indicators mb-0 pb-3 gap-2">
                    @foreach (array_slice($posts, 0, 5) as $index => $post)
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                            class="rounded-circle d-flex align-items-center justify-content-center fw-bold {{ $index == 0 ? 'active' : '' }}"
                            aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                            style="width: 30px; height: 30px; font-size: 0.8rem; opacity: 1; border: 2px solid white; background-color: rgba(255,255,255,0.8); color: #000;">
                            {{ $index + 1 }}
                        </button>
                    @endforeach
                </div>

                <div class="carousel-inner h-100">
                    @foreach (array_slice($posts, 0, 5) as $index => $post)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }} h-100" data-bs-interval="3000">
                            <a href="{{ url('/post/' . $post['slug']) }}" class="text-decoration-none">
                                <img src="{{ $post['main_image'] }}" class="d-block w-100 object-fit-cover transition-img"
                                    style="height: 450px;" alt="{{ $post['title'] }}">

                                {{-- الوصف فوق الصورة: استخدام خلفية داكنة ثابتة (نظام العربية) لجعل النص أبيض دائماً فوق الصور --}}
                                <div class="carousel-caption d-none d-md-block text-end start-0 end-0 px-4 bg-dark bg-opacity-50 w-100 mb-0 pb-5 translate-middle-y shadow-lg">
                                    <h2 class="fw-bold fs-3 mb-2 text-white">{{ $post['title'] }}</h2>
                                    <p class="small opacity-75 text-white-50">
                                        {{ Str::limit(strip_tags($post['excerpt'] ?? $post['content']), 100) }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- القسم الأيمن: المقالات الجانبية --}}
        <div class="col-lg-4">
            <div class="d-flex flex-column gap-3 h-100">
                @foreach (array_slice($posts, 1, 4) as $post)
                    {{-- البطاقة: استخدام bg-body و border-secondary-subtle --}}
                    <div class="card border-0 border-bottom border-secondary-subtle shadow-sm overflow-hidden flex-fill bg-body transition-all">
                        <a href="{{ url('/post/' . $post['slug']) }}"
                            class="text-decoration-none d-flex align-items-center h-100">
                            <div class="row g-0 w-100 align-items-center">
                                <div class="col-8 p-3">
                                    {{-- عنوان المقال: text-body ليتغير لونه مع الثيم --}}
                                    <h6 class="card-title fw-bold text-body mb-0 small lh-base">
                                        {{ Str::limit($post['title'], 60) }}
                                    </h6>
                                </div>
                                <div class="col-4">
                                    <img src="{{ $post['main_image'] }}" class="img-fluid h-100 object-fit-cover"
                                        style="min-height: 85px; max-height: 85px;" alt="{{ $post['title'] }}">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
