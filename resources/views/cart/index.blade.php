<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <title>Cart</title>
</head>

<body>
    <section class="home-sec">

        <header data-scroll-index="0">
            <!--Start navs-container -->
            <div class="navs-container">
                <!--Start main-nav-->
                <nav class="navbar navbar-expand-lg navbar-fixed-top">
                    <div class="container">
                        <img src="{{ asset('images/logo.png') }}" style="width: 120px; height: 70px;" alt="">
                        <a class="navbar-brand" href="index.html">
                            {{-- <img src="{{ asset('images/background.jpeg') }}" alt="" /> --}}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('home') }}" data-scroll-nav="0">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-scroll-nav="1">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-scroll-nav="2">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-scroll-nav="3">Portfolio</a>
                                </li>
                            </ul>

                            <!-- Cart Button -->
                            {{-- <a href="{{ route('cart') }}" class="butn lang-btn"><i
                                    class="fa-solid fa-cart-shopping"></i></a> --}}

                            <!-- Authentication Section -->
                            @if (!Auth::check())
                                <div class="dropdown">
                                    <!-- Dropdown Button -->
                                    <button class="butn contact-butn dropdown-toggle px-2" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sign In
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Log In</a></li>
                                    </ul>
                                </div>
                            @else
                                <div class="dropdown">
                                    <!-- User Button -->
                                    <button class="butn contact-butn px-2 bg-danger" type="button" aria-expanded="false">
                                        <a href=""
                                            class="text-decoration-none text-white">{{ Auth::user()->first_name }}</a>
                                    </button>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="butn contact-butn px-2 bg-danger">Logout</button>
                                </form>

                            @endif


                        </div>
                    </div>
                </nav>
            </div>
        </header>


    </section>

    <section>
        <div class="container mt-5">
            <div class="card shadow-lg p-4">
                <!-- Header Section with Left-aligned Title and Right-aligned Button -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold text-danger">My Items</h2>
                    <form action="" method="post">
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Clear Cart"></input>
                    </form>

                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($cartItems) > 0)
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td><img style="width: 80px; height: 80px;"
                                            src="{{ asset('product/' . $item->product->image) }}" width="50"></td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->product->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->product->price * $item->quantity }}$</td>
                                    <td>
                                        <a href="{{ route('deleteFromCart', $item->product->id) }}" class="btn btn-danger">🗑 Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="bg-light">No Items Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <h5>Total: <span class="fw-bold">{{ $total }}$</span></h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Place Order</a>
                    <form action="" method="post">
                        @csrf
                        <input class="btn btn-success" type="submit" value="Buy Now"></input>
                    </form>
                </div>
            </div>
        </div>
    </section>


</body>

</html>
