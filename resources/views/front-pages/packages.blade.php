@extends('layouts.app')

@section('content')

    <section id="packages" class="py-5 py-lg-6 bg-dark-2 position-relative overflow-hidden">
        <div class="container position-relative z-2">

            <!-- Heading -->
            <div class="text-center mb-5 mb-lg-6">
                <h2 class="section-title display-4 fw-bold mb-3">
                    Choose Your <span style="color: var(--accent);">Magic Package</span>
                </h2>
                <p class="lead text-white-75 mx-auto" style="max-width: 720px;">
                    Handcrafted packages designed to make your celebration unforgettable
                </p>
            </div>

            <!-- Packages Grid -->
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

                            <a href="{{ url('/') }}#contact"
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

@endsection