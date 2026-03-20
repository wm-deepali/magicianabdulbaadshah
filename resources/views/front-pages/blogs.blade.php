@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-12">

        <h1 class="text-3xl font-bold mb-8">हमारे ब्लॉग</h1>

        <div class="grid md:grid-cols-3 gap-8">

            @foreach($blogs as $blog)

                <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

                    <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-48 object-cover">

                    <div class="p-5">

                        <h3 class="text-xl font-semibold mb-2">
                            {{ $blog->title }}
                        </h3>

                        <p class="text-gray-600 mb-4">
                            {{ $blog->short_description }}
                        </p>

                        <a href="{{ route('blog.detail', $blog->slug) }}" class="text-teal-600 font-semibold">

                            Read More →

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="mt-10">
            {{ $blogs->links() }}
        </div>

    </div>

@endsection