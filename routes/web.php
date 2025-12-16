<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StatisticsController;

Route::get('/', [QuizController::class, 'themes'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/theme/{themeId}', function($themeId, Request $request){

    $themeName = $request->query('themeName');
    
    session(['themeName' => $themeName]);

    return view('themes/chooseDifficulty', ['themeId' => $themeId, 'themeName' => $themeName]);
})->name('theme.difficulty');

Route::get('/questions/{themeId}/{difficulty}', [QuizController::class, 'questions'])->name('question');

Route::post('/submit', [QuizController::class, 'submit'])->name('submit');

Route::get('/questions/{themeId}/{difficulty}/result', [QuizController::class, 'result'])->name('result');

Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');

Route::get('/statistics/theme/{themeName}', [StatisticsController::class, 'byTheme'])->name('byTheme');


});

require __DIR__.'/auth.php';
