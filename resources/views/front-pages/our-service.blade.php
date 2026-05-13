@extends('layouts.app')

@section('content')

    <!-- SERVICES SECTION - Fixed Spacing, Visible Yellow/Gold, Premium Glossy Look -->
  
    <section id="services" class="section-padding bg-light">
  <div class="container">

    <!-- Heading -->
    <div class="text-center mb-5" data-aos="fade-up">
      <span class="section-tag">What We Offer</span>
      <h2 class="section-title text-dark">Our Magical Services</h2>
      <p class="text-secondary">Tailored entertainment experiences for every special occasion</p>
    </div>

    <!-- Services -->
    
    <div class="row g-4">

      @forelse($services as $index => $service)

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($index+1)*100 }}">

          <div class="service-card">

            <!-- IMAGE -->
            <div>
              <img 
                src="{{ $service->image 
                      ? asset('public/storage/' . ltrim($service->image, '/')) 
                      : asset('assets/images/balloons-3.png') }}" 
                class="text-center d-block mx-auto img-fluid"
                alt="{{ $service->title ?? '' }}"
                style="height:120px; object-fit:contain;">
            </div>

            <!-- TITLE -->
            <h3>{{ $service->title ?? 'Service Title' }}</h3>

            <!-- DESCRIPTION (optional) -->
            @if(!empty($service->description))
              <p class="text-secondary small">
                {{ \Illuminate\Support\Str::limit($service->description, 80) }}
              </p>
            @endif
            
            @if(!empty($service->features) && is_array($service->features))

    <div class="mt-2 mb-3 text-start">

        @foreach($service->features as $feature)

            @if(!empty(trim($feature)))

                <div class="small mb-1">
                    <i class="fa fa-check text-success me-1"></i>
                    {{ trim($feature) }}
                </div>

            @endif

        @endforeach

    </div>

@endif

            <!-- BUTTON -->
            <a href="{{ url('/') }}#contact" class="btn btn-sm btn-primary-custom">
              Book This Show
            </a>

          </div>

        </div>

      @empty

        <!-- FALLBACK STATIC (your original design) -->
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <div>
              <img src="{{ asset('assets/images/balloons-3.png') }}" class="d-block mx-auto">
            </div>
            <h3>Birthday Parties</h3>
            <a href="#contact" class="btn btn-sm btn-primary-custom">Book This Show</a>
          </div>
        </div>

      @endforelse

    </div>

    <!-- VIEW MORE -->
    <div class="text-center mt-5">
      <a href="{{ route('services') }}" class="section-tag">View More</a>
    </div>

  </div>
</section>

@endsection