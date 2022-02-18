@extends('layouts.app')

@section('title', 'Vivify Blog')

@section('content')
<h1>Posts</h1>
<ul>
    @foreach($posts as $post)
    <li>
        <a href="/posts/{{$post->id}}">{{$post->title}} ({{$post->comments->count()}})</a>
        <a href="/authors/{{$post->author->id}}">{{$post->author->name}}</a>
    </li>
    @endforeach
</ul>
@endsection