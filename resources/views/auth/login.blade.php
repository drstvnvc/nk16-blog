@extends('layouts.app')

@section('title', 'Login')

@section('content')

<form method="POST" action="/login">
    @csrf

    <input name="email" required type="email" placeholder="Email" value="{{ old('email') }}" class="@error('email') alert-danger @enderror" /><br />
    @error('email')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @enderror

    <input name="password" required type="password" placeholder="Password" value="{{ old('password') }}" class="@error('password') alert-danger @enderror" /><br />
    @error('password')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @enderror

    @if (isset($invalidCredentials) && $invalidCredentials==true)
    <div class="alert alert-danger">
        Invalid credentials
    </div>
    @endif
    <button type="submit">Login</button>
</form>
@endsection