<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request) {

        $rules = [
            'title' => 'required|string',
            'description' => 'required|string',
            'post_url' => 'required|image',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges = [
            'title.required' => 'Please enter post title.',
            'description.required' => 'Please enter post description.',
            'post_url.required' => 'Please select post image.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $imageName = time() . "." . $request->post_url->extension();
            $request->post_url->move(public_path(path: 'posts'), $imageName);

            $post = new Post();
            $post->user_id = auth()->user()->id;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->post_url = $imageName;

            $post->save();
            $posts = Post::where('user_id', auth()->user()->id)->get();
            return view('all_post', compact('posts'));

        }
    }

    public function update($post_id) {

        $post = Post::where('id', $post_id)->first();
        return view('update_post', compact('post'));

    }

    public function postUpdat(Request $request, $post_id) {

        $rules = [
            'title' => 'required|string',
            'description' => 'required|string',
            'post_url' => 'required|image',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges = [
            'title.required' => 'Please enter post title.',
            'description.required' => 'Please enter post description.',
            'post_url' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $post = Post::where('id', $post_id)->first();

            $imageName = time() . "." . $request->post_url->extension();
            $request->post_url->move(public_path(path: 'posts'), $imageName);

            $post->user_id = auth()->user()->id;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->post_url = $imageName;

            $post->save();
            $posts = Post::where('user_id', auth()->user()->id)->get();
            return view('all_post', compact('posts'));

        }

    }

    public function delete($post_id) {

        $post = Post::where('id', $post_id)->first();
        $post->delete();
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('all_post', compact('posts'));

    }
}
