<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function getRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Auth::login($user);

        return redirect('/posts');
    }

    public function getMyProfile()
    {
        // Auth::login($user)
        // Auth::id()
        // Auth::user()
        // Auth::check()
        // Auth::logout()
        $user = Auth::user();
        return $user;
    }

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        // find user by email
        // check password
        // set active user on session
        if (Auth::attempt($credentials)) {
            return redirect('/posts');
        } else {
            return view('auth.login', ['invalidCredentials' => true]);
        }

        // find user by email
        // $user = User::where('email', $credentials['email'])->first();

        // if ($user && Hash::check($credentials['password'], $user->password)) {
        // check password
        // Auth::login($user);
        // } else {
        //     return 'Invalid credentials';
        // }
    }
}
