<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
        public function questions(int $themeId, string $difficulty)
    {
        $response = Http::get('https://opentdb.com/api.php',
        [
              'amount' => 10,
              'category' => $themeId,
              'difficulty' => $difficulty
        ]);

        $questions = $response->json()['results'];

        $themeName = session('themeName');

        session(['quiz_questions' => $questions, 'themeId' => $themeId, 'difficulty' => $difficulty]);

        return view('Questions/questions', compact('questions', 'themeName', 'difficulty'));
    }

        public function themes()
    {
        $response = Http::get('https://opentdb.com/api_category.php');

        $themes = $response->json()['trivia_categories'];

        return view('welcome', compact('themes'));
    }

       public function submit(Request $request)
    {
        $answers = $request->except('_token');

        $questions = session('quiz_questions');

        $themeId = session('themeId');

        $difficulty = session('difficulty');


        var_dump($answers);


        $score = 0;

        foreach($answers as $index => $answer)
        {
            if($answer == $questions[$index]['correct_answer'])
            {
                $score++;
            }
        }

        var_dump($score);

        return redirect()->route('result', ['themeId' => $themeId, 'difficulty' => $difficulty])->with(['score' => $score, 'questions' => $questions, 'answers' => $answers ]);
    }

    public function result(int $themeId, string $difficulty)
    {
        $score = session('score');

        $questions = session('questions');

        $answers = session('answers');

        $themeName = session('themeName');

        return view('Result/result', compact('score', 'questions', 'answers', 'themeName', 'difficulty'));
    }
}
