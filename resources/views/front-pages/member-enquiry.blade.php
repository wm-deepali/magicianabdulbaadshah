@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>मेंबर बनें | BayepurBazaar.com - बयेपुर के साथ जुड़ें</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700;900&display=swap');

            body {
                font-family: 'Noto Sans Devanagari', system-ui, sans-serif;
            }

            .gradient-bg {
                background: linear-gradient(135deg, #0d9488 0%, #115e59 100%);
            }

            .input-focus:focus {
                outline: none;
                box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.3);
            }
        </style>
    </head>

    <body class="bg-gray-50">



        <!-- HERO + MOTIVATION -->
        <section class="gradient-bg text-white py-20 md:py-28">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <div class="inline-block bg-white/20 backdrop-blur-sm px-6 py-2 rounded-full mb-6 text-sm font-medium">
                    बयेपुर के लिए कुछ करना चाहते हैं?
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight drop-shadow-lg">
                    बयेपुर का हिस्सा बनें
                </h1>

                <p class="text-xl md:text-2xl max-w-4xl mx-auto mb-10 font-light opacity-95">
                    चाहे आप बयेपुर के मूल निवासी हों, बाहर रहते हों, या सिर्फ इस गाँव से लगाव रखते हों...<br>
                    <span class="font-semibold text-orange-300">अगर आप बयेपुर के लोगों की मदद करना चाहते हैं,</span><br>
                    दुकानदारों को डिजिटल दुनिया में आगे बढ़ाना चाहते हैं,<br>
                    या मंडल के माध्यम से गाँव की समस्याओं का समाधान निकालना चाहते हैं —
                </p>

                <div class="text-3xl md:text-5xl font-bold mt-8 mb-4">
                    <span class="text-orange-300">तो आप ही हमारे अगले मेंबर हैं!</span>
                </div>

                <p class="text-lg md:text-xl mt-6 opacity-90 max-w-3xl mx-auto">
                    हम एक साथ मिलकर बयेपुर को और मजबूत, और डिजिटल बनाएंगे।<br>
                    आपकी छोटी-सी भागीदारी बड़े बदलाव ला सकती है।
                </p>
            </div>
        </section>

        <!-- FORM SECTION -->
        <section class="py-16 md:py-24 bg-white">
            <div class="max-w-4xl mx-auto px-6">

                <div
                    class="bg-gradient-to-br from-teal-50 via-white to-orange-50 rounded-3xl shadow-2xl p-8 md:p-12 border border-teal-100">
                    <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-3">
                        सदस्यता के लिए रजिस्ट्रेशन / रुचि जताएँ
                    </h2>
                    <p class="text-center text-gray-600 mb-10 text-lg">
                        यह फॉर्म केवल आपकी रुचि दर्ज करने के लिए है। हमारी टीम जल्द ही आपसे संपर्क करेगी।
                    </p>
                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="memberEnquiryForm" method="POST" action="{{ route('member.enquiry.store') }}"
                        class="space-y-7">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">पूर्ण नाम *</label>
                                <input type="text" name="name" required
                                    class="w-full border border-gray-300 rounded-xl py-4 px-5 focus:outline-none input-focus text-lg"
                                    placeholder="जैसे: योगेश कुमार यादव">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">मोबाइल नंबर *</label>
                                <input type="tel" name="mobile" required pattern="[0-9]{10}"
                                    class="w-full border border-gray-300 rounded-xl py-4 px-5 focus:outline-none input-focus text-lg"
                                    placeholder="9876543210">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ईमेल आईडी (वैकल्पिक)</label>
                            <input type="email" name="email"
                                class="w-full border border-gray-300 rounded-xl py-4 px-5 focus:outline-none input-focus text-lg"
                                placeholder="yourname@example.com">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">आप बयेपुर से कैसे जुड़े हैं?
                                *</label>
                            <select name="relation" required
                                class="w-full border border-gray-300 rounded-xl py-4 px-5 focus:outline-none input-focus text-lg bg-white">
                                <option value="">चुनें</option>
                                <option value="native">मैं बयेपुर का मूल निवासी हूँ</option>
                                <option value="resident">मैं अभी बयेपुर में रहता हूँ</option>
                                <option value="nri">मैं बाहर रहता हूँ</option>
                                <option value="wellwisher">मैं शुभचिंतक हूँ</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                मंडल चुनें *
                            </label>
                            <select name="mandal_id" required class="w-full border border-gray-300 rounded-xl py-4 px-5">

                                <option value="">मंडल चुनें</option>

                                @foreach($mandals as $mandal)

                                    <option value="{{ $mandal->id }}">
                                        {{ $mandal->name }}
                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">आप किस तरह योगदान देना चाहेंगे? (एक
                                या अधिक चुन सकते हैं)</label>
                            <div class="grid md:grid-cols-2 gap-4 mt-3">
                                <label
                                    class="flex items-center gap-3 bg-white border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-teal-400 transition">
                                    <input type="checkbox" name="contribution[]" value="mandal"
                                        class="w-5 h-5 text-teal-600 rounded">
                                    <span class="text-gray-800">मंडल में शामिल होना</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 bg-white border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-teal-400 transition">
                                    <input type="checkbox" name="contribution[]" value="digital_help"
                                        class="w-5 h-5 text-teal-600 rounded">
                                    <span class="text-gray-800">दुकानदारों की डिजिटल मदद करना</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 bg-white border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-teal-400 transition">
                                    <input type="checkbox" name="contribution[]" value="problem_solving"
                                        class="w-5 h-5 text-teal-600 rounded">
                                    <span class="text-gray-800">गाँव की समस्याओं का समाधान निकालना</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 bg-white border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-teal-400 transition">
                                    <input type="checkbox" name="contribution[]" value="volunteer"
                                        class="w-5 h-5 text-teal-600 rounded">
                                    <span class="text-gray-800">वॉलंटियर / सोशल वर्क</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 bg-white border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-teal-400 transition md:col-span-2">
                                    <input type="checkbox" name="contribution[]" value="other"
                                        class="w-5 h-5 text-teal-600 rounded">
                                    <span class="text-gray-800">अन्य तरीके से योगदान (नीचे लिखें)</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">आप हमें क्या बताना चाहेंगे?
                                (वैकल्पिक)</label>
                            <textarea name="message" rows="5"
                                class="w-full border border-gray-300 rounded-xl py-4 px-5 focus:outline-none input-focus text-lg"
                                placeholder="अपनी रुचि, विचार, सुझाव या कोई खास बात..."></textarea>
                        </div>

                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-teal-600 to-teal-800 hover:from-teal-700 hover:to-teal-900 text-white py-5 rounded-2xl font-bold text-xl shadow-xl transition transform hover:scale-[1.02]">
                            <i class="fa-solid fa-heart mr-3"></i>
                            बयेपुर के साथ जुड़ने की इच्छा जताएँ
                        </button>

                        <p class="text-center text-sm text-gray-500 mt-6">
                            हम आपकी जानकारी का सम्मान करते हैं और केवल बयेपुर से जुड़े कार्यों के लिए उपयोग करेंगे।
                        </p>
                    </form>
                </div>

                <!-- Trust signals after form -->
                <div class="mt-12 grid md:grid-cols-3 gap-6 text-center">
                    <div class="p-6 bg-white rounded-2xl shadow-sm border">
                        <i class="fa-solid fa-lock text-4xl text-teal-600 mb-4"></i>
                        <p class="font-medium">100% गोपनीयता</p>
                    </div>
                    <div class="p-6 bg-white rounded-2xl shadow-sm border">
                        <i class="fa-solid fa-users text-4xl text-teal-600 mb-4"></i>
                        <p class="font-medium">बयेपुर के असली लोग</p>
                    </div>
                    <div class="p-6 bg-white rounded-2xl shadow-sm border">
                        <i class="fa-solid fa-clock-rotate-left text-4xl text-teal-600 mb-4"></i>
                        <p class="font-medium">24-48 घंटे में संपर्क</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FINAL MOTIVATION -->
        <section class="bg-teal-900 text-white py-16 text-center">
            <div class="max-w-5xl mx-auto px-6">
                <h3 class="text-3xl md:text-4xl font-bold mb-6">
                    एक कदम से शुरू होती है बड़ी यात्रा
                </h3>
                <p class="text-xl mb-10 opacity-90">
                    आपका यह छोटा सा कदम बयेपुर के किसी दुकानदार की जिंदगी बदल सकता है,<br>
                    किसी परिवार की मदद कर सकता है, और गाँव को मजबूत बना सकता है।
                </p>
                <button onclick="document.getElementById('memberEnquiryForm').scrollIntoView({behavior:'smooth'})"
                    class="bg-orange-600 hover:bg-orange-700 text-white px-12 py-6 rounded-2xl font-bold text-xl shadow-2xl transition">
                    अभी फॉर्म भरें और जुड़ें
                </button>
            </div>
        </section>


        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection