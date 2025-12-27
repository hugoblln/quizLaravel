<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $themeName = session('themeName');

          if (!isset($response->json()['results']) || empty($response->json()['results'])) {
        return redirect()->route('theme.difficulty', ['themeId' => $themeId, 'themeName' => $themeName ])
                         ->with('error', 'Impossible de récupérer les questions pour cette difficulté. Veuillez réessayer.');
    }

        $questions = $response->json()['results'];

        $themeName = session('themeName');

        session(['quiz_questions' => $questions, 'themeId' => $themeId, 'difficulty' => $difficulty]);

        return view('Questions/questions', compact('questions', 'themeName', 'difficulty'));
    }

        public function themes(Request $request)
    {
        $response = Http::get('https://opentdb.com/api_category.php');

        $themes = $response->json()['trivia_categories'];

         $search = $request->query('q'); // texte de recherche depuis l'input
    if ($search) {
        $themes = array_filter($themes, function($theme) use ($search) {
            return stripos($theme['name'], $search) !== false;
        });
    }

        return view('welcome', compact('themes', 'search'));
    }

       public function submit(Request $request)
    {
        $answers = $request->except('_token');

        $questions = session('quiz_questions');

        $themeId = session('themeId');

        $themeName = session('themeName');

        $difficulty = session('difficulty');

        $score = 0;

        foreach($answers as $index => $answer)
        {
            if($answer == $questions[$index]['correct_answer'])
            {
                $score++;
            }
        }

        Score::create([
            'user_id' => Auth::id(),
            'score' => $score,
            'category' => $themeName,
            'difficulty' => $difficulty
        ]);

        session(['score' => $score, 'answers' => $answers]);

        return redirect()->route('result', ['themeId' => $themeId, 'difficulty' => $difficulty]);
    }

    public function result(int $themeId, string $difficulty)
    {
        $score = session('score');

        $questions = session('quiz_questions');

        $answers = session('answers');

        $themeName = session('themeName');

        return view('Result/result', compact('score', 'questions', 'answers', 'themeName', 'difficulty'));
    }
}
