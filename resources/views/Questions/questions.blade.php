@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-900">Quiz: {{ $questions[0]['category'] ?? 'Thème' }}</h1>

    <form action="#" method="POST" class="space-y-6">
        @csrf
        @foreach ($questions as $index => $question)
            <div class="bg-white/30 backdrop-blur-md rounded-xl p-6 shadow-lg border border-white/20">
                <h2 class="text-xl font-semibold mb-4">Q{{ $index + 1 }}: {!! $question['question'] !!}</h2>
                
                @php
                    // Mélange les réponses correctes et incorrectes
                    $answers = $question['incorrect_answers'];
                    array_push($answers, $question['correct_answer']);
                    shuffle($answers);
                @endphp

                <div class="space-y-2">
                    @foreach ($answers as $answer)
                        <label class="flex items-center space-x-3 cursor-pointer bg-white/20 hover:bg-white/30 p-2 rounded-lg transition">
                            <input type="radio" name="question_{{ $index }}" value="{{ $answer }}" class="accent-blue-600">
                            <span>{!! $answer !!}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="text-center mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition">
                Valider mes réponses
            </button>
        </div>
    </form>
</div>
@endsection
