@extends('layouts.app')

@section('content')

    <!-- HERO CAROUSEL -->
   <!--<section id="home" class="hero-carousel">-->
   <!--     <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">-->

            <!-- Sparkles -->
   <!--         <div id="sparkles" class="position-absolute w-100 h-100" style="top:0; left:0; z-index:3; overflow:hidden;">-->
   <!--         </div>-->

   <!--         <div class="carousel-inner">-->

   <!--             @forelse($sliders as $index => $slider)-->

   <!--                 <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"-->
   <!--                     style="background-image: url('{{ asset('public/storage/' . $slider->image) }}');-->
                            
   <!--                     ">-->

   <!--                     <div class="hero-overlay position-absolute w-100 h-100 d-flex align-items-center">-->
   <!--                         <div class="container text-white">-->
   <!--                             <div class="row">-->
   <!--                                 <div class="col-lg-8">-->

                                        <!-- TITLE -->
   <!--                                     <h1 class="display-3 fw-bold hero-text mb-3"-->
   <!--                                         style="text-shadow: 0 5px 30px rgba(0,0,0,0.6);">-->
   <!--                                         {!! $slider->title !!}-->
   <!--                                     </h1>-->

                                        <!-- SUBTITLE -->
   <!--                                     <p class="lead mb-4 fs-4" style="text-shadow: 0 3px 15px rgba(0,0,0,0.6);">-->
   <!--                                         {{ $slider->subtitle }}-->
   <!--                                     </p>-->

                                        <!-- BUTTONS -->
   <!--                                     <div class="d-flex gap-3 flex-wrap">-->

   <!--                                         @if($slider->button_text)-->
   <!--                                             <a href="{{ $slider->button_link ?? '#' }}" class="btn magic-btn btn-lg px-5 py-3">-->
   <!--                                                 {{ $slider->button_text }}-->
   <!--                                             </a>-->
   <!--                                         @endif-->

   <!--                                     </div>-->

                                        <!-- STATIC STATS (optional same as before) -->
   <!--                                     <div class="mt-5 d-flex gap-4 text-white-50">-->
   <!--                                         <div><i class="fa-solid fa-star"></i> 500+ Happy Parties</div>-->
   <!--                                         <div><i class="fa-solid fa-clock"></i> On-time Delivery</div>-->
   <!--                                     </div>-->

   <!--                                 </div>-->
   <!--                             </div>-->
   <!--                         </div>-->
   <!--                     </div>-->

   <!--                 </div>-->

   <!--             @empty-->

   <!--                 <div class="carousel-item active">-->
   <!--                     <div class="container text-center text-white py-5">-->
   <!--                         No Slides Available-->
   <!--                     </div>-->
   <!--                 </div>-->

   <!--             @endforelse-->

   <!--         </div>-->

            <!-- Controls -->
   <!--         <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">-->
   <!--             <span class="carousel-control-prev-icon"></span>-->
   <!--         </button>-->

   <!--         <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">-->
   <!--             <span class="carousel-control-next-icon"></span>-->
   <!--         </button>-->

            <!-- Indicators -->
   <!--         <div class="carousel-indicators">-->

   <!--             @foreach($sliders as $index => $slider)-->
   <!--                 <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"-->
   <!--                     class="{{ $index == 0 ? 'active' : '' }}">-->
   <!--                 </button>-->
   <!--             @endforeach-->

   <!--         </div>-->

   <!--     </div>-->
   <!-- </section> -->
    
  <section id="home" class="hero-section">

  <div class="hero-slider">

    @forelse($sliders as $index => $slider)

        <div class="hero-slide {{ $index == 0 ? 'active' : '' }}">

            <img 
                src="{{ asset('public/storage/' . $slider->image) }}"
                alt="hero banner">

        </div>

    @empty

        <div class="hero-slide active">

            <img 
                src="{{ asset('public/storage/hero/s-1.jpg') }}"
                alt="hero banner">

        </div>

        <div class="hero-slide">

            <img 
                src="{{ asset('public/storage/hero/s-2.jpeg') }}"
                alt="hero banner">

        </div>

    @endforelse

</div>

  <div class="balloon-bg-layer"></div>
  <div class="hero-light-overlay"></div>

</section> 

     <!-- SERVICES -->
    <!--<section id="services" class="py-5 bg-white">-->
    <!--    <div class="container">-->
    <!--        <div class="text-center mb-5">-->
    <!--            <h2 class="section-title fw-bold mt-3">Magical Services</h2>-->
    <!--        </div>-->

    <!--        <div class="row g-4">-->

    <!--            @forelse($services as $service)-->

    <!--                <div class="col-md-6 col-lg-4">-->
    <!--                    <div class="service-card glass h-100 p-4 text-center">-->

    <!--                        <i class="{{ $service->icon }} fa-4x text-primary mb-4"></i>-->

    <!--                        <h4>{{ $service->title }}</h4>-->

    <!--                        <p class="text-muted">-->
    <!--                            {{ $service->description }}-->
    <!--                        </p>-->

    <!--                    </div>-->
    <!--                </div>-->

    <!--            @empty-->

    <!--                <div class="text-center text-muted">-->
    <!--                    No Services Available-->
    <!--                </div>-->

    <!--            @endforelse-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
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

        <!--@foreach($service->features as $feature)-->

        <!--    @if(!empty(trim($feature)))-->

        <!--        <div class="small mb-1">-->
        <!--            <i class="fa fa-check text-success me-1"></i>-->
        <!--            {{ trim($feature) }}-->
        <!--        </div>-->

        <!--    @endif-->

        <!--@endforeach-->

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

    
    <!-- INTRODUCTION / ABOUT -->
    <!--<section id="about" class="py-5">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center g-5">-->

    <!--            <div class="col-lg-6">-->
    <!--                <div class="position-relative">-->

    <!--                    <img src="{{ asset('public/storage/' . ($about->image ?? '')) }}" class="img-fluid rounded-4 shadow-lg">-->

    <!--                    <div class="position-absolute bottom-0 start-0 bg-white p-4 rounded-4 shadow glass m-4">-->
    <!--                        <h4 class="text-primary mb-0">-->
    <!--                            {{ $about->experience_years ?? '15+' }}-->
    <!--                        </h4>-->
    <!--                        <p class="small text-muted">Creating Magical Moments</p>-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-6">-->

    <!--                <h2 class="section-title fw-bold mb-4">-->
    <!--                    {{ $about->title ?? '' }}-->
    <!--                </h2>-->

    <!--                <p class="lead text-muted mb-4">-->
    <!--                    {{ $about->description ?? ''}}-->
    <!--                </p>-->

    <!--                <div class="row g-4 mt-4">-->

    <!--                    <div class="col-4 text-center">-->
    <!--                        <div class="display-4 fw-bold text-primary">-->
    <!--                            {{ $about->experience_years ?? ''}}-->
    <!--                        </div>-->
    <!--                        <p class="small text-uppercase">Years Experience</p>-->
    <!--                    </div>-->

    <!--                    <div class="col-4 text-center">-->
    <!--                        <div class="display-4 fw-bold text-primary">-->
    <!--                            {{ $about->clients ?? ''}}-->
    <!--                        </div>-->
    <!--                        <p class="small text-uppercase">Happy Clients</p>-->
    <!--                    </div>-->

    <!--                    <div class="col-4 text-center">-->
    <!--                        <div class="display-4 fw-bold text-primary">-->
    <!--                            {{ $about->events ?? ''}}-->
    <!--                        </div>-->
    <!--                        <p class="small text-uppercase">Events Completed</p>-->
    <!--                    </div>-->

    <!--                </div>-->

    <!--                <a href="#contact" class="btn magic-btn mt-4 px-5">-->
    <!--                    {{ $about->button_text ?? "Let's Plan Your Party" }}-->
    <!--                </a>-->

    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

   <section id="about" class="section-padding bg-white">
  <div class="container">
    <div class="row gy-3 align-items-center">

      <!-- TEXT CONTENT -->
      <div class="col-lg-6" data-aos="fade-left">

        <span class="section-tag">About Me</span>

        <h2 class="section-title text-dark">
          {{ $about->title ?? 'Welcome to a World of Wonder!' }}
        </h2>

        <p class="text-secondary">
          {{ $about->description ?? "I'm Abdul Baadshah, a professional magician dedicated to creating magical moments for children." }}
        </p>

        <!-- CALL SECTION -->
        <div class="call-us">

    <!-- ICON -->
    <div class="call-icon">
        <img src="{{ asset('public/storage/about/call.png') }}" alt="call">
    </div>

    <!-- CONTENT -->
    <div class="call-content">

        <span>
            Have Questions? Call Us
        </span>

        <a href="tel:{{ $contact->phone ?? '' }}">
            {{ $contact->phone ?? '91 - 9305059906' }}
        </a>

        <p>
            {{ $about->working_hours ?? 'Open All Days 10:30 AM to 9:00 PM' }}
        </p>

    </div>

</div>

      </div>

      <!-- IMAGE SECTION (YOUR DESIGN KEPT) -->
      <div class="col-lg-6" data-aos="fade-right">

       <div class="party-balloon-img">

  <img 
    alt="party-balloon" 
    class="p-balloon"
    src="https://thumbs.dreamstime.com/b/friendly-wizard-11790593.jpg?w=768">

  <img 
    alt="party-balloon " class="secondimg"
    src="public/storage/about/about.webp">

  <div class="b-shap"></div>

</div>
      </div>

    </div>
  </div>
</section>

    <!-- FEATURES -->
    <!--<section class="py-5" style="background: linear-gradient(135deg, #6a1b9a, #e91e63); color: white;">-->
    <!--    <div class="container">-->
    <!--        <div class="row text-center g-5">-->
    <!--            <div class="col-md-3">-->
    <!--                <i class="fa-solid fa-rupee-sign fa-3x mb-3"></i>-->
    <!--                <h5>Affordable Luxury</h5>-->
    <!--                <p>Premium experience that won't break the bank</p>-->
    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <i class="fa-solid fa-lightbulb fa-3x mb-3"></i>-->
    <!--                <h5>Creative Designs</h5>-->
    <!--                <p>Unique themes designed just for you</p>-->
    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <i class="fa-solid fa-clock fa-3x mb-3"></i>-->
    <!--                <h5>On-Time Magic</h5>-->
    <!--                <p>Setup &amp; delivery guaranteed before your event</p>-->
    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <i class="fa-solid fa-handshake fa-3x mb-3"></i>-->
    <!--                <h5>100% Satisfaction</h5>-->
    <!--                <p>Our promise â€“ or we make it right</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- GALLERY -->
    <!--<section id="gallery" class="py-5 bg-white">-->
    <!--    <div class="container">-->
    <!--        <div class="text-center mb-5">-->
    <!--            <h2 class="section-title fw-bold">Moments We Created</h2>-->
    <!--        </div>-->

    <!--        <div class="row g-4" id="galleryGrid">-->

    <!--            @forelse($images as $index => $image)-->

    <!--                <div class="col-md-6 col-lg-3 gallery-img"-->
    <!--                    onclick="openGalleryModal('{{ asset('public/storage/' . $image->image) }}')">-->

    <!--                    <img src="{{ asset('public/storage/' . $image->image) }}" class="img-fluid w-100"-->
    <!--                        style="height:280px; object-fit:cover;" alt="Gallery {{ $index + 1 }}">-->
    <!--                </div>-->

    <!--            @empty-->

    <!--                <div class="text-center text-muted">-->
    <!--                    No Images Available-->
    <!--                </div>-->

    <!--            @endforelse-->

    <!--        </div>-->

            <!-- Gallery Modal -->
    <!--        <div class="modal fade" id="galleryModal" tabindex="-1">-->
    <!--            <div class="modal-dialog modal-xl modal-dialog-centered">-->
    <!--                <div class="modal-content border-0 bg-transparent">-->
    <!--                    <div class="modal-body p-0 position-relative">-->

    <!--                        <button type="button"-->
    <!--                            class="btn-close position-absolute top-0 end-0 m-3 bg-white rounded-circle"-->
    <!--                            data-bs-dismiss="modal"></button>-->

    <!--                        <img id="modalImage" src="" class="img-fluid w-100 rounded-4" alt="">-->

    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</section>-->
    <section id="gallery" class="section-padding_gallrey bg-white">
  <div class="container">

    <!-- Heading -->
    <div class="text-center mb-4" data-aos="fade-up">
      <span class="section-tag">Magical Moments</span>
      <h2 class="section-title text-dark">Gallery</h2>
      <p class="text-secondary">Click any image to view in full screen with zoom & navigation</p>
    </div>

    <!-- Filters (STATIC OR DYNAMIC) -->
    <!--<div class="gallery-filters d-flex justify-content-center gap-2 mb-4 flex-wrap" data-aos="fade-up">-->
    <!--  <button class="filter-btn active" data-filter="all">All</button>-->
    <!--  <button class="filter-btn" data-filter="birthday">Birthdays</button>-->
    <!--  <button class="filter-btn" data-filter="stage">Stage Shows</button>-->
    <!--  <button class="filter-btn" data-filter="kids">Kids Events</button>-->
    <!--</div>-->

    <!-- Gallery Grid -->
    <div id="lightgallery" class="row g-3">

      @forelse($images as $index => $image)

        <div class="col-6 col-md-4 col-lg-3 gallery-item"
             data-category="{{ $image->category ?? 'all' }}"
             data-aos="zoom-in"
             data-aos-delay="{{ $index * 100 }}">

          <a href="{{ asset('public/storage/' . ltrim($image->image, '/')) }}"
             class="gallery-thumb"
             data-sub-html="<h4>{{ $image->title ?? 'Gallery Image' }}</h4><p>{{ $image->description ?? '' }}</p>"
             data-lg-size="1400-900">

            <img 
              src="{{ asset('public/storage/' . ltrim($image->image, '/')) }}"
              alt="Gallery {{ $index + 1 }}"
              class="img-fluid rounded-3"
              loading="lazy"
              style="height:250px; width:100%; object-fit:cover;">

            <div class="gallery-overlay">
              <i class="bi bi-zoom-in"></i>
              <span>{{ $image->title ?? 'View Image' }}</span>
            </div>

          </a>

        </div>

      @empty

        <!-- FALLBACK -->
        <div class="col-12 text-center text-muted">
          No Images Available
        </div>

      @endforelse

    </div>

    <!-- Load More -->
    <div class="text-center mt-5" data-aos="fade-up">
      <button id="loadMoreBtn" class="section-tag btn-lg" style="color:#672b83">
        <i class="bi bi-images me-2" style="color:#672b83"></i>Load More Photos
      </button>
    </div>

  </div>
</section>
    
    <!-- ðŸ”¹ WHY CHOOSE US -->
  <section class="section-padding bg-light">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-tag">Why Families Trust Us</span>
        <h2 class="section-title text-dark">Why Choose Us?</h2>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3 text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="trust-card">
            <div class="trust-icon bg-gold"><i class="bi bi-trophy"></i></div>
            <h4>10+ Years Exp.</h4>
            <p class="text-secondary mb-0">Professional magician creating memories since 2014.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="trust-card">
            <div class="trust-icon bg-purple"><i class="bi bi-people"></i></div>
            <h4>500+ Happy Kids</h4>
            <p class="text-secondary mb-0">Countless smiles, zero complaints. Pure joy.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 text-center" data-aos="fade-up" data-aos-delay="300">
          <div class="trust-card">
            <div class="trust-icon bg-blue"><i class="bi bi-shield-check"></i></div>
            <h4>100% Safe Shows</h4>
            <p class="text-secondary mb-0">Age-appropriate, background-verified, & child-friendly.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 text-center" data-aos="fade-up" data-aos-delay="400">
          <div class="trust-card">
            <div class="trust-icon bg-pink"><i class="bi bi-heart"></i></div>
            <h4>Kids Love Us!</h4>
            <p class="text-secondary mb-0">Interactive, funny, & perfectly tailored for young minds.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
   
    <!-- VIDEOS -->
  
<section class="section-padding bg-white">
  <div class="container">

    <!-- Heading -->
    <div class="text-center mb-5" data-aos="fade-up">
      <span class="section-tag">Why Families Trust Us</span>
      <h2 class="section-title text-dark">Watch Videos</h2>
    </div>

 <div class="row align-items-center g-5">

    <div class="swiper mySwiper">

        <div class="swiper-wrapper">

            @forelse($videos ?? [] as $video)

                @php
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $video->video, $matches);
                    $videoId = $matches[1] ?? null;
                @endphp

                <div class="swiper-slide">

                    @if($videoId)

    <div class="video-slide openVideoModal"
        data-type="youtube"
        data-src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1">

        <!-- YOUTUBE THUMBNAIL -->

        <img 
    src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
    onerror="this.src='https://img.youtube.com/vi/{{ $videoId }}/mqdefault.jpg'"
    class="video-thumb-image">

        <!-- PLAY BUTTON -->

        <div class="video-play-btn">
            <i class="fa-solid fa-play"></i>
        </div>

    </div>

@else

                        <!-- MP4 -->

                        <div class="video-slide openVideoModal"
                            data-type="video"
                            data-src="{{ asset('storage/hero/' . ltrim($video->video, '/')) }}">

                            <video muted playsinline>

                                <source 
                                    src="{{ asset('storage/hero/' . ltrim($video->video, '/')) }}" 
                                    type="video/mp4">

                            </video>

                            <div class="video-play-btn">
                                <i class="fa-solid fa-play"></i>
                            </div>

                        </div>

                    @endif

                </div>

            @empty

                <!-- FALLBACK -->

                <div class="swiper-slide">

                    <div class="video-slide openVideoModal"
                        data-type="video"
                        data-src="{{ asset('storage/hero/video.mp4') }}">

                        <video muted playsinline>

                            <source 
                                src="{{ asset('storage/hero/video.mp4') }}" 
                                type="video/mp4">

                        </video>

                        <div class="video-play-btn">
                            <i class="fa-solid fa-play"></i>
                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div>



<!-- VIDEO MODAL -->

<div class="custom-video-modal" id="videoModal">

    <div class="custom-video-modal-content">

        <button class="custom-video-close" id="closeVideoModal">
            ×
        </button>

        <div id="videoModalBody"></div>

    </div>

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
    <!--contact % faq-->
    <section id="contact" class="section-padding bg-light">
  <div class="container">
    <div class="row g-5">

      <!-- FAQ SECTION -->
      <div class="col-lg-6" data-aos="fade-right">
        
        <h2 class="section-title text-dark">Frequently Asked</h2>

        <div class="faq-container mt-4">

          @forelse($faqs ?? [] as $index => $faq)

            <div class="faq-item {{ $index == 0 ? 'faq-open' : '' }}">
              <div class="faq-question">
                <h5>{{ $faq->question }}</h5>
                <span class="icon">{{ $index == 0 ? '+' : '+' }}</span>
              </div>

              <div class="faq-answer">
                <p>{{ $faq->answer }}</p>
              </div>
            </div>

          @empty

            <!-- FALLBACK -->
            <div class="faq-item faq-open">
              <div class="faq-question">
                <h5>No FAQs Available</h5>
                <span class="icon">âˆ’</span>
              </div>
              <div class="faq-answer">
                <p>Please add FAQs from admin panel.</p>
              </div>
            </div>

          @endforelse

        </div>
      </div>

      <!-- CONTACT FORM -->
      <div class="col-lg-6" data-aos="fade-left">
        <div class="contact-form-card p-4 bg-white rounded-4 shadow-sm">

          <h3 class="text-dark mb-4">Request a Callback</h3>

          <form method="POST" action="{{ route('contact.submit') }}">
    @csrf

    <div class="mb-3">
        <input type="text" 
               name="name" 
               class="form-control" 
               placeholder="Your Name" 
               required>
    </div>

    <div class="mb-3">
        <input type="tel" 
               name="phone" 
               class="form-control" 
               placeholder="Mobile Number" 
               required>
    </div>

    <div class="mb-3">
        <input type="email" 
               name="email" 
               class="form-control" 
               placeholder="Enter Email" 
               required>
    </div>

    <!-- SERVICES -->
    <div class="mb-3">
        <select name="event" class="form-select" required>

            <option value="">Select Service</option>

            <option value="Birthday Event Party">
                Birthday Event Party
            </option>

            <option value="Theme Party Decoration">
                Theme Party Decoration
            </option>

            <option value="Balloon Party Decoration">
                Balloon Party Decoration
            </option>

            <option value="Magic Shows">
                Magic Shows
            </option>

            <option value="Kids Entertainment">
                Kids Entertainment
            </option>

            <option value="Party Games">
                Party Games
            </option>

            <option value="Cartoon Characters">
                Cartoon Characters
            </option>

            <option value="Painting & Tattoo Artist">
                Painting & Tattoo Artist
            </option>

        </select>
    </div>

    <div class="mb-3">
        <textarea name="message"
                  class="form-control"
                  rows="3"
                  placeholder="Tell us about your event..."
                  required></textarea>
    </div>

    <button type="submit" class="btn btn-primary-custom w-100">
        <i class="fa-solid fa-phone"></i>
        Request Callback
    </button>

</form>

        </div>
      </div>

    </div>
  </div>
</section>

   

@endsection