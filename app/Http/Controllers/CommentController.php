<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($post_id, StoreCommentRequest $request)
    {
        $data = $request->validated();

        $post = Post::findOrFail($post_id);
        $post->comments()->create($data);

        return back();
    }
}
