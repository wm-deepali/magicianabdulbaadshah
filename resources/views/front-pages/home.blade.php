@extends('layouts.app')

@section('content')

    <!-- HERO CAROUSEL -->
    <section id="home" class="hero-carousel">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Sparkle Container -->
            <div id="sparkles" class="position-absolute w-100 h-100" style="top:0; left:0; z-index:3; overflow:hidden;">
            </div>

            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url('https://picsum.photos/id/1015/1920/1080');">
                    <div class="hero-overlay position-absolute w-100 h-100 d-flex align-items-center">
                        <div class="container text-white">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1 class="display-3 fw-bold hero-text mb-3"
                                        style="text-shadow: 0 5px 30px rgba(0,0,0,0.6);">
                                        Make Your Party<br><span class="text-warning">MAGICAL</span> 🎉
                                    </h1>
                                    <p class="lead mb-4 fs-4" style="text-shadow: 0 3px 15px rgba(0,0,0,0.6);">
                                        India's Most Premium Theme Party Planner &amp; Balloon Decoration
                                    </p>
                                    <div class="d-flex gap-3 flex-wrap">
                                        <a href="#contact" class="btn magic-btn btn-lg px-5 py-3">Book Your Magic Now</a>
                                        <a href="#services" class="btn btn-outline-light btn-lg px-5 py-3 border-2">Explore
                                            Services</a>
                                    </div>
                                    <div class="mt-5 d-flex gap-4 text-white-50">
                                        <div><i class="fa-solid fa-star"></i> 500+ Happy Parties</div>
                                        <div><i class="fa-solid fa-clock"></i> On-time Delivery</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url('https://picsum.photos/id/201/1920/1080');">
                    <div class="hero-overlay position-absolute w-100 h-100 d-flex align-items-center">
                        <div class="container text-white">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1 class="display-3 fw-bold hero-text mb-3"
                                        style="text-shadow: 0 5px 30px rgba(0,0,0,0.6);">
                                        Balloons that<br>Steal the Show ✨
                                    </h1>
                                    <p class="lead mb-4 fs-4">Custom Themes • Premium Balloons • Unforgettable Moments</p>
                                    <a href="#packages" class="btn magic-btn btn-lg px-5 py-3">Choose Your Package</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url('https://picsum.photos/id/870/1920/1080');">
                    <div class="hero-overlay position-absolute w-100 h-100 d-flex align-items-center">
                        <div class="container text-white">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1 class="display-3 fw-bold hero-text mb-3"
                                        style="text-shadow: 0 5px 30px rgba(0,0,0,0.6);">
                                        From 1st Birthday<br>to Grand Weddings
                                    </h1>
                                    <p class="lead mb-4 fs-4">Every celebration deserves magic!</p>
                                    <a href="#gallery" class="btn magic-btn btn-lg px-5 py-3">See Our Magic</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
        </div>
    </section>

    <!-- INTRODUCTION / ABOUT -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="https://picsum.photos/id/1016/800/900" class="img-fluid rounded-4 shadow-lg"
                            alt="Magician Badshah">
                        <div class="position-absolute bottom-0 start-0 bg-white p-4 rounded-4 shadow glass m-4">
                            <h4 class="text-primary mb-0">15+ Years</h4>
                            <p class="small text-muted">Creating Magical Moments</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title  fw-bold mb-4">We Turn Dreams Into Reality</h2>
                    <p class="lead text-muted mb-4">
                        Welcome to Magician Badshah – Delhi's most loved theme party planner &amp; balloon decoration
                        experts.
                        From enchanting birthday themes to grand wedding setups, we bring the wow factor to every
                        celebration.
                    </p>

                    <div class="row g-4 mt-4">
                        <div class="col-4 text-center">
                            <div class="display-4 fw-bold text-primary">15+</div>
                            <p class="small text-uppercase">Years Experience</p>
                        </div>
                        <div class="col-4 text-center">
                            <div class="display-4 fw-bold text-primary">850+</div>
                            <p class="small text-uppercase">Happy Clients</p>
                        </div>
                        <div class="col-4 text-center">
                            <div class="display-4 fw-bold text-primary">1200+</div>
                            <p class="small text-uppercase">Events Completed</p>
                        </div>
                    </div>

                    <a href="#contact" class="btn magic-btn mt-4 px-5">Let's Plan Your Party</a>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <!-- <span class="badge bg-warning text-dark px-4 py-2 rounded-pill">Our Specialities</span> -->
                <h2 class="section-title  fw-bold mt-3">Magical Services</h2>
            </div>

            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-card glass h-100 p-4 text-center">
                        <i class="fa-solid fa-birthday-cake fa-4x text-primary mb-4"></i>
                        <h4>Birthday Themes</h4>
                        <p class="text-muted">Superhero, Princess, Unicorn &amp; more – fully customized themes for kids
                            &amp; adults</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-card glass h-100 p-4 text-center">
                        <i class="fa-solid fa-baby fa-4x text-primary mb-4"></i>
                        <h4>Baby Shower</h4>
                        <p class="text-muted">Elegant gender reveal &amp; baby shower decorations with premium balloons</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-card glass h-100 p-4 text-center">
                        <i class="fa-solid fa-ring fa-4x text-primary mb-4"></i>
                        <h4>Wedding &amp; Engagement</h4>
                        <p class="text-muted">Luxury floral &amp; balloon setups for your dream day</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-card glass h-100 p-4 text-center">
                        <i class="fa-solid fa-balloons fa-4x text-primary mb-4"></i>
                        <h4>Balloon Decoration</h4>
                        <p class="text-muted">Organic arches, helium towers, photo booths &amp; magical installations</p>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-card glass h-100 p-4 text-center">
                        <i class="fa-solid fa-cake-candles fa-4x text-primary mb-4"></i>
                        <h4>Corporate Events</h4>
                        <p class="text-muted">Product launches, team celebrations &amp; festive office parties</p>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-card glass h-100 p-4 text-center">
                        <i class="fa-solid fa-wand-magic-sparkles fa-4x text-primary mb-4"></i>
                        <h4>Custom Themes</h4>
                        <p class="text-muted">Any theme you imagine – we create it with love &amp; magic</p>
                    </div>
                </div>
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
                <h2 class="section-title  fw-bold">Moments We Created</h2>
            </div>

            <div class="row g-4" id="galleryGrid">
                <!-- Populated by JS for demo -->
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
                <h2 class="section-title  fw-bold text-dark">Live the Magic</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow glass">
                        <iframe src="https://www.youtube.com/embed/9f9p8v8oJ3A" title="Balloon Magic"
                            allowfullscreen></iframe>
                    </div>
                    <p class="text-center mt-3 fw-bold">Balloon Surprise Setup</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow glass">
                        <iframe src="https://www.youtube.com/embed/3vR0w3Y8i4E" title="Birthday Theme"
                            allowfullscreen></iframe>
                    </div>
                    <p class="text-center mt-3 fw-bold">Princess Theme Reveal</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow glass">
                        <iframe src="https://www.youtube.com/embed/2T4vL0X5zKk" title="Wedding Decor"
                            allowfullscreen></iframe>
                    </div>
                    <p class="text-center mt-3 fw-bold">Elegant Wedding Entrance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PACKAGES -->
    <section id="packages" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title  fw-bold">Choose Your Magic Package</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Basic -->
                <div class="col-lg-4">
                    <div class="pricing-card glass p-5 text-center h-100">
                        <h5 class="text-muted">BASIC</h5>
                        <div class="display-4 fw-bold my-3">₹18,999</div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> 100 Balloons</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> Basic Theme Setup</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> 2 Hours Decoration</li>
                        </ul>
                        <a href="#contact" class="btn btn-outline-primary w-100">Select Basic</a>
                    </div>
                </div>

                <!-- Standard (Popular) -->
                <div class="col-lg-4">
                    <div class="pricing-card popular glass p-5 text-center h-100">
                        <h5 class="text-warning">STANDARD</h5>
                        <div class="display-4 fw-bold my-3">₹29,999</div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> 300 Premium Balloons</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> Full Theme + Backdrop</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> Photo Booth + Lighting</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> 4 Hours Setup</li>
                        </ul>
                        <a href="#contact" class="btn magic-btn w-100">Most Loved Package</a>
                    </div>
                </div>

                <!-- Premium -->
                <div class="col-lg-4">
                    <div class="pricing-card glass p-5 text-center h-100">
                        <h5 class="text-muted">PREMIUM</h5>
                        <div class="display-4 fw-bold my-3">₹49,999</div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> 500+ Balloons &amp; Helium</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> Complete Custom Theme</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> LED Lights + Smoke Machine</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> Full Day Service</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success"></i> Live Magician Show</li>
                        </ul>
                        <a href="#contact" class="btn btn-outline-primary w-100">Go Premium</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT FORM -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h2 class="display-4 fw-bold mb-4">Let's Create Magic Together!</h2>
                    <form id="contactForm" class="glass p-5 rounded-4">
                        <div class="mb-4">
                            <input type="text" id="name" class="form-control form-control-lg border-0 glass"
                                placeholder="Your Name" required>
                        </div>
                        <div class="mb-4">
                            <input type="tel" id="phone" class="form-control form-control-lg border-0 glass"
                                placeholder="Phone Number" required>
                        </div>
                        <div class="mb-4">
                            <select id="eventType" class="form-select form-select-lg border-0 glass">
                                <option value="">Event Type</option>
                                <option value="Birthday">Birthday Party</option>
                                <option value="BabyShower">Baby Shower</option>
                                <option value="Wedding">Wedding / Engagement</option>
                                <option value="Corporate">Corporate Event</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea id="message" rows="5" class="form-control border-0 glass"
                                placeholder="Tell us about your dream party..."></textarea>
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
                            data-bs-toggle="collapse"
                            data-bs-target="#faq{{ $index }}"
                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                            role="button">

                            <h5 class="mb-0 fw-semibold">
                                {{ $faq->question }}
                            </h5>

                            <i class="fa-solid fa-plus fa-lg fa-fw fa-rotate-icon"></i>
                        </div>

                        <div id="faq{{ $index }}"
                            class="collapse {{ $index == 0 ? 'show' : '' }}"
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