@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>अक्सर पूछे जाने वाले सवाल (FAQ) - BayepurBazaar.com</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');

            body {
                font-family: 'Noto Sans Devanagari', system-ui, sans-serif;
            }

            details summary {
                cursor: pointer;
            }

            details[open] summary {
                background-color: #f0fdfa;
            }
        </style>
    </head>




    <!-- HERO -->
    <div class="bg-gradient-to-r from-teal-600 to-teal-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">अक्सर पूछे जाने वाले सवाल</h1>
            <p class="text-xl max-w-3xl mx-auto">व्यापारी (सेलर्स) और सदस्य (यूजर्स) दोनों के लिए स्पष्ट जवाब। अगर आपका सवाल
                यहाँ नहीं है तो हमें संपर्क करें!</p>
        </div>
    </div>

    <!-- MAIN FAQ -->
    <div class="max-w-4xl mx-auto px-6 py-12">

        <div class="space-y-4">

            @forelse($faqs as $faq)

                <details class="bg-white rounded-2xl shadow-sm border mb-4">

                    <summary class="px-6 py-5 font-semibold text-lg flex justify-between items-center">

                        {{ $faq->question }}

                        <i class="fa-solid fa-chevron-down transition-transform"></i>

                    </summary>

                    <div class="px-6 pb-6 pt-2 text-gray-700">

                        {!! $faq->answer !!}

                    </div>

                </details>

            @empty

                <div class="text-center text-gray-500 py-8">
                    कोई FAQ उपलब्ध नहीं है
                </div>

            @endforelse

        </div>

        <div class="text-center mt-12 py-8 bg-white rounded-2xl shadow-sm border">
            <h3 class="text-2xl font-bold mb-4">आपका सवाल यहाँ नहीं है?</h3>
            <p class="text-gray-600 mb-6">हमसे सीधे बात करें – हम 24 घंटे में जवाब देंगे!</p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-teal-600 hover:bg-teal-700 text-white px-10 py-4 rounded-2xl font-semibold text-lg transition">
                संपर्क फॉर्म खोलें
            </a>
        </div>
    </div>

@endsection