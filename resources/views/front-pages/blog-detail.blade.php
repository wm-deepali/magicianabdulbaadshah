@extends('layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto px-6 py-12">

        <h1 class="text-4xl font-bold mb-6">
            {{ $blog->title }}
        </h1>

        <img src="{{ asset('storage/' . $blog->image) }}" class="w-full rounded-xl mb-6">

        <div class="prose max-w-none">

            {!! $blog->content !!}

        </div>

    </div>

@endsection