@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">

    <!-- Titre -->
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-12">
        Mes thèmes
    </h1>

    <!-- Grille des catégories -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach ($categories as $category)
            <a href="{{route('byTheme', $category)}}"
               class="block bg-white/30 backdrop-blur-md rounded-2xl shadow-md border border-white/20
                      px-6 py-4 text-center text-gray-800 font-semibold
                      hover:bg-white/40 hover:scale-105 transition transform">
                {{ $category }}
            </a>
        @endforeach

    </div>

</div>
@endsection
