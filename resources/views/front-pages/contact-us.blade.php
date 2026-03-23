@extends('layouts.app')

@section('content')

    <!-- CONTACT US SECTION - Fixed & Premium Version -->
    <section id="contact" class="py-5 py-lg-6 bg-dark-2 position-relative overflow-hidden">
        <div class="container position-relative z-2">
            <!-- Heading -->
            <div class="text-center mb-5 mb-lg-6">
                <h2 class="section-title display-4 fw-bold mb-3">
                    Let's Create <span style="color: var(--accent);">Your Magic</span> Together
                </h2>
                <p class="lead text-white-75 mx-auto" style="max-width: 720px;">
                    Drop us a message — we'll reach you within minutes to plan your dream celebration
                </p>
            </div>

            <!-- Two Cards Side by Side (Form + Details) -->
            <div class="row g-4 g-lg-5 mb-5">
                <!-- Left: Contact Form Card -->
                <div class="col-lg-6">
                    <div class="glass p-4 p-lg-5 rounded-4 shadow-xl h-100">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('contact.submit') }}" id="contactForm">
                            @csrf
                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="name" class="form-label text-white-75 fw-medium">Your Name</label>
                                    <input type="text" name="name"
                                        class="form-control form-control-lg bg-transparent border-gray text-white-75"
                                        required>
                                    <div class="invalid-feedback text-danger small mt-1">
                                        Please enter your name
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="phone" class="form-label text-white-75 fw-medium">Phone Number</label>
                                    <input type="tel" name="phone"
                                        class="form-control form-control-lg bg-transparent border-gray text-white-75"
                                        required>
                                    <div class="invalid-feedback text-danger small mt-1">
                                        Enter a valid 10-digit phone number
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="eventType" class="form-label text-white-75 fw-medium">Event Type</label>
                                    <select name="service_id"
                                        class="form-select form-select-lg bg-transparent border-gray text-white-75"
                                        required>
                                        <option value="" disabled selected>Select Event</option>

                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">
                                                {{ $service->title }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <div class="invalid-feedback text-danger small mt-1">
                                        Please select event type
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="eventDate" class="form-label text-white-75 fw-medium">Event Date
                                        (optional)</label>
                                    <input type="date" name="event_date"
                                        class="form-control form-control-lg bg-transparent border-gray text-white-75">
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label text-white-75 fw-medium">Your Message</label>
                                    <textarea name="message" class="form-control bg-transparent border-gray text-white-75"
                                        rows="5" required></textarea>
                                    <div class="invalid-feedback text-danger small mt-1">
                                        Please tell us a little about your event
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn magic-btn btn-lg px-5 py-3 w-100 w-md-auto">
                                        <i class="fa-solid fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right: Contact Details Card -->
                <div class="col-lg-6">
                    <div class="glass p-4 p-lg-5 rounded-4 shadow-xl h-100">
                        <h4 class="fw-bold mb-4" style="color: var(--accent);">Get in Touch</h4>

                        <div class="contact-details mb-5">
                            <p class="mb-3 fs-5"><i
                                    class="fa-solid fa-phone-volume me-3 text-accent"></i>{{ $contact->phone ?? '' }}
                            </p>
                            <p class="mb-4 fs-5"><i
                                    class="fa-brands fa-whatsapp me-3 text-accent"></i>{{ $contact->whatsapp ?? '' }}(Click
                                to Chat)</p>
                            <p class="mb-4 fs-5"><i
                                    class="fa-solid fa-envelope me-3 text-accent"></i>{{ $contact->email ?? ''}}</p>
                        </div>

                        <h5 class="fw-semibold mb-3" style="color: var(--accent-light);">Our Location</h5>
                        <p class="text-white-75 mb-0">
                            {{ $contact->address ?? '' }}<br>
                            <small>(Exact address shared after booking confirmation)</small>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Full Width Map Card at Bottom -->
            <div class="glass rounded-4 overflow-hidden shadow-xl">
                <div class="map-wrapper" style="height: 450px;">
                    <iframe src="{{ $contact->map_iframe ?? ""}}" width="100%" height="100%" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- WhatsApp Floating CTA -->
            <div class="text-center mt-5">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp) }}?text={{ urlencode('Hi Magician Badshah, I want to book a party.') }}"
                    target="_blank" class="btn btn-outline-accent btn-lg px-5 py-3">
                    <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp Now
                </a>
            </div>
        </div>
    </section>

@endsection