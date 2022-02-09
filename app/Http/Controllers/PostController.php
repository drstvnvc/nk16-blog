<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->get();

        return view('posts', compact('posts')); // [ 'posts' => $posts]
    }

    public function show($id)
    {
        // $post = Post::where('id', $id)->first();
        $post = Post::findOrFail($id);

        return view('post', compact('post')); // [ 'post' => $post]
    }
}
