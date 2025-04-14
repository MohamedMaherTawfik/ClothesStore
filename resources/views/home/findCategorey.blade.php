<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Find Category - ClothesStore</title>
    <style>

    </style>
</head>

<body class="bg-dark">

    <header id="home">
        <div class="bg-gray-900 text-white shadow-md fixed w-full z-50">
            <div class="container mx-auto px-4">
                <nav class="flex items-center justify-between flex-wrap py-4">
                    <!-- Logo -->
                    <div class="flex items-center flex-shrink-0 mr-6">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-30 h-16">
                        </a>
                    </div>

                    <!-- Hamburger -->
                    <div class="block lg:hidden">
                        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-300 border-gray-500 hover:text-white hover:border-white">
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Menu -->
                    <div id="nav-content" class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block">
                        <ul class="text-lg lg:flex-grow lg:flex lg:justify-center space-x-8 mt-4 lg:mt-0">
                            <li><a href="{{ route('home') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-gray-300 transition" data-scroll-nav="0">Home</a></li>
                            <li><a href="{{ route('about') }}" class="block mt-4 lg:inline-block lg:mt-0 hover:text-gray-300 transition" data-scroll-nav="1">About</a></li>
                            <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 hover:text-gray-300 transition" data-scroll-nav="2">Services</a></li>
                            <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 hover:text-gray-300 transition" data-scroll-nav="3">Portfolio</a></li>
                        </ul>

                        <!-- Cart -->
                        <a href="{{ route('cart') }}" class="text-xl text-white hover:text-gray-300 mr-4">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>

                        <!-- Auth Dropdown -->
                        @if (!Auth::check())
                            <div class="relative inline-block text-left">
                                <button type="button" class="bg-gray-800 text-white px-4 py-2 text-lg rounded-md hover:bg-gray-700 focus:outline-none focus:ring" id="dropdownMenuButton" data-dropdown-toggle="guestDropdown">
                                    Sign In
                                </button>
                                <div id="guestDropdown" class="hidden absolute right-0 mt-2 w-40 bg-gray-800 border border-gray-700 rounded-md shadow-lg z-50">
                                    <a href="{{ route('register') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Register</a>
                                    <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Log in</a>
                                </div>
                            </div>
                        @else
                            <div class="relative inline-block text-left">
                                <button type="button" class="bg-gray-800 text-white px-4 py-2 text-lg rounded-md hover:bg-gray-700 focus:outline-none focus:ring" id="dropdownMenuButton" data-dropdown-toggle="authDropdown">
                                    {{ Auth::user()->first_name }}
                                </button>
                                <div id="authDropdown" class="hidden absolute right-0 mt-2 w-40 bg-gray-800 border border-gray-700 rounded-md shadow-lg z-50">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-white hover:bg-gray-700">Logout</button>
                                    </form>
                                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Profile</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>

        <!-- Toggle Dropdown Script -->
        <script>
            document.querySelectorAll('[data-dropdown-toggle]').forEach(button => {
                button.addEventListener('click', () => {
                    const dropdownId = button.getAttribute('data-dropdown-toggle');
                    const dropdown = document.getElementById(dropdownId);
                    dropdown.classList.toggle('hidden');
                });
            });

            // Mobile menu toggle
            document.getElementById("nav-toggle").addEventListener("click", () => {
                document.getElementById("nav-content").classList.toggle("hidden");
            });
        </script>
    </header>


    <div class="container py-5">
        <div class="category-container">
            <div class="category-header">
                <h1>Find Your Category</h1>
                <p class="text-muted">Browse through our collection of clothing categories</p>
            </div>

            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" class="form-control search-input" placeholder="Search categories...">
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <h5 class="filter-title">Filter By:</h5>
                <div class="filter-options">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Men</button>
                    <button class="filter-btn">Women</button>
                    <button class="filter-btn">Kids</button>
                    <button class="filter-btn">Accessories</button>
                </div>
            </div>

            <!-- Categories Grid -->
            <div class="product-grid">
                <!-- product Card 1 -->
                <div class="product-grid">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
                        @foreach ($categorey->products as $item)
                            <form action="{{route('addToCart',$item->id)}}" method="POST" class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">
                                @csrf
                                @php
                                    $firstImage = $item->productImages->first();
                                @endphp

                                <div class="h-64 overflow-hidden bg-gray-100">
                                    @if ($firstImage)
                                        <img src="{{ asset('product/' . $firstImage->image) }}" alt="{{ $item->name }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('product/default.jpg') }}" alt="No Image"
                                             class="w-full h-full object-cover">
                                    @endif
                                </div>

                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <h3 class="text-lg font-semibold mb-2">{{ $item->name }}</h3>
                                    <p class="text-gray-700 mb-4">${{ number_format($item->price, 2) }}</p>

                                    <div class="flex items-center gap-2 mb-4">
                                        <label for="quantity_{{ $item->id }}" class="text-sm font-medium">Quantity:</label>
                                        <input type="number" name="quantity" id="quantity_{{ $item->id }}"
                                               value="1" min="1" max="100" step="1"
                                               class="w-16 border rounded px-2 py-1 text-sm focus:ring focus:outline-none">
                                    </div>

                                    <input type="hidden" name="product_id" value="{{ $item->id }}">

                                    <button type="submit"
                                            class="mt-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                                        Add to Cart
                                    </button>
                                </div>
                            </form>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

</body>

</html>
