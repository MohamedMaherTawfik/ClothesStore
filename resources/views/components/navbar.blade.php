<?php
use App\Models\Cart;
use App\Models\Cartitems;
?>
<nav class="bg-white shadow-sm py-4">
    <div class="container mx-auto px-4 flex items-center justify-between">
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logoo.png') }}" alt="Logo" class="h-8"
                    style="height: 80px; border-radius: 50px;">
                <span class="text-2xl font-bold text-gray-800 ml-2">Ecommerce</span>
            </a>
            <div class="ml-10 space-x-6">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-800">HOME</a>
                <a href="/wishlist" class="text-gray-500 hover:text-gray-800">WISHLIST</a>
                @if (Auth::check())
                    <a href="{{ route('profile') }}" class="text-gray-500 hover:text-gray-800">PROFILE</a>
                @endif
                <a href="{{ route('contact') }}" class="text-gray-500 hover:text-gray-800">CONTACT</a>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search your course..."
                    class="w-64 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:border-blue-500">
                <button class="absolute right-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center space-x-4">
                @if (Auth::check())
                    <a href="{{ route('cart') }}" class="relative group">
                        <!-- Cart Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-7 w-7 text-gray-700 group-hover:text-gray-900 transition" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>

                        <!-- Item Count Badge -->
                        <span
                            class="absolute -top-1 -right-1 text-black bg-white rounded-full w-5 h-5 text-xs flex items-center justify-center font-semibold shadow">
                            @php

                                $cart = cart::where('user_id', Auth::user()->id)->first();
                                $cartItems = Cartitems::where('cart_id', $cart->id)->get();
                            @endphp
                            {{ count($cartItems) }}
                        </span>
                    </a>
                @endif

                @if (Auth::check())
                    <div class="relative group">
                        <button class="text-black hover:text-blue-700 focus:outline-none mr-4">
                            {{ Auth::user()->first_name }}
                        </button>

                        <!-- Fix: Use group-hover to show the dropdown -->
                        <div
                            class="hidden group-focus-within:block absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                            <form class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="">Logout</button>
                            </form>
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700">Sign In</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700">Sign
                        Up</a>
                @endif

            </div>
        </div>
    </div>
</nav>

<div class="relative h-32 overflow-hidden">
    <svg viewBox="0 0 1200 120" class="absolute w-full h-full" preserveAspectRatio="none">
        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor" class="text-gray-100"></path>
    </svg>
</div>
