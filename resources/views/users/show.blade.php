@extends('layouts.app')

@section('content')

<div class="media">
  <div class="media-left">
    <a href="#">
    </a>
  </div>
  <div class="media-body">
    <h1 class="media-heading">{{ $user->name }}</h1>
  </div>
</div>

@endsection