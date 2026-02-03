@if(!empty($post['gallery']))
<div class="container my-5 text-end" dir="rtl">
    <h3 class="fw-bold mb-4 border-bottom border-primary border-3 d-inline-block pb-2">
        {{ app()->getLocale() == 'ar' ? 'معرض الصور' : 'Photo Gallery' }}
    </h3>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div id="postGallerySlider" class="carousel slide shadow rounded-4 overflow-hidden bg-dark" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($post['gallery'] as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#lightboxModal{{ $index }}">
                                <img src="{{ $image['url'] }}" class="d-block w-100 object-fit-contain" style="height: 500px;" alt="gallery image">
                            </a>
                        </div>

                        <div class="modal fade" id="lightboxModal{{ $index }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content bg-transparent border-0">
                                    <div class="modal-header border-0 p-0">
                                        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0 text-center">
                                        <img src="{{ $image['url'] }}" class="img-fluid rounded-3 shadow-lg" alt="expanded image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#postGallerySlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon p-3 bg-dark bg-opacity-25 rounded-circle" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#postGallerySlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon p-3 bg-dark bg-opacity-25 rounded-circle" aria-hidden="true"></span>
                </button>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-3 justify-content-center">
                @foreach($post['gallery'] as $index => $image)
                    <button type="button" data-bs-target="#postGallerySlider" data-bs-slide-to="{{ $index }}"
                            class="btn p-0 border rounded-2 overflow-hidden shadow-sm {{ $index == 0 ? 'border-primary border-2' : '' }}"
                            style="width: 80px; height: 60px;">
                        <img src="{{ $image['url'] }}" class="w-100 h-100 object-fit-cover" alt="thumbnail">
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
