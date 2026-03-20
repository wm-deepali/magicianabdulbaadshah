@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>बयेपुर बाज़ार - सभी लिस्टिंग्स</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');

            body {
                font-family: 'Noto Sans Devanagari', system-ui, sans-serif;
            }

            .sticky-top {
                position: sticky;
                top: 0;
                z-index: 40;
            }

            .listing-card {
                transition: all 0.25s ease;
            }

            .listing-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>

    <body class="bg-gray-50">



        <!-- MAIN CONTENT -->
        <main class="max-w-7xl mx-auto px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- LEFT SIDEBAR - CATEGORIES -->
                <aside class="lg:w-80 bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit lg:sticky lg:top-20">
                    <h2 class="text-xl font-bold mb-6 flex items-center gap-3">
                        <i class="fa-solid fa-list text-teal-600"></i>
                        सभी श्रेणियाँ
                    </h2>

                    <ul class="space-y-2">

                        <li>
                            <a href="{{ route('listing') }}"
                                class="block px-4 py-3 rounded-xl bg-teal-50 text-teal-700 font-medium">
                                सभी श्रेणियाँ
                            </a>
                        </li>

                        @foreach($categories as $category)

                                            <li>
                                                <a href="{{ route('listing', array_merge(request()->query(), [
                                'category' => $category->slug,
                                'subcategory' => null
                            ])) }}" class="block px-4 py-3 rounded-xl flex justify-between items-center transition
                                                                            {{ request('category') == $category->slug
                                ? 'bg-teal-600 text-white'
                                : 'hover:bg-gray-50'
                                                                            }}">

                                                    <span>{{ $category->name }}</span>

                                                    <span class="text-xs px-2 py-1 rounded-full
                                                                            {{ request('category') == $category->slug
                                ? 'bg-white text-teal-600'
                                : 'bg-gray-200 text-gray-700'
                                                                            }}">
                                                        {{ $category->listings_count }}
                                                    </span>

                                                </a>
                                            </li>

                        @endforeach

                    </ul>

                    <div class="mt-8 pt-6 border-t">
                        <h3 class="font-semibold mb-4">फिल्टर</h3>

                        <form method="GET" action="{{ route('listing') }}" class="space-y-4">

                            <input type="hidden" name="category" value="{{ request('category') }}">
                            <input type="hidden" name="subcategory" value="{{ request('subcategory') }}">
                            <input type="hidden" name="sort" value="{{ request('sort') }}">


                            <div>
                                <label class="block text-sm font-medium mb-2">स्थान</label>

                                <select name="location" class="w-full border rounded-lg px-4 py-2">

                                    <option value="">सभी स्थान</option>

                                    @foreach($locations as $location)

                                        <option value="{{ $location->id }}" {{ request('location') == $location->id ? 'selected' : '' }}>{{ $location->location }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div>

                                <label class="block text-sm font-medium mb-2">सत्यापित</label>

                                <label class="flex items-center gap-2">

                                    <input type="checkbox" name="verified" value="1" {{ request('verified') ? 'checked' : '' }} class="rounded text-teal-600">

                                    <span>केवल सत्यापित दिखाएँ</span>

                                </label>

                            </div>

                            <div>

                                <button type="submit"
                                    class="w-full bg-teal-600 text-white py-3 rounded-xl mt-4 hover:bg-teal-700">

                                    फ़िल्टर लागू करें

                                </button>

                            </div>

                        </form>

                    </div>
                </aside>

                <!-- RIGHT SIDE - LISTINGS -->
                <div class="flex-1">
                    <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
                        <h2 class="text-2xl font-bold">सभी लिस्टिंग्स <span class="text-gray-500 text-xl">
                                ({{ $listings->total() }} परिणाम)
                            </span></h2>

                        <div class="flex items-center gap-4">
                            <form method="GET" action="{{ route('listing') }}" class="flex items-center gap-4">

                                {{-- Keep existing filters when sorting --}}
                                <input type="hidden" name="location" value="{{ request('location') }}">
                                <input type="hidden" name="verified" value="{{ request('verified') }}">
                                <input type="hidden" name="category" value="{{ request('category') }}">
                                <input type="hidden" name="subcategory" value="{{ request('subcategory') }}">

                                <select name="sort" onchange="this.form.submit()"
                                    class="border rounded-lg px-4 py-2 bg-white">

                                    <option value="">प्रासंगिकता के अनुसार</option>

                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>
                                        नवीनतम पहले
                                    </option>

                                    <option value="verified" {{ request('sort') == 'verified' ? 'selected' : '' }}>
                                        सत्यापित पहले
                                    </option>

                                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>
                                        रेटिंग के अनुसार
                                    </option>

                                </select>

                            </form>
                            <div class="flex border rounded-lg overflow-hidden">
                                <button class="px-4 py-2 bg-gray-100"><i class="fa-solid fa-th-large"></i></button>
                                <button class="px-4 py-2 bg-teal-600 text-white"><i class="fa-solid fa-list"></i></button>
                            </div>
                        </div>
                    </div>

                    @if($subcategories->count())

                        <div class="mb-8">

                            <h3 class="text-xl font-bold mb-4">
                                उप-श्रेणियाँ
                            </h3>

                            <div class="flex flex-wrap gap-3">

                                @foreach($subcategories as $sub)

                                                    <a href="{{ route('listing', array_merge(request()->query(), [
                                        'subcategory' => $sub->slug
                                    ])) }}" class="px-4 py-2 rounded-full text-sm transition
                                                                                                                        {{ request('subcategory') == $sub->slug
                                        ? 'bg-teal-600 text-white border border-teal-600'
                                        : 'bg-white border border-gray-200 hover:bg-teal-50 hover:border-teal-400'
                                                                                                                        }}">
                                                        {{ $sub->name }}

                                                    </a>

                                @endforeach

                            </div>

                        </div>

                    @endif
                    <!-- Horizontal Listing Cards -->
                    <div class="space-y-6">

                        @foreach($listings as $listing)
<a href="{{ route('listing.show', $listing->id) }}" class="block">

                                        <div
                                            class="listing-card bg-white rounded-2xl border border-gray-200 overflow-hidden flex flex-col md:flex-row">

                                            <div class="md:w-64 h-64 md:h-auto relative flex-shrink-0">

                                                <img src="{{ $listing->image
                            ? asset('storage/' . $listing->image)
                            : asset('images/no-image.png') }}" alt="{{ $listing->business_name }}"
                                                    class="w-full h-full object-cover">

                                                <div
                                                    class="absolute top-4 right-4 bg-white text-teal-600 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 shadow">
                                                    <i class="fa-solid fa-circle-check"></i> सत्यापित
                                                </div>

                                            </div>

                                            <div class="p-6 flex-1 flex flex-col">

                                                <div class="flex justify-between items-start">

                                                    <div>
                                                        <h3 class="text-xl font-bold">
                                                            {{ $listing->business_name }}
                                                        </h3>

                                                        <p class="text-sm text-gray-500 mt-1">

                                                            {{ $listing->category->name ?? '' }}

                                                            • {{ $listing->address }}

                                                        </p>
                                                    </div>

                                                    <span class="bg-teal-100 text-teal-700 px-4 py-1 rounded-full text-sm font-medium">

                                                        {{ $listing->category->name ?? '' }}

                                                    </span>

                                                </div>

                                                <p class="mt-4 text-gray-600 line-clamp-3 flex-1">

                                                    {{ $listing->short_description }}

                                                </p>

                                                <div class="mt-6 flex flex-wrap gap-4 items-center">

                                                    <a href="tel:{{ $listing->mobile }}"
                                                        class="flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-xl hover:bg-teal-700">

                                                        <i class="fa-solid fa-phone"></i> कॉल करें

                                                    </a>

                                                    @if($listing->whatsapp)

                                                        <a href="https://wa.me/91{{ $listing->whatsapp }}" target="_blank"
                                                            class="flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-xl hover:bg-green-600">

                                                            <i class="fa-brands fa-whatsapp"></i> व्हाट्सएप

                                                        </a>

                                                    @endif

                                                    <span class="text-sm text-gray-500 flex items-center gap-1">

                                                        <i class="fa-solid fa-location-dot"></i>

                                                        {{ $listing->location->location ?? '' }}

                                                    </span>

                                                </div>

                                            </div>

                                        </div>
</a>
                        @endforeach

                    </div>


                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center gap-3">

                        @if ($listings->onFirstPage())

                            <button class="px-6 py-3 border rounded-xl opacity-50">पिछला</button>

                        @else

                            <a href="{{ $listings->previousPageUrl() }}" class="px-6 py-3 border rounded-xl hover:bg-gray-50">

                                पिछला

                            </a>

                        @endif


                        @foreach ($listings->getUrlRange(1, $listings->lastPage()) as $page => $url)

                            @if ($page == $listings->currentPage())

                                <span class="px-6 py-3 bg-teal-600 text-white rounded-xl">

                                    {{ $page }}

                                </span>

                            @else

                                <a href="{{ $url }}" class="px-6 py-3 border rounded-xl hover:bg-gray-50">

                                    {{ $page }}

                                </a>

                            @endif

                        @endforeach


                        @if ($listings->hasMorePages())

                            <a href="{{ $listings->nextPageUrl() }}" class="px-6 py-3 border rounded-xl hover:bg-gray-50">

                                अगला

                            </a>

                        @else

                            <button class="px-6 py-3 border rounded-xl opacity-50">

                                अगला

                            </button>

                        @endif
                    </div>
                </div>
            </div>
        </main>

@endsection