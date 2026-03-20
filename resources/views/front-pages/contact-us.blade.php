@extends('layouts.app')

@section('content')

    <!-- HERO SECTION -->
    <div class="bg-gradient-to-r from-teal-700 to-teal-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">हमसे संपर्क करें</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">आपके सुझाव, शिकायत या सहयोग के लिए हम हमेशा तैयार हैं। नीचे दिए
                गए तरीकों से हमें तुरंत बताएं!</p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16">

            <!-- LEFT: CONTACT INFO + MAP -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">हमारे संपर्क विवरण</h2>

                <div class="space-y-8">
                    <!-- Address -->
                    <div class="flex items-start gap-4">
                        <div
                            class="bg-teal-100 text-teal-600 w-14 h-14 rounded-full flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">पता</h3>
                            <p class="text-gray-600 mt-1">
                                {!! nl2br($settings->address ?? '') !!}
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4">
                        <div
                            class="bg-orange-100 text-orange-600 w-14 h-14 rounded-full flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">फोन / व्हाट्सएप</h3>
                            <p class="text-gray-600 mt-1">
                              <a href="tel:{{ $settings->phone }}">
{{ $settings->phone }}
</a>

<br>

<a href="tel:{{ $settings->support_phone }}">
{{ $settings->support_phone }}
</a>
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div
                            class="bg-blue-100 text-blue-600 w-14 h-14 rounded-full flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">ईमेल</h3>
                            <p class="text-gray-600 mt-1">
                                <a href="mailto:{{ $settings->email }}">
{{ $settings->email }}
</a>

<br>

<a href="mailto:{{ $settings->support_email }}">
{{ $settings->support_email }}
</a>
                            </p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start gap-4">
                        <div
                            class="bg-green-100 text-green-600 w-14 h-14 rounded-full flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">कार्य समय</h3>
                            <p class="text-gray-600 mt-1">सोमवार से शनिवार: सुबह 9:00 से शाम 7:00 बजे<br>रविवार: बंद
                                (आपातकालीन व्हाट्सएप उपलब्ध)</p>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mt-10">
                    <h3 class="font-semibold text-lg mb-4">सोशल मीडिया पर फॉलो करें</h3>
                    <div class="flex gap-6 text-3xl">
                       <a href="{{ $settings->facebook }}"><i class="fa-brands fa-facebook"></i></a>

<a href="{{ $settings->instagram }}"><i class="fa-brands fa-instagram"></i></a>

<a href="{{ $settings->twitter }}"><i class="fa-brands fa-twitter"></i></a>

<a href="{{ $settings->whatsapp }}"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Google Map -->
                <div class="mt-10">
                    <h3 class="font-semibold text-lg mb-4">हमारा स्थान</h3>
                    <div class="rounded-2xl overflow-hidden border shadow-sm h-80">
                        <!-- Replace with your actual embed code from Google Maps -->
                        <iframe
                            src="{!! $settings->google_map !!}"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <!-- RIGHT: CONTACT FORM -->
            <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-10 border">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">मैसेज भेजें</h2>
                <p class="text-gray-600 mb-8">आपका संदेश हमें तुरंत मिलेगा। कृपया सही जानकारी भरें।</p>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">आपका नाम *</label>
                        <input type="text" name="name" required
                            class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200"
                            placeholder="पूर्ण नाम लिखें">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">मोबाइल नंबर *</label>
                            <input type="tel" name="mobile" required
                                class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200"
                                placeholder="9876543210">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ईमेल पता *</label>
                            <input type="email" name="email" required
                                class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200"
                                placeholder="your@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">विषय *</label>
                        <input type="text" name="subject" required
                            class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200"
                            placeholder="जैसे: लिस्टिंग समस्या, सुझाव आदि">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">आपका संदेश *</label>
                        <textarea name="message" rows="6" required
                            class="w-full border border-gray-300 rounded-xl py-3 px-5 focus:outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200"
                            placeholder="अपनी समस्या या सुझाव विस्तार से लिखें..."></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-teal-600 to-orange-600 text-white py-4 rounded-2xl font-bold text-lg hover:from-teal-700 hover:to-orange-700 transition shadow-lg">
                        संदेश भेजें
                    </button>
                </form>

                <p class="text-center text-sm text-gray-500 mt-6">हम 24 घंटे के अंदर जवाब देंगे। धन्यवाद!</p>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection