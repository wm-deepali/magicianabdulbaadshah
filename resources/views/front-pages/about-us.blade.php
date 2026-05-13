@extends('layouts.app')

@section('content')

    <!-- ABOUT US SECTION - Professional Layout: Left Image | Right Content -->
   {{-- <section id="about" class="py-5 py-lg-6 bg-dark-2 position-relative overflow-hidden">
        <div class="container">
            <!-- Heading -->
            <div class="text-center mb-5 mb-lg-6">
                <h2 class="section-title display-4 fw-bold mb-3">
                    About <span style="color: var(--accent);">Magician Badshah</span>
                </h2>
                <p class="lead text-white-75 mx-auto" style="max-width: 680px;">
                    Where creativity meets perfection – crafting magical celebrations since 2013
                </p>
            </div>

            <!-- Main Content: Image Left | Text Right -->
            <div class="row g-5 align-items-stretch">
                <!-- Left: Image Card -->
                <div class="col-lg-6">
                    <div class="glass rounded-4 overflow-hidden h-100 shadow-lg position-relative">
                        <img src="{{ $about->image ? asset('public/storage/'. $about->image) : '' }}"
                            class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $about->title ?? '' }}"
                            style="min-height: 500px;">
                        <!-- Optional subtle overlay text on image -->
                        <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-gradient-dark-transparent text-white">
                            <h5 class="mb-1">{{ $about->title ?? "Signature Grand Entrance Arch"}}</h5>
                            <p class="small mb-0">{{ $about->description ?? "Luxury meets imagination"}}</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Text Content (condensed) -->
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="glass p-5 p-lg-6 rounded-4 w-100">
                        <h3 class="fw-bold mb-4" style="color: var(--accent);">Our Story</h3>
                        <p class="text-white-75 mb-4">
                            {{ $about->story ?? " "}}
                        </p>

                        <h4 class="fw-semibold mt-5 mb-3" style="color: var(--accent-light);">Our Mission</h4>
                        <p class="text-white-75 mb-4">
                             {{ $about->mission ?? " "}}
                        </p>

                        <h4 class="fw-semibold mb-3" style="color: var(--accent-light);">Our Vision</h4>
                        <p class="text-white-75 mb-0">
                              {{ $about->vision ?? " "}}
                        </p>

                        <!-- Small CTA -->
                        <div class="mt-5">
                            <a href="{{ url('/') }}#contact" class="btn magic-btn px-5 py-3">
                               {{ $about->button_text ?? "Let's Create Your Magic"}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats (optional compact version) -->
            <div class="row g-4 text-center mt-5 mt-lg-6">
                <div class="col-md-4">
                    <div class="glass p-4 rounded-4">
                        <div class="display-5 fw-bold" style="color: var(--accent);">{{ $about->years ?? ''}}</div>
                        <p class="text-white-75 small mt-2">Years of Excellence</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass p-4 rounded-4">
                        <div class="display-5 fw-bold" style="color: var(--accent);">{{ $about->events ?? ''}}</div>
                        <p class="text-white-75 small mt-2">Events Curated</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass p-4 rounded-4">
                        <div class="display-5 fw-bold" style="color: var(--accent);">{{ $about->success_rate ?? ''}}</div>
                        <p class="text-white-75 small mt-2">Client Happiness</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

<section id="about" class="magic-about-section">

    <div class="container">

        <!-- HEADING -->

        <div class="magic-about-heading">

            <span class="magic-about-tag">
                About Us
            </span>

            <h2>
                About <span>Magician Badshah</span>
            </h2>

            <p>
                Where creativity meets perfection — crafting magical celebrations
                and unforgettable moments since 2013.
            </p>

        </div>



        <!-- MAIN CONTENT -->

        <div class="row g-5 ">

            <!-- IMAGE -->

            <div class="col-lg-6">

                <div class="magic-about-image-box">

                    <img 
                        src="{{ $about->image ? asset('public/storage/'. $about->image) : '' }}"
                        alt="{{ $about->title ?? '' }}">

                    <div class="magic-about-image-overlay">

                        <h4>
                            {{ $about->title ?? 'Luxury Event Planning' }}
                        </h4>

                        <p>
                            {{ $about->description ?? 'Creating unforgettable experiences with creativity and elegance.' }}
                        </p>

                    </div>

                </div>

            </div>



            <!-- CONTENT -->

         <div class="col-lg-6">

    <div class="magic-about-content">

        <h3>Our Story</h3>

        <p>
            {{ $about->story ?? '' }}
        </p>



        <!-- BUTTON -->

        <a href="#contact" class="magic-about-btn">

            {{ $about->button_text ?? "Let's Create Your Magic" }}

            <i class="fa-solid fa-arrow-right"></i>

        </a>

    </div>

</div>
            
        </div>
        

        <!-- MISSION & VISION ROW -->

        <div class="row mt-4">

            <!-- MISSION -->

            <div class="col-md-6">

                <div class="mission-box magic-about-content">

                    <h4>Our Mission</h4>

                    <p>
                        {{ $about->mission ?? '' }}
                    </p>

                </div>

            </div>


            <!-- VISION -->

            <div class="col-md-6">

                <div class="vision-box magic-about-content">

                    <h4>Our Vision</h4>

                    <p>
                        {{ $about->vision ?? '' }}
                    </p>

                </div>

            </div>

        </div>



        <!-- STATS -->

        <div class="magic-about-stats">

            <div class="row g-4">

                <!-- YEARS -->

                <div class="col-md-4">

                    <div class="magic-stat-card">

                        <div class="magic-stat-number counter"
                            data-target="{{ preg_replace('/[^0-9]/', '', $about->years ?? '20') }}">

                            0

                        </div>

                        <p>Years of Excellence</p>

                    </div>

                </div>


                <!-- EVENTS -->

                <div class="col-md-4">

                    <div class="magic-stat-card">

                        <div class="magic-stat-number counter"
                            data-target="{{ preg_replace('/[^0-9]/', '', $about->events ?? '1200') }}">

                            0

                        </div>

                        <p>Events Curated</p>

                    </div>

                </div>


                <!-- SUCCESS -->

                <div class="col-md-4">

                    <div class="magic-stat-card">

                        <div class="magic-stat-number counter"
                            data-target="{{ preg_replace('/[^0-9]/', '', $about->success_rate ?? '98') }}">

                            0

                        </div>

                        <p>Client Happiness</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection