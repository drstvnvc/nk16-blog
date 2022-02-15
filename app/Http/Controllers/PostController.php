<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function create(Request $request)
    {
        return view('create-post');
    }

    public function store(Request $request)
    {
        DB::listen(function ($query) {
            info($query->sql);
        });

        // $post = new Post();
        // $post->title = $request->get('title', '');
        // $post->body = $request->get('body', '');
        // $post->is_published = $request->get('is_published', false);
        // $post->save();

        // $data = [
        //     'title' => $request->get('title', ''),
        //     'body' => $request->get('body', ''),
        //     'is_published' => $request->get('is_published', false),
        // ];
        $data = $request->only(['title', 'body', 'is_published']);

        $post = Post::create($data);

        // return view('post', compact('post'));
        return redirect("/posts/$post->id");
    }
}
