@extends('layouts.app')

@section('title', $page->meta_title ?? $page->menu_name)

<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap');

    body {
        font-family: 'Noto Sans Devanagari', system-ui, sans-serif;
    }

    .section-title {
        border-bottom: 3px solid #0d9488;
        padding-bottom: 0.5rem;
    }

    ol {
        counter-reset: item;
    }

    ol>li {
        counter-increment: item;
        position: relative;
        padding-left: 2.5rem;
    }

    ol>li::before {
        content: counter(item) ".";
        position: absolute;
        left: 0;
        font-weight: bold;
        color: #0d9488;
    }
</style>

@section('content')


    <!-- MAIN CONTENT -->
    <main class="max-w-5xl mx-auto px-6 py-12 md:py-16">

        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                {{ $page->menu_name }}
            </h1>

            @if($page->meta_description)
                <p class="mt-4 text-gray-700 max-w-3xl mx-auto">
                    {{ $page->meta_description }}
                </p>
            @endif
        </div>


        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 md:p-12">

            {!! $page->content !!}

        </div>

    </main>

@endsection