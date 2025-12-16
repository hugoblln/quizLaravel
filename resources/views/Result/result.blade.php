@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">

      <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-900">Quiz: {{ $themeName }}</h1>
        <h2 class="text-4xl font-extrabold mb-8 text-center text-gray-900">Difficulté: {{ $difficulty }}</h2>

    <h3 class="text-3xl font-extrabold mb-6 text-center text-gray-900">
        Score : <span class="text-blue-700">{{ $score }} / 10</span>
    </h3>

    @foreach ($questions as $index => $question)

        <div class="bg-white/30 backdrop-blur-md rounded-xl p-6 shadow-lg border border-white/20 mb-6">

            <p class="text-blue-600 font-semibold mb-3">
                {!! $question['question'] !!}
            </p>

            @if ($question['correct_answer'] == $answers[$index])

                <p class="p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                    {{ $answers[$index] }}
                </p>

                <p class="mt-2 text-green-800 font-bold">
                    Bonne réponse, bravo ! 🎉
                </p>

            @else

                <p class="p-3 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    Mauvaise réponse, dommage ! ❌
                </p>

                <p class="mt-2 text-red-800">
                    <span class="font-semibold">Ta réponse :</span> {{ $answers[$index] }}
                </p>

                <p class="text-green-800 mt-1">
                    <span class="font-semibold">La bonne réponse :</span> {{ $question['correct_answer'] }}
                </p>

            @endif

        </div>

    @endforeach

</div>
@endsection
