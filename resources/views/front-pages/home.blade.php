@extends('layouts.app')

@section('content')

    <!-- HERO CAROUSEL -->
    <section id="home" class="hero-carousel">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <!-- Sparkles -->
            <div id="sparkles" class="position-absolute w-100 h-100" style="top:0; left:0; z-index:3; overflow:hidden;">
            </div>

            <div class="carousel-inner">

                @forelse($sliders as $index => $slider)

                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"
                        style="background-image: url('{{ asset('storage/' . $slider->image) }}');">

                        <div class="hero-overlay position-absolute w-100 h-100 d-flex align-items-center">
                            <div class="container text-white">
                                <div class="row">
                                    <div class="col-lg-8">

                                        <!-- TITLE -->
                                        <h1 class="display-3 fw-bold hero-text mb-3"
                                            style="text-shadow: 0 5px 30px rgba(0,0,0,0.6);">
                                            {!! $slider->title !!}
                                        </h1>

                                        <!-- SUBTITLE -->
                                        <p class="lead mb-4 fs-4" style="text-shadow: 0 3px 15px rgba(0,0,0,0.6);">
                                            {{ $slider->subtitle }}
                                        </p>

                                        <!-- BUTTONS -->
                                        <div class="d-flex gap-3 flex-wrap">

                                            @if($slider->button_text)
                                                <a href="{{ $slider->button_link ?? '#' }}" class="btn magic-btn btn-lg px-5 py-3">
                                                    {{ $slider->button_text }}
                                                </a>
                                            @endif

                                        </div>

                                        <!-- STATIC STATS (optional same as before) -->
                                        <div class="mt-5 d-flex gap-4 text-white-50">
                                            <div><i class="fa-solid fa-star"></i> 500+ Happy Parties</div>
                                            <div><i class="fa-solid fa-clock"></i> On-time Delivery</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                @empty

                    <div class="carousel-item active">
                        <div class="container text-center text-white py-5">
                            No Slides Available
                        </div>
                    </div>

                @endforelse

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

            <!-- Indicators -->
            <div class="carousel-indicators">

                @foreach($sliders as $index => $slider)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}">
                    </button>
                @endforeach

            </div>

        </div>
    </section>

    <!-- INTRODUCTION / ABOUT -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <div class="position-relative">

                        <img src="{{ asset('storage/' . ($about->image ?? '')) }}" class="img-fluid rounded-4 shadow-lg">

                        <div class="position-absolute bottom-0 start-0 bg-white p-4 rounded-4 shadow glass m-4">
                            <h4 class="text-primary mb-0">
                                {{ $about->experience_years ?? '15+' }}
                            </h4>
                            <p class="small text-muted">Creating Magical Moments</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">

                    <h2 class="section-title fw-bold mb-4">
                        {{ $about->title ?? '' }}
                    </h2>

                    <p class="lead text-muted mb-4">
                        {{ $about->description ?? ''}}
                    </p>

                    <div class="row g-4 mt-4">

                        <div class="col-4 text-center">
                            <div class="display-4 fw-bold text-primary">
                                {{ $about->experience_years ?? ''}}
                            </div>
                            <p class="small text-uppercase">Years Experience</p>
                        </div>

                        <div class="col-4 text-center">
                            <div class="display-4 fw-bold text-primary">
                                {{ $about->clients ?? ''}}
                            </div>
                            <p class="small text-uppercase">Happy Clients</p>
                        </div>

                        <div class="col-4 text-center">
                            <div class="display-4 fw-bold text-primary">
                                {{ $about->events ?? ''}}
                            </div>
                            <p class="small text-uppercase">Events Completed</p>
                        </div>

                    </div>

                    <a href="#contact" class="btn magic-btn mt-4 px-5">
                        {{ $about->button_text ?? "Let's Plan Your Party" }}
                    </a>

                </div>

            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold mt-3">Magical Services</h2>
            </div>

            <div class="row g-4">

                @forelse($services as $service)

                    <div class="col-md-6 col-lg-4">
                        <div class="service-card glass h-100 p-4 text-center">

                            <i class="{{ $service->icon }} fa-4x text-primary mb-4"></i>

                            <h4>{{ $service->title }}</h4>

                            <p class="text-muted">
                                {{ $service->description }}
                            </p>

                        </div>
                    </div>

                @empty

                    <div class="text-center text-muted">
                        No Services Available
                    </div>

                @endforelse

            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="py-5" style="background: linear-gradient(135deg, #6a1b9a, #e91e63); color: white;">
        <div class="container">
            <div class="row text-center g-5">
                <div class="col-md-3">
                    <i class="fa-solid fa-rupee-sign fa-3x mb-3"></i>
                    <h5>Affordable Luxury</h5>
                    <p>Premium experience that won't break the bank</p>
                </div>
                <div class="col-md-3">
                    <i class="fa-solid fa-lightbulb fa-3x mb-3"></i>
                    <h5>Creative Designs</h5>
                    <p>Unique themes designed just for you</p>
                </div>
                <div class="col-md-3">
                    <i class="fa-solid fa-clock fa-3x mb-3"></i>
                    <h5>On-Time Magic</h5>
                    <p>Setup &amp; delivery guaranteed before your event</p>
                </div>
                <div class="col-md-3">
                    <i class="fa-solid fa-handshake fa-3x mb-3"></i>
                    <h5>100% Satisfaction</h5>
                    <p>Our promise – or we make it right</p>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section id="gallery" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold">Moments We Created</h2>
            </div>

            <div class="row g-4" id="galleryGrid">

                @forelse($images as $index => $image)

                    <div class="col-md-6 col-lg-3 gallery-img"
                        onclick="openGalleryModal('{{ asset('storage/' . $image->image) }}')">

                        <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid w-100"
                            style="height:280px; object-fit:cover;" alt="Gallery {{ $index + 1 }}">
                    </div>

                @empty

                    <div class="text-center text-muted">
                        No Images Available
                    </div>

                @endforelse

            </div>

            <!-- Gallery Modal -->
            <div class="modal fade" id="galleryModal" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content border-0 bg-transparent">
                        <div class="modal-body p-0 position-relative">

                            <button type="button"
                                class="btn-close position-absolute top-0 end-0 m-3 bg-white rounded-circle"
                                data-bs-dismiss="modal"></button>

                            <img id="modalImage" src="" class="img-fluid w-100 rounded-4" alt="">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- VIDEOS -->
    <section id="videos" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold text-dark">Live the Magic</h2>
            </div>

            <div class="row g-4">

                @forelse($videos as $video)

                    @php
                        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $video->video, $matches);
                        $videoId = $matches[1] ?? null;
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow glass">

                            @if($videoId)
                                <iframe src="https://www.youtube.com/embed/{{ $videoId }}" title="{{ $video->title }}"
                                    allowfullscreen>
                                </iframe>
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light text-danger">
                                    Invalid Video
                                </div>
                            @endif

                        </div>

                        <p class="text-center mt-3 fw-bold">
                            {{ $video->title }}
                        </p>
                    </div>

                @empty

                    <div class="text-center text-muted">
                        No Videos Available
                    </div>

                @endforelse

            </div>
        </div>
    </section>

    <!-- PACKAGES -->
    <section id="packages" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold">Choose Your Magic Package</h2>
            </div>

            <div class="row g-4 justify-content-center">

                @forelse($packages as $package)

                    <div class="col-lg-4">

                        <div class="pricing-card {{ $package->is_popular ? 'popular' : '' }} glass p-5 text-center h-100">

                            <h5 class="{{ $package->is_popular ? 'text-warning' : 'text-muted' }}">
                                {{ strtoupper($package->title) }}
                            </h5>

                            <div class="display-4 fw-bold my-3">
                                ₹{{ $package->price }}
                            </div>

                            <ul class="list-unstyled mb-4">

                                @foreach($package->features as $feature)
                                    <li class="mb-2">
                                        <i class="fa-solid fa-check text-success"></i> {{ $feature }}
                                    </li>
                                @endforeach

                            </ul>

                            <a href="#contact"
                                class="btn {{ $package->is_popular ? 'magic-btn' : 'btn-outline-primary' }} w-100">

                                {{ $package->button_text ?? 'Select Package' }}

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="text-center text-muted">
                        No Packages Available
                    </div>

                @endforelse

            </div>
        </div>
    </section>

    <!-- CONTACT FORM -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h2 class="display-4 fw-bold mb-4">Let's Create Magic Together!</h2>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('contact.submit') }}" class="glass p-5 rounded-4" id="contactForm">
                        @csrf
                        <div class="mb-4">
                            <input type="text" name="name" class="form-control form-control-lg border-0 glass"
                                placeholder="Your Name" required>
                        </div>
                        <div class="mb-4">
                            <input type="tel" name="phone" class="form-control form-control-lg border-0 glass"
                                placeholder="Phone Number" required>
                        </div>
                        <div class="mb-4">
                            <select name="service_id" class="form-select form-select-lg border-0 glass" required>
                                <option value="" disabled selected>Select Event</option>

                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->title }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-4">
                            <input type="date" name="event_date" class="form-control form-control-lg border-0 glass"
                                placeholder="Event Date">
                        </div>
                        <div class="mb-4">
                            <textarea name="message" class="form-control border-0 glass"
                                placeholder="Tell us about your dream party..." rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn magic-btn w-100 py-3">Send Message – We'll Call You in 5
                            Mins!</button>
                    </form>
                </div>

                <div class="col-lg-6 d-flex align-items-center">
                    <div class="text-white p-5 rounded-4 w-100"
                        style="background: linear-gradient(135deg, #6a1b9a, #e91e63);">
                        <h3 class="mb-4">Why Choose Us?</h3>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fa-solid fa-check-circle fa-2x me-3"></i>
                            <div>100% Custom Designs</div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fa-solid fa-check-circle fa-2x me-3"></i>
                            <div>Delhi-NCR Same Day Delivery</div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fa-solid fa-check-circle fa-2x me-3"></i>
                            <div>Expert Balloon Artists</div>
                        </div>
                        <div class="mt-5">
                            <a href="tel:++ 91 - 9838457702" class="text-white fs-3 text-decoration-none">
                                <i class="fa-solid fa-phone-volume"></i> + 91 - 9838457702
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION - Premium Card Style -->
    <section class="py-5 py-lg-6">
        <div class="container">
            <h2 class="section-title fw-bold text-center mb-5 mb-lg-6">
                Frequently Asked Questions
            </h2>

            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8 faq-container">

                    @forelse($faqs as $index => $faq)

                        <div class="faq-card glass mb-4 overflow-hidden">

                            <div class="faq-header d-flex align-items-center justify-content-between p-4 p-lg-5"
                                data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}"
                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" role="button">

                                <h5 class="mb-0 fw-semibold">
                                    {{ $faq->question }}
                                </h5>

                                <i class="fa-solid fa-plus fa-lg fa-fw fa-rotate-icon"></i>
                            </div>

                            <div id="faq{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}"
                                data-bs-parent=".faq-container">

                                <div class="faq-body px-4 px-lg-5 pb-4 pb-lg-5 pt-0">
                                    <p class="mb-0 text-white-75">
                                        {!! $faq->answer !!}
                                    </p>
                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center text-muted">
                            No FAQs available
                        </div>

                    @endforelse

                </div>
            </div>
        </div>
    </section>

@endsection