@extends('layouts.home')

@section('content')


    <!-- Header -->
    <header class="cover-img text-white text-center mb-5">
        <div class="container-fluid cover-box">
            <h1 class="fw-light" style="font-size: 50px; font-weight: bold; padding-top: 150px">Welcome to My Blog</h1>
            <p class="lead" style="font-size: 30px;">Sharing knowledge and stories</p>
            <button class="btn-lm">Learn More</button>
        </div>
    </header>

    <!-- Blog Section -->
    <div class="container">
        <div class="row">
            <!-- Blog Post 1 -->
            @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ 'posts/' . $post->post_url }}" class="card-img-top" alt="Blog Post 1">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 30px">{{ $post->title }}</h5>
                        <p class="fw-bold">Created at : {{ date('Y-m-d', strtotime($post->created_at)) }}</p>
                        <a href="{{ route('singlePost', $post->id) }}" class="btn btn-primary mt-4">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection

