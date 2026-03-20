@extends('layouts.app')

@section('title', $listing->business_name . ' - BayepurBazaar')

@section('content')


    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 py-8 lg:py-12">

        <div class="grid lg:grid-cols-12 gap-8">

            <!-- LEFT - Bigger section: Detailed Content (8/12 width on desktop) -->
            <div class="lg:col-span-8 space-y-10">

                <!-- Business Name + Verified Badge (top of content area) -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900">
                        {{ $listing->business_name }}
                    </h1>
                    <span
                        class="bg-green-100 text-green-800 px-6 py-2 rounded-full text-lg font-medium flex items-center gap-2 self-start sm:self-center">
                        <i class="fa-solid fa-circle-check"></i> सत्यापित
                    </span>
                </div>

                <!-- Main Business Image / Logo -->
                <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="{{ $listing->image ? asset('storage/' . $listing->image) : 'https://via.placeholder.com/600' }}"
                        class="w-full h-auto object-cover aspect-[4/3] lg:aspect-video">
                </div>

                <!-- Short Description -->
                <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">व्यवसाय के बारे में</h2>
                    <div class="text-gray-700 text-lg leading-relaxed">
                        {{ $listing->short_description }}
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">श्रेणियाँ</h2>
                    <div class="flex flex-wrap gap-3">
                        <span class="bg-teal-50 text-teal-800 px-6 py-3 rounded-full text-base font-medium">
                            {{ $listing->category->name ?? '' }}</span>
                        @if($listing->subcategory)
                            <span class="bg-orange-50 text-orange-800 px-6 py-3 rounded-full text-base font-medium">
                                {{ $listing->subcategory->name }}
                            </span>
                        @endif

                    </div>
                </div>

                <!-- Services / Specialties -->
                @if($listing->services)
                    <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">
                            विशेष सेवाएँ / विशेषताएँ
                        </h2>

                        <ul class="space-y-4 text-gray-700 text-lg">

                            @foreach(explode(',', $listing->services) as $service)
                                <li class="flex items-start gap-4">
                                    <i class="fa-solid fa-check-circle text-teal-600 text-2xl mt-1 flex-shrink-0"></i>
                                    <span>{{ trim($service) }}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                @endif
                <!-- Full Address -->
                <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">पूरा पता</h2>
                    <div class="flex items-start gap-5 bg-gray-50 p-6 rounded-xl">
                        <i class="fa-solid fa-location-dot text-5xl text-red-600 mt-1"></i>
                        <div class="text-lg">
                            <p class="font-medium"> {{ $listing->business_name }}</p>
                            <p class="text-gray-700">{{ $listing->address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT - Smaller sidebar: Logo + Basic Info + Contact Buttons -->
            <div
                class="lg:col-span-4 bg-white rounded-2xl shadow-xl p-6 lg:p-8 border border-gray-100 h-fit lg:sticky lg:top-20">

                <!-- Business Logo -->
                <div class="mb-8 text-center">
                    <img src="{{ $listing->logo
        ? asset('storage/' . $listing->logo)
        : ($listing->image ? asset('storage/' . $listing->image) : 'https://via.placeholder.com/200') }}"
                        class="w-48 h-48 sm:w-56 sm:h-56 lg:w-64 lg:h-64 mx-auto object-contain rounded-2xl shadow-lg border-4 border-teal-100">
                </div>

                <!-- Basic Info -->
                <div class="space-y-6 text-center lg:text-left">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900"> {{ $listing->business_name }}</h3>
                        <p class="text-gray-600 mt-1">{{ $listing->category->name ?? '' }}</p>
                    </div>

                    <div
                        class="inline-flex items-center gap-2 bg-green-100 text-green-800 px-6 py-2 rounded-full text-base font-medium">
                        <i class="fa-solid fa-circle-check"></i> सत्यापित
                    </div>

                    <!-- Contact Buttons -->
                    <div class="flex flex-col gap-4 mt-8">
                        <a href="tel:{{ $listing->mobile }}"
                            class="bg-teal-600 hover:bg-teal-700 text-white py-5 rounded-2xl text-center font-bold text-lg flex items-center justify-center gap-3 shadow-lg transition">
                            <i class="fa-solid fa-phone text-xl"></i> कॉल करें
                        </a>
                        @if($listing->whatsapp)
                            <a href="https://wa.me/91{{ $listing->whatsapp }}" target="_blank"
                                class="bg-green-600 hover:bg-green-700 text-white py-5 rounded-2xl text-center font-bold text-lg flex items-center justify-center gap-3 shadow-lg transition">
                                <i class="fa-brands fa-whatsapp text-2xl"></i> व्हाट्सएप पर बात करें
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Navigation -->
        <div class="mt-12 flex flex-col sm:flex-row justify-between items-center gap-6 text-center border-t pt-8">
            <a href="{{ route('listing') }}"
                class="text-teal-600 hover:text-teal-800 font-medium flex items-center gap-2 text-lg">
                <i class="fa-solid fa-arrow-left-long"></i> सभी लिस्टिंग्स देखें
            </a>

            <div class="flex gap-8">
                <button onclick="sharePage()" class="text-gray-600 hover:text-gray-900 flex items-center gap-2 text-lg">
                    <i class="fa-solid fa-share-nodes"></i> शेयर करें
                </button>
            </div>

        </div>

    </main>


    <script>
        function sharePage() {
            if (navigator.share) {
                navigator.share({
                    title: "{{ $listing->business_name }}",
                    text: "इस दुकान को देखें:",
                    url: window.location.href
                });
            } else {
                alert("Sharing not supported on this device");
            }
        }
    </script>
@endsection