@extends('layouts.app')

@section('content')
<h1>{{$themeName}}</h1>
<div>
<a href="{{Route('question', ['themeId' => $themeId, 'difficulty' => 'easy'] )}}">facile</a>
<a href="{{Route('question', ['themeId' => $themeId, 'difficulty' => 'medium'] )}}">intermediaire</a>
<a href="{{Route('question', ['themeId' => $themeId, 'difficulty' => 'hard'] )}}">difficile</a>
</div>
@endsection