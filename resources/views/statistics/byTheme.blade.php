@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    {{-- Titre --}}
    <h1 class="text-4xl font-extrabold text-center mb-10 text-gray-900">
        Résultats – {{ $themeName }}
    </h1>

    {{-- Carte principale --}}
    <div class="max-w-4xl mx-auto bg-white/30 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-6">

        <h2 class="text-2xl font-semibold mb-6 text-gray-800">
            Derniers résultats
        </h2>

        @if($results->isEmpty())
            <p class="text-center text-gray-600 italic">
                Aucun résultat enregistré pour ce thème.
            </p>
        @else
            <div class="space-y-4">
                @foreach ($results as $result)
                    <div class="flex items-center justify-between bg-white/20 rounded-xl p-4 hover:bg-white/30 transition">

                        {{-- Score --}}
                        <div class="text-xl font-bold text-blue-700">
                            {{ $result->score }} / 10
                        </div>

                        {{-- Difficulté --}}
                        <div class="px-4 py-1 rounded-full text-sm font-semibold
                            @if($result->difficulty === 'easy') bg-green-200 text-green-800
                            @elseif($result->difficulty === 'medium') bg-yellow-200 text-yellow-800
                            @else bg-red-200 text-red-800
                            @endif
                        ">
                            {{ ucfirst($result->difficulty) }}
                        </div>

                        {{-- Date --}}
                        <div class="text-sm text-gray-600">
                            {{ $result->created_at->format('d/m/Y H:i') }}
                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
