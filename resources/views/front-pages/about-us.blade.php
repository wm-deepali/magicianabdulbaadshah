@extends('layouts.app')

@section('content')

    <!-- HERO SECTION -->
    <div class="bg-gradient-to-br from-teal-700 via-teal-800 to-orange-700 text-white py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-5 leading-tight">{{ $about->hero_title ?? 'हमारे बारे में' }}</h1>
            <p class="text-xl md:text-2xl max-w-4xl mx-auto opacity-90">
                {{ $about->hero_subtitle ?? 'बयेपुर का अपना डिजिटल बाज़ार – जहाँ गाँव की ताकत, व्यापार की उन्नति और लोगों का विकास एक साथ चलता है।' }}
            </p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-6 py-16 space-y-20">

        <!-- About Bayepur Bazaar -->
        <section class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-800 mb-6">{{ $about->about_title ?? 'बयेपुर बाज़ार क्या है?'}}</h2>
                <div class="text-lg text-gray-700 leading-relaxed">
                    {!! $about->about_description !!}
                </div>

            </div>
            <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-teal-100">
                <img src="{{ $about->about_image ? asset('storage/' . $about->about_image) : 'https://picsum.photos/800/600' }}"
                    class="w-full h-auto object-cover">
            </div>
        </section>

        <!-- Vision, Mission, Objective -->
        <section class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-teal-100 hover:shadow-2xl transition">
                <div class="w-20 h-20 mx-auto bg-teal-100 rounded-full flex items-center justify-center text-4xl mb-6">
                    <i class="fa-solid fa-eye text-teal-700"></i>
                </div>
                <h3 class="text-2xl font-bold text-center mb-4 text-teal-800">हमारा विजन</h3>
                <div class="text-gray-700 text-center text-lg">
                    {!! $about->vision !!}
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg border border-orange-100 hover:shadow-2xl transition">
                <div class="w-20 h-20 mx-auto bg-orange-100 rounded-full flex items-center justify-center text-4xl mb-6">
                    <i class="fa-solid fa-bullseye text-orange-700"></i>
                </div>
                <h3 class="text-2xl font-bold text-center mb-4 text-orange-800">हमारा मिशन</h3>
                <div class="text-gray-700 text-center text-lg">
                    {!! $about->mission !!}
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg border border-teal-100 hover:shadow-2xl transition">
                <div class="w-20 h-20 mx-auto bg-teal-100 rounded-full flex items-center justify-center text-4xl mb-6">
                    <i class="fa-solid fa-list-check text-teal-700"></i>
                </div>
                <h3 class="text-2xl font-bold text-center mb-4 text-teal-800">हमारे उद्देश्य</h3>
                <div class="text-gray-700 text-lg space-y-3 list-disc pl-6">
                    {!! $about->objectives !!}
                </div>
            </div>
        </section>

        <!-- Founder Section -->
        <section class="bg-gradient-to-r from-teal-50 to-orange-50 rounded-3xl p-10 md:p-16 shadow-xl">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">संस्थापक</h2>
                    <h3 class="text-3xl font-bold text-teal-700 mb-4">
                        {{ $about->founder_name }}
                    </h3>

                    <div class="text-xl text-gray-700 mb-6 leading-relaxed">
                        {!! $about->founder_description !!}
                    </div>

                    <p class="text-lg text-gray-600 italic">
                        {{ $about->founder_quote }}
                    </p>

                    <div class="mt-8 flex gap-6 text-3xl">
                        <a href="{{ $about->linkedin }}" target="_blank" class="text-teal-600 hover:text-teal-800">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="{{ $about->instagram }}" target="_blank" class="text-orange-600 hover:text-orange-800">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="{{ $about->whatsapp }}" target="_blank" class="text-green-600 hover:text-green-800">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <div class="relative">
                        <img src="{{ $about->founder_image ? asset('storage/' . $about->founder_image) : 'https://picsum.photos/600/700' }}"
                            class="rounded-3xl shadow-2xl w-full h-auto object-cover border-8 border-white">
                        <div
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 bg-teal-600 text-white px-8 py-3 rounded-full font-bold text-lg shadow-lg">
                            संस्थापक
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final Call to Action -->
        <div class="text-center py-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6">
                {{ $about->cta_title }}
            </h3>

            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                {{ $about->cta_description }}
            </p>

           
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ route('contact') }}"
                    class="bg-teal-600 hover:bg-teal-700 text-white px-10 py-5 rounded-2xl font-bold text-lg transition shadow-lg">
                    हमसे जुड़ें
                </a>
                <a href="{{ route('mandal.members') }}"
                    class="bg-orange-600 hover:bg-orange-700 text-white px-10 py-5 rounded-2xl font-bold text-lg transition shadow-lg">
                    मंडल सदस्य देखें
                </a>
            </div>
        </div>
    </div>

@endsection