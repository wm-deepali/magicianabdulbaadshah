@extends('layouts.app')

<style>
.hero-bg {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
    url('{{ $hero && $hero->background_image 
        ? asset('storage/'.$hero->background_image) 
        : 'https://picsum.photos/id/1015/1920/600' }}') center/cover;
}
</style>

@section('content')

    <!-- HERO -->
    <div class="hero-bg h-[380px] flex items-center text-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold mb-4 leading-tight">{{ $hero->title ?? 'बयेपुर का अपना बाज़ार'}}</h2>
            <p class="text-xl max-w-2xl mx-auto">{{ $hero->subtitle ?? 'अपने गांव के व्यापारियों से सीधे जुड़ें। खोजें, कॉल करें, ऑर्डर करें – सब
                    कुछ एक क्लिक में।'}}</p>
            <div class="mt-8 flex justify-center gap-4">
                <button onclick="document.getElementById('listings-section').scrollIntoView({behavior:'smooth'})"
                    class="bg-orange-600 hover:bg-orange-700 px-10 py-4 rounded-3xl text-lg font-semibold shadow-lg">
                    {{ $hero->button_text ?? 'अभी खोजें'}}
                </button>
            </div>
        </div>
    </div>

    <!-- SUB CATEGORIES -->
    <div class="max-w-7xl mx-auto px-6 py-8">
        <h3 class="text-xl font-semibold mb-5 text-gray-800">लोकप्रिय श्रेणियाँ</h3>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

            @foreach($popularCategories as $category)

                <div onclick="window.location='{{ route('listing', ['category' => $category->slug]) }}'"
                    class="bg-white border border-gray-200 rounded-2xl p-4 flex items-center gap-4 cursor-pointer hover:border-teal-300 transition">

                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="w-12 h-12 object-cover rounded-lg">
                    @else
                        <i class="fa-solid fa-layer-group text-3xl text-teal-500"></i>
                    @endif

                    <div>
                        <p class="font-medium">{{ $category->name }}</p>

                        <p class="text-xs text-gray-500">
                            {{ $category->listings_count }} दुकानें
                        </p>
                    </div>

                </div>

            @endforeach

        </div>
    </div>

    <!-- FEATURED LISTINGS -->
    <div id="listings-section" class="max-w-7xl mx-auto px-6 py-12 bg-white">
        <div class="flex justify-between items-end mb-8">
            <h3 class="text-3xl font-bold text-gray-800">विशेष लिस्टिंग्स</h3>

            <a href="{{ route('listing') }}" class="text-teal-600 font-medium flex items-center gap-1 hover:underline">
                सभी देखें <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            @forelse($listings as $listing)

                <div class="listing-card bg-white border border-gray-200 rounded-3xl overflow-hidden">

                    <div class="h-48 bg-gray-100 flex items-center justify-center relative">

                        <img src="{{ $listing->image
                ? asset('storage/' . $listing->image)
                : asset('images/no-image.png') }}" alt="{{ $listing->business_name }}"
                            class="h-full w-full object-cover">

                        <div
                            class="absolute top-4 right-4 bg-white text-teal-600 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 shadow">
                            <i class="fa-solid fa-circle-check"></i>
                            सत्यापित
                        </div>
                    </div>

                    <div class="p-6">

                        <div class="row">
                            <h4 class="col-12 font-semibold text-xl">
                                {{ $listing->business_name }}
                            </h4>

                            <span class="col-12 text-xs bg-teal-100 text-teal-700 px-3 py-1 rounded-full">
                                {{ $listing->category->name ?? '' }}
                            </span>
                        </div>

                        <p class="text-gray-600 text-sm mt-2 line-clamp-2">
                            {{ $listing->short_description }}
                        </p>

                        <div class="mt-4 flex items-center gap-2 text-xs text-gray-500">
                            <i class="fa-solid fa-location-dot"></i>

                            <span>
                                {{ $listing->address }}
                            </span>
                        </div>

                        <div class="mt-6 flex gap-3">

                            <a href="tel:{{ $listing->mobile }}"
                                class="flex-1 bg-teal-600 text-white py-3 rounded-2xl text-center font-medium flex items-center justify-center gap-2">

                                <i class="fa-solid fa-phone"></i> कॉल करें
                            </a>

                            <a href="https://wa.me/91{{ $listing->whatsapp }}" target="_blank"
                                class="flex-1 bg-green-500 text-white py-3 rounded-2xl text-center font-medium flex items-center justify-center gap-2">

                                <i class="fa-brands fa-whatsapp"></i> व्हाट्सएप
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                </div>

                <div class="text-center">
                    <div class="border-2 border-[rgb(13,148,136)] rounded-2xl p-12 max-w-3xl mx-auto">

                        <p class="text-gray-600 text-lg">
                            No Data found under this Location.
                        </p>

                        <p class="text-gray-500 mt-2">
                            Please try with another Location
                        </p>

                    </div>

                    <a href="{{ route('listing')}}"
                        class="inline-block mt-8 px-8 py-4 rounded-full font-semibold text-white
                                                                                                    bg-[rgb(13,148,136)] hover:bg-[rgb(15,118,110)] transition">

                        View All Listings →
                    </a>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            @endforelse

        </div>
    </div>

    <!-- ABOUT COMPANY -->
    @if($homeSection)
        <div class="bg-teal-50 py-16">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-12 items-center">

                    <!-- LEFT CONTENT -->
                    <div>
                        <h2 class="text-4xl font-bold text-teal-800 mb-6">
                            {{ $homeSection->title }}
                        </h2>

                        <p class="text-lg leading-relaxed text-gray-700">
                            {!! $homeSection->description !!}
                        </p>

                        <div class="mt-8 grid grid-cols-3 gap-6">

                            <!-- STAT 1 -->
                            <div class="text-center">
                                <div class="text-4xl font-bold text-teal-600">
                                    {{ $homeSection->stat_1 }}
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    {{ $homeSection->stat_1_label }}
                                </div>
                            </div>

                            <!-- STAT 2 -->
                            <div class="text-center">
                                <div class="text-4xl font-bold text-teal-600">
                                    {{ $homeSection->stat_2 }}
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    {{ $homeSection->stat_2_label }}
                                </div>
                            </div>

                            <!-- STAT 3 -->
                            <div class="text-center">
                                <div class="text-4xl font-bold text-teal-600">
                                    {{ $homeSection->stat_3 }}
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    {{ $homeSection->stat_3_label }}
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- RIGHT IMAGE -->
                    <div class="bg-white p-8 rounded-3xl shadow-inner">
                        <img src="{{ $homeSection->image
                ? asset('storage/' . $homeSection->image)
                : 'https://picsum.photos/id/1016/600/400' }}" alt="about" class="rounded-2xl w-full h-auto">
                    </div>

                </div>
            </div>
        </div>
    @endif

    <!-- ABOUT BAYEPUR -->
    <div class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="text-4xl font-bold text-center mb-8 text-gray-800">बयेपुर के बारे में</h2>
        <div class="max-w-3xl mx-auto text-center text-lg leading-relaxed text-gray-700">
            बयेपुर घाज़ीपुर जिले का एक छोटा लेकिन समृद्ध गांव है। यहाँ की मुख्य अर्थव्यवस्था कृषि पर आधारित है। गेहूँ, धान,
            आलू और सब्जियों की खेती यहां प्रमुख है।
            गांव में अच्छी सड़कें, स्कूल, क्लिनिक और छोटे बाजार हैं। बयेपुर के लोग मेहनती, मेहमाननवाज़ और प्रगतिशील हैं।
            हमारा प्लेटफॉर्म इसी गांव को डिजिटल रूप से सशक्त बनाने का प्रयास है।
        </div>
    </div>

    <!-- HIGHLIGHTS -->
    <div class="bg-white py-16 border-t border-b">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center mb-12">हमारे हाइलाइट्स</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto bg-teal-100 rounded-2xl flex items-center justify-center text-4xl">📍
                    </div>
                    <h4 class="font-semibold mt-6 text-xl">स्थानीय फोकस</h4>
                    <p class="text-sm text-gray-600 mt-3">केवल बयेपुर और आसपास के क्षेत्र</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto bg-orange-100 rounded-2xl flex items-center justify-center text-4xl">✅
                    </div>
                    <h4 class="font-semibold mt-6 text-xl">सत्यापित लिस्टिंग</h4>
                    <p class="text-sm text-gray-600 mt-3">हर व्यापारी की पुष्टि की जाती है</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto bg-green-100 rounded-2xl flex items-center justify-center text-4xl">📞
                    </div>
                    <h4 class="font-semibold mt-6 text-xl">सीधा संपर्क</h4>
                    <p class="text-sm text-gray-600 mt-3">कॉल और व्हाट्सएप बटन</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto bg-purple-100 rounded-2xl flex items-center justify-center text-4xl">🚀
                    </div>
                    <h4 class="font-semibold mt-6 text-xl">मुफ्त रजिस्ट्रेशन</h4>
                    <p class="text-sm text-gray-600 mt-3">व्यापारियों के लिए पूरी तरह फ्री</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="max-w-4xl mx-auto px-6 py-16">
        <h3 class="text-3xl font-bold text-center mb-10">अक्सर पूछे जाने वाले सवाल</h3>

        @foreach($faqs as $faq)

            <details class="mb-4 bg-white rounded-3xl shadow-sm border">
                <summary class="px-8 py-6 font-medium cursor-pointer flex justify-between items-center">
                    {{ $faq->question }}
                </summary>

                <div class="px-8 pb-8 text-gray-600">
                    {{ $faq->answer }}
                </div>
            </details>

        @endforeach

    </div>

    <!-- FORM -->
    <div id="add-listing" class="bg-gradient-to-b from-teal-50 to-white py-16">

        <div class="max-w-2xl mx-auto px-6">

            <div class="bg-white rounded-3xl shadow-xl p-10">

                <h3 class="text-3xl font-bold text-center mb-8">
                    अपना बिजनेस लिस्ट करें
                </h3>

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-6 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('listing.submit') }}" class="space-y-6">

                    @csrf

                    <div>
                        <label class="block text-sm font-medium mb-2">
                            व्यवसाय का नाम
                        </label>

                        <input type="text" name="business_name" required
                            class="w-full border border-gray-300 rounded-2xl px-6 py-4 outline-none focus:border-teal-500"
                            placeholder="जैसे: राम किराना स्टोर">
                    </div>


                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                मोबाइल नंबर
                            </label>

                            <input type="tel" name="mobile" required
                                class="w-full border border-gray-300 rounded-2xl px-6 py-4 outline-none focus:border-teal-500"
                                placeholder="9876543210">
                        </div>


                        <div>
                            <label class="block text-sm font-medium mb-2">
                                श्रेणी
                            </label>

                            <select name="category_id" required
                                class="w-full border border-gray-300 rounded-2xl px-6 py-4 outline-none focus:border-teal-500">

                                <option value="">श्रेणी चुनें</option>

                                @foreach($categories as $category)

                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>

                                @endforeach

                            </select>
                        </div>

                    </div>


                    <div>
                        <label class="block text-sm font-medium mb-2">
                            लोकेशन
                        </label>

                        <select name="location_id"
                            class="w-full border border-gray-300 rounded-2xl px-6 py-4 outline-none focus:border-teal-500">

                            @foreach($locations as $location)

                                <option value="{{ $location->id }}">
                                    {{ $location->location }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    <div>
                        <label class="block text-sm font-medium mb-2">
                            संक्षिप्त विवरण
                        </label>

                        <textarea name="short_description" required rows="3"
                            class="w-full border border-gray-300 rounded-2xl px-6 py-4 outline-none focus:border-teal-500"
                            placeholder="अपने व्यवसाय के बारे में 2-3 लाइन लिखें..."></textarea>
                    </div>

                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-teal-600 to-orange-600 text-white py-5 rounded-3xl font-semibold text-lg hover:from-teal-700 hover:to-orange-700 transition">

                        लिस्टिंग सबमिट करें

                    </button>


                </form>

            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection