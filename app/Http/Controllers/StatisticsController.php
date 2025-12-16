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
}
