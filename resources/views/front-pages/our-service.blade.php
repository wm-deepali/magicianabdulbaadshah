@extends('layouts.app')

@section('content')

    <!-- SERVICES SECTION - Fixed Spacing, Visible Yellow/Gold, Premium Glossy Look -->
    <section id="services" class="py-5 py-lg-6 bg-dark-2 position-relative overflow-hidden">
        <div class="container position-relative z-2">
            <!-- Heading -->
            <div class="text-center mb-5 mb-lg-6">
                <h2 class="section-title display-4 fw-bold mb-3">
                    Our <span style="color: var(--accent);">Signature</span> Services
                </h2>
                <p class="lead text-white-75 mx-auto" style="max-width: 760px;">
                    Premium theme creations, breathtaking balloon artistry & unforgettable party experiences
                </p>
            </div>

            <!-- Services Grid - Larger Cards -->
            <div class="row g-4 g-lg-3">

                @foreach($services as $service)

                    <div class="col-lg-4 col-md-6">
                        <div class="service-card glass rounded-4 overflow-hidden h-100 shadow-xl position-relative hover-glow">

                            <!-- Image -->
                            <div class="card-image position-relative">
                                <img src="{{ $service->image ? asset('storage/' . $service->image) : 'https://via.placeholder.com/400x300' }}"
                                    class="img-fluid w-100" alt="{{ $service->title }}"
                                    style="height: 280px; object-fit: cover;">

                                <div class="gloss-overlay"></div>

                                <div
                                    class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="{{ $service->icon }} fa-4x text-white opacity-40"></i>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-2 p-lg-3 text-center">
                                <h4 class="fw-bold mb-3 fs-4" style="color: var(--accent);">
                                    {{ $service->title }}
                                </h4>

                                <p class="text-white-75 mb-4" style="font-size: 0.98rem; line-height: 1.5;">
                                    {{ $service->description }}
                                </p>

                                <!-- Features -->
                                <ul class="list-unstyled text-start mb-0 small text-white-75 ps-0 service-list">

                                    @if(!empty($service->features))
                                        @foreach($service->features as $feature)
                                            <li>
                                                <i class="fa-solid fa-star me-2" style="color: var(--accent);"></i>
                                                {{ $feature }}
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

            <!-- CTA -->
            <div class="text-center mt-5 mt-lg-6">
                <a href="{{ url('/') }}#contact" class="btn magic-btn btn-lg px-5 py-3">
                    <i class="fa-solid fa-wand-magic-sparkles me-2"></i> Book Your Magical Celebration
                </a>
            </div>
        </div>
    </section>

@endsection