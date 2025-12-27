@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">

    <!-- Titre du thème -->
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-10">
        Thème : <span class="text-blue-700">{{ $themeName }}</span>
    </h1>

    <!-- Carte principale -->
    <div class="max-w-xl mx-auto bg-white/20 backdrop-blur-md p-8 rounded-2xl shadow-lg border border-white/20">

        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">
            Choisissez une difficulté
        </h2>

        <div class="flex flex-col gap-4">

            <!-- Facile -->
            <a href="{{ Route('question', ['themeId' => $themeId, 'difficulty' => 'easy']) }}"
               class="w-full text-center font-semibold px-6 py-3 rounded-xl
                      border-2 border-green-500 shadow-md shadow-green-300/40
                      bg-white/20 text-green-700 hover:bg-green-500/20 hover:text-white
                      transition transform hover:scale-105">
                Facile
            </a>

            <!-- Intermédiaire -->
            <a href="{{ Route('question', ['themeId' => $themeId, 'difficulty' => 'medium']) }}"
               class="w-full text-center font-semibold px-6 py-3 rounded-xl
                      border-2 border-yellow-500 shadow-md shadow-yellow-300/40
                      bg-white/20 text-yellow-700 hover:bg-yellow-500/20 hover:text-white
                      transition transform hover:scale-105">
                Intermédiaire
            </a>

            <!-- Difficile -->
            <a href="{{ Route('question', ['themeId' => $themeId, 'difficulty' => 'hard']) }}"
               class="w-full text-center font-semibold px-6 py-3 rounded-xl
                      border-2 border-red-500 shadow-md shadow-red-300/40
                      bg-white/20 text-red-700 hover:bg-red-500/20 hover:text-white
                      transition transform hover:scale-105">
                Difficile
            </a>

        </div>
    </div>

</div>
@endsection
