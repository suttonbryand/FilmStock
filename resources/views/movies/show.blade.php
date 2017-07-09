@extends('layouts.app')

@section('content')

<h1>{{ $movie->name }}</h1>
<h2>{{ $movie->director }}</h2>
<h2>{{ $movie->summary }}</h2>

<button><a href="../movies/">Movies</a></button>

@endsection