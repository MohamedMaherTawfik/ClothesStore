<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\blogs;
use App\Models\orders;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signUp()
    {
        return view('auth.signIn');
    }

    public function register(userRequest $request)
    {
        $fields = $request->validated();
        $user = User::create($fields);
        Auth::login($user);
        return redirect()->route('home')->with('success', __('messages.register'));
    }

    public function signIn()
    {
        return view('auth.login');
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->route('home')->with('success', __('messages.login'));
        }
        return redirect()->route('login')->with('error', __('these credentials do not match our records'));

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', __('messages.logout'));
    }

    public function profile()
    {
        $userOrders=orders::with('user')->where('user_id',Auth::user()->id)->get();
        $userPosts=blogs::with('user')->where('user_id',Auth::user()->id)->get();
        return view('auth.profile',compact('userOrders'),compact('userPosts'));
    }

}
