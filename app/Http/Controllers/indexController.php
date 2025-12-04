<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $response = Http::get('https://opentdb.com/api_category.php');

        $themes = $response->json(['trivia_categories']);

        return view('themes.index', compact('themes'));
    }
}
