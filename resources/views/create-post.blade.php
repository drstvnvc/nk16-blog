@extends('layouts.app')

@section('title', 'Create post')

@section('content')
<form method="POST" action="/posts">
    @csrf

    <input name="title" placeholder="Title" />
    <br/>
    <textarea name="body" placeholder="Body"></textarea>
    <br/>
    <input type="checkbox" name="is_published" value="1" id="is_published">
    <label for="is_published">Publish immediately</label>
    <br/>

    <button type="submit">Create a post</button>
</form>
@endsection
