<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{
    public function index(int $themeId, string $difficulty)
    {
        $response = Http::get('https://opentdb.com/api.php',
        [
              'amount' => 10,
              'category' => $themeId,
              'difficulty' => $difficulty
        ]);

        $questions = $response->json()['results'];

        return view('Questions/questions', compact('questions'));
    }
}
