@extends('layouts.app')

@section('content')
<div class="flex justify-center py-24">
    <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold uppercase text-black text-center leading-tight 
               bg-white/20 backdrop-blur-md rounded-xl px-8 py-6 shadow-lg border border-white/30">
        Choisissez un thème
    </h1>
</div>
<div class="flex justify-center mt-12">
    <form action="" method="GET" class="w-full max-w-md">
        <div class="relative">
            <input 
                type="text" 
                name="search" 
                placeholder="Rechercher un thème..." 
                class="w-full bg-white/30 backdrop-blur-md border border-white/20 text-gray-800 placeholder-gray-500 rounded-full px-6 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                value="{{ request('search') }}"
            >
            <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-500 hover:bg-blue-600 text-white rounded-full px-4 py-2 transition">
                🔍
            </button>
        </div>
    </form>
</div>

<div class="flex flex-wrap justify-center gap-6 mt-12 px-4">
    <a href="#" class="bg-white/30 backdrop-blur-md text-gray-800 font-semibold px-6 py-3 rounded-xl shadow-md border border-white/20 hover:bg-white/40 hover:scale-105 transform transition">
        Thème 1
    </a>
    <a href="#" class="bg-white/30 backdrop-blur-md text-gray-800 font-semibold px-6 py-3 rounded-xl shadow-md border border-white/20 hover:bg-white/40 hover:scale-105 transform transition">
        Thème 2
    </a>
    <a href="#" class="bg-white/30 backdrop-blur-md text-gray-800 font-semibold px-6 py-3 rounded-xl shadow-md border border-white/20 hover:bg-white/40 hover:scale-105 transform transition">
        Thème 3
    </a>
    <a href="#" class="bg-white/30 backdrop-blur-md text-gray-800 font-semibold px-6 py-3 rounded-xl shadow-md border border-white/20 hover:bg-white/40 hover:scale-105 transform transition">
        Thème 4
    </a>
    <a href="#" class="bg-white/30 backdrop-blur-md text-gray-800 font-semibold px-6 py-3 rounded-xl shadow-md border border-white/20 hover:bg-white/40 hover:scale-105 transform transition">
        Thème 5
    </a>
</div>


@endsection