<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/posts', function () {
    $posts = Post::where('is_published', true)->get();

    return view('posts', compact('posts')); // [ 'posts' => $posts]
});

Route::get('/posts/{id}', function ($id) {
    // $post = Post::where('id', $id)->first();
    $post = Post::findOrFail($id);

    return view('post', compact('post')); // [ 'post' => $post]
});
