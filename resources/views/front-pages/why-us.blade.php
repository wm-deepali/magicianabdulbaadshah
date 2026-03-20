@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>क्यों चुनें BayepurBazaar.com? - अपना गाँव, अपना बाज़ार</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');

            body {
                font-family: 'Noto Sans Devanagari', system-ui, sans-serif;
            }

            .benefit-card {
                transition: all 0.4s ease;
            }

            .benefit-card:hover {
                transform: translateY(-12px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>

    <body class="bg-gray-50">


        <!-- HERO -->
        <div
            class="bg-gradient-to-br from-teal-600 via-teal-700 to-orange-600 text-white py-24 md:py-32 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://picsum.photos/id/1015/1920/1080')] bg-cover bg-center">
            </div>
            <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight drop-shadow-lg">
                    {{ $data->hero_title ?? 'क्यों चुनें BayepurBazaar.com?' }}
                </h1>

                <div class="text-xl md:text-2xl max-w-4xl mx-auto font-light opacity-95">
                    {!! $data->hero_subtitle !!}
                </div>
            </div>
        </div>

        <!-- WHY SECTION - Local Dukandaar ke liye -->
        <div class="max-w-7xl mx-auto px-6 py-20">
            <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-4">
                {!! $data->shopkeeper_title !!}
            </h2>

            <div class="text-center text-xl text-gray-600 max-w-4xl mx-auto mb-16">
                {!! $data->shopkeeper_description !!}
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($shopkeeperBenefits as $item)

                    @php
                        $isEven = $loop->index % 2 == 0;
                    @endphp

                    <div class="benefit-card bg-white rounded-3xl p-8 shadow-lg text-center 
                            {{ $isEven ? 'border border-teal-100' : 'border border-orange-100' }}">

                        <div class="w-24 h-24 mx-auto rounded-full flex items-center justify-center text-5xl mb-6
                                {{ $isEven ? 'bg-teal-100' : 'bg-orange-100' }}">

                            <i class="{{ $item->icon }} 
                                    {{ $isEven ? 'text-teal-700' : 'text-orange-700' }}">
                            </i>

                        </div>

                        <h3 class="text-2xl font-bold mb-4
                                {{ $isEven ? 'text-teal-800' : 'text-orange-800' }}">
                            {{ $item->title }}
                        </h3>

                        <div class="text-gray-700 text-lg">
                            {!! $item->description !!}
                        </div>

                    </div>

                @endforeach

            </div>


        </div>

        <!-- FOR CUSTOMERS / LOG SECTION -->
        <div class="bg-gradient-to-r from-gray-50 to-teal-50 py-20">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-6">
                    {!! $data->customer_title !!}
                </h2>

                <div class="text-center text-xl text-gray-600 max-w-4xl mx-auto mb-16">
                    {!! $data->customer_description !!}
                </div>

                <div class="grid md:grid-cols-3 gap-8 text-center">

                    @foreach($customerBenefits as $item)

                        @php
                            $isEven = $loop->index % 2 == 0;
                        @endphp

                        <div class="p-8">

                            <i class="{{ $item->icon }} text-6xl mb-6
                        {{ $isEven ? 'text-teal-600' : 'text-orange-600' }}">
                            </i>

                            <h3 class="text-2xl font-bold mb-4
                        {{ $isEven ? 'text-teal-700' : 'text-orange-700' }}">
                                {{ $item->title }}
                            </h3>

                            <p class="text-gray-700 text-lg">
                                {!! $item->description !!}
                            </p>

                        </div>

                    @endforeach

                </div>
            </div>
        </div>

        <!-- FINAL CALL TO ACTION -->
        <div class="bg-teal-700 text-white py-20 text-center">
            <div class="max-w-5xl mx-auto px-6">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    {{ $data->cta_title }}
                </h2>

                <div class="text-xl md:text-2xl mb-10 max-w-4xl mx-auto">
                    {!! $data->cta_description !!}
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="{{  url('/#add-listing') }}"
                        class="bg-white text-teal-700 hover:bg-gray-100 px-12 py-6 rounded-2xl font-bold text-xl shadow-xl transition">
                        <i class="fa-solid fa-store mr-3"></i> अपनी दुकान लिस्ट करें (मुफ्त)
                    </a>
                    <a href="{{ route('listing') }}"
                        class="bg-orange-600 hover:bg-orange-700 px-12 py-6 rounded-2xl font-bold text-xl shadow-xl transition">
                        <i class="fa-solid fa-magnifying-glass mr-3"></i> अभी खोजें और ऑर्डर करें
                    </a>
                </div>
            </div>
        </div>

@endsection