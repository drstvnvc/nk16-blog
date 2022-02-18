@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h1>{{$post->title}}</h1>
<h4><a href="/authors/{{$post->author->id}}">{{$post->author->name}}</a></h4>

<p>
    {{$post->body}}
</p>

<hr />

<h4>Comments</h4>
<ul>
    @foreach ($post->comments as $comment)
    <li>{{$comment->body}}</li>
    @endforeach

    @auth
    <li>
        <form method="POST" action="/posts/{{$post->id}}/comments">
            @csrf
            <textarea name="body" placeholder="Leave a comment..."></textarea>
            <button type="submit">Submit</button>
        </form>
    </li>
    @endauth
</ul>
@endsection