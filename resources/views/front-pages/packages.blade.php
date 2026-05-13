@extends('layouts.app')

@section('content')

    <!-- PACKAGES -->
    <section id="packages" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold">Choose Your Magic Package</h2>
            </div>

            <div class="row g-4 justify-content-center">

                @forelse($packages as $key => $package)

        <div class="col-lg-3 col-md-6">

            <div class="pricing-card 
                package-{{ ($key % 5) + 1 }} 
                {{ $package->is_popular ? 'popular' : '' }} 
                p-5 text-center h-100">

                <h5 class="fw-bold text-white">
                    {{ strtoupper($package->title) }}
                </h5>

                <div class="display-4 fw-bold my-3">
                    ₹{{ $package->price }}
                </div>

                <ul class="list-unstyled mb-4">

                    @foreach($package->features as $feature)
                        <li class="mb-2">
                            <i class="fa-solid fa-check"></i> {{ $feature }}
                        </li>
                    @endforeach

                </ul>

                <a href="#contact"
                    class="btn w-100 {{ $package->is_popular ? 'magic-btn' : '' }}">

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