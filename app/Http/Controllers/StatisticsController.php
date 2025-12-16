<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->scores()->distinct()->pluck('category');

        return view('statistics/index', compact('categories'));
    }

    public function byTheme(string $themeName)
    {
        $results = auth()->user()->scores()->where('category',$themeName)->latest()->get();

        return view('statistics/byTheme', compact('results', 'themeName'));
    }

}
