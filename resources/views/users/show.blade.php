@extends('layouts.app')

@section('content')

<div class="media">
  <div class="media-left">
    <img class="media-object index-image" src="{{ $user->gravatar_link }}" alt="Profile image here">
  </div>
  <div class="media-body">
    <h1 class="media-heading">{{ $user->name }}</h1>
  </div>
</div>

@include('shared.ratings', ['ratings' => $ratings, 'is_user_page' => true]);

@endsection