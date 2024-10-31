@extends('layouts.home');

@section('content')
<div class="card text-center" style="margin-bottom: 200px">
    <div class="card-body">
        <img src="{{ '../posts/'  . $post->post_url }}" class="col-md-8" width="100%" alt="">
        <p class="card-text mt-4" style="font-size: 20px;">Posted By : {{ $user->name }}/p>
        <h1 class="card-title mt-3">{{ $post->title }}</h1>
        <p class="card-text" style="font-size: 25px;">{{ $post->description }}/p>
    </div>
  </div>
@endsection
