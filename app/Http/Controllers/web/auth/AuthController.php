<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\blogs;
use App\Models\orders;
use App\Models\User;
use App\Models\userAddress;
use App\Services\cartServices;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $cartService;
    public function __construct(cartServices $cartServices)
    {
        $this->cartService = $cartServices;
    }
    public function signUp()
    {
        return view('auth.signIn');
    }

    public function register(userRequest $request)
    {
        // dd($request->all());
        $fields = $request->validated();
        $user = User::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'password' => bcrypt($fields['password']),
        ]);
        Auth::login($user);
        $this->cartService->createCart();
        userAddress::create([
            'user_id' => $user->id,
            'address' => $fields['address'],
            'city' => $fields['city'],
            'postal_code' => $fields['postal_code'],
        ],
    );
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
