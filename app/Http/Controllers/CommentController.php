<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Mail\CommentReceived;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store($post_id, StoreCommentRequest $request)
    {
        $data = $request->validated();

        $post = Post::findOrFail($post_id);
        $comment = $post->comments()->create($data);

        $commentCreator = Auth::user();

        Mail::to($post->author)->send(
            new CommentReceived($comment, $commentCreator)
        );
        return back();
    }
}
