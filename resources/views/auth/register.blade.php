@extends('layouts.app')

@section('title', 'Register')

@section('content')

<form method="POST" action="/register">
    @csrf

    <input name="name" required placeholder="Name" value="{{ old('name') }}" class="@error('name') alert-danger @enderror" /><br />
    @error('name')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @enderror

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

    <input name="password_confirmation" required type="password" placeholder="Confirm password" value="{{ old('password_confirmation') }}" class="@error('password_confirmation') alert-danger @enderror" /><br />
    @error('password_confirmation')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @enderror

    <input type="checkbox" name="terms_of_service" value="1" id="terms_of_service">
    <label for="terms_of_service">I agree to terms and conditions.</label>
    <br />
    @error('terms_of_service')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @enderror

    <button type="submit">Register</button>
</form>
@endsection