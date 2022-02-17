@extends('layouts.app')

@section('title', 'Create post')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="/posts">
    @csrf

    <input name="title" placeholder="Title" value="{{ old('title') }}" class="@error('title') alert-danger @enderror" /><br />
    @error('title')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @enderror

    <textarea name="body" placeholder="Body" class="@error('body') alert-danger @enderror">{{ old('body') }}</textarea><br />
    @error('body')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @enderror

    <input type="checkbox" name="is_published" value="1" id="is_published">
    <label for="is_published">Publish immediately</label>
    <br />

    <button type="submit">Create a post</button>
</form>
@endsection