<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index() {

        $posts = Post::all();
        return view('welcome', compact('posts'));

    }

    public function mypost() {

        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('all_post', compact('posts'));

    }

    public function singlePost($post_id) {

        $post = Post::where('id', $post_id)->first();
        $user = User::where('id', $post->user_id)->first();
        return view('single_post', compact('post', 'user'));

    }
}
