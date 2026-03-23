@extends('layouts.app')

@section('content')

    <!-- GALLERY SECTION - Fixed Size Cards + Visible Tabs -->
    <section id="gallery" class="py-5 py-lg-6 bg-dark-2 position-relative overflow-hidden">
        <div class="container position-relative z-2">
            <!-- Heading -->
            <div class="text-center mb-5 mb-lg-6">
                <h2 class="section-title display-4 fw-bold mb-3">
                    Our <span style="color: var(--accent);">Magical Moments</span>
                </h2>
                <p class="lead text-white-75 mx-auto" style="max-width: 720px;">
                    Glimpses of joy, creativity, and unforgettable celebrations we've crafted
                </p>
            </div>

            <!-- Centered Tabs - Now clearly visible -->
            <div class="d-flex justify-content-center mb-5 mb-lg-6">
                <div class="btn-group btn-group-lg shadow-lg rounded-pill overflow-hidden" role="group">
                    <button type="button" class="btn tab-btn active px-5 py-3" data-tab="images">
                        <i class="fa-solid fa-images me-2"></i> Images
                    </button>
                    <button type="button" class="btn tab-btn px-5 py-3" data-tab="videos">
                        <i class="fa-solid fa-video me-2"></i> Videos
                    </button>
                </div>
            </div>

            <!-- Images Tab (Default) -->
            <div id="images-tab" class="gallery-tab active">
                <div class="row g-3 g-lg-4">

                    @forelse($images as $image)

                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-card glass rounded-4 overflow-hidden shadow-lg position-relative">

                                <div class="image-wrapper">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid"
                                        alt="{{ $image->title }}" loading="lazy">
                                </div>

                            </div>
                        </div>

                    @empty

                        <div class="text-center text-white-75">
                            No Images Available
                        </div>

                    @endforelse

                </div>
            </div>

            <div id="videos-tab" class="gallery-tab d-none">
                <div class="row g-4 g-lg-5">

                    @forelse($videos as $video)

                        @php
                            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $video->video, $matches);
                            $videoId = $matches[1] ?? null;
                        @endphp

                        <div class="col-md-6 col-lg-4">
                            <div class="video-card glass rounded-4 overflow-hidden shadow-lg position-relative cursor-pointer">

                                <div class="ratio ratio-16x9">
                                    @if($videoId)
                                        <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" class="img-fluid"
                                            alt="{{ $video->title }}">
                                    @else
                                        <div class="bg-dark text-white text-center p-5">
                                            Invalid Video
                                        </div>
                                    @endif
                                    <div class="play-overlay position-absolute top-50 start-50 translate-middle">
                                        <i class="fa-solid fa-circle-play fa-4x text-white drop-shadow"></i>
                                    </div>
                                </div>

                                <div class="p-4 text-center">
                                    <h5 class="fw-bold mb-2" style="color: var(--accent);">
                                        {{ $video->title }}
                                    </h5>
                                    <p class="text-white-75 small mb-0">
                                        {{ $video->description ?? '' }}
                                    </p>
                                </div>

                                <div class="d-none video-id">{{ $videoId }}</div>

                            </div>
                        </div>

                    @empty

                        <div class="text-center text-white-75">
                            No Videos Available
                        </div>

                    @endforelse

                </div>
            </div>
        </div>

        <!-- Image Lightbox Modal -->
        <div class="modal fade" id="imageLightbox" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-body p-0 position-relative">
                        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-4 z-3"
                            data-bs-dismiss="modal"></button>
                        <img id="lightboxImage" src="" class="img-fluid rounded-3 shadow-2xl" alt="Gallery Image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-dark border-0 overflow-hidden rounded-4">
                    <div class="modal-header border-0 pb-0">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe id="videoIframe" src="" title="Party Video" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>

        // Tab Switching
        document.addEventListener('click', function (e) {
            if (e.target.closest('.tab-btn')) {
                const btn = e.target.closest('.tab-btn');

                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                document.querySelectorAll('.gallery-tab').forEach(tab => {
                    tab.classList.add('d-none');
                    tab.classList.remove('active');
                });

                document.getElementById(btn.dataset.tab + '-tab').classList.remove('d-none');
                document.getElementById(btn.dataset.tab + '-tab').classList.add('active');
            }
        });


        // Image Lightbox (FIXED)
        document.addEventListener('click', function (e) {
            if (e.target.matches('.gallery-card img')) {
                document.getElementById('lightboxImage').src = e.target.src;
                new bootstrap.Modal(document.getElementById('imageLightbox')).show();
            }
        });


        // Video Modal (FIXED)
        document.addEventListener('click', function (e) {
            const card = e.target.closest('.video-card');

            if (card) {
                const videoId = card.querySelector('.video-id')?.textContent;

                if (videoId) {
                    document.getElementById('videoIframe').src =
                        `https://www.youtube.com/embed/${videoId}?autoplay=1`;

                    new bootstrap.Modal(document.getElementById('videoModal')).show();
                }
            }
        });


        // Stop video when modal closes
        document.getElementById('videoModal').addEventListener('hidden.bs.modal', () => {
            document.getElementById('videoIframe').src = '';
        });

    </script>

@endsection