<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $author)
    {
        //$post = Post::where('user_id', $author->id)->where('is_published', true)->get()
        $posts = $author->posts()->published()->get();
        return view('posts.index', compact('posts'));
    }
}
