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
    <title>find Categorey</title>
</head>

<style>
    .nav-link:hover {
        color: #fff !important;
        background-color: rgba(0, 0, 0, 0.404) !important;
    }

    .nav-tabs .nav-link.active {
        background-color: black !important;
        color: white !important;
        border-color: black !important;
        border-radius: 10px !important;
    }
</style>

<body class="bg-dark">

    <header data-scroll-index="0">
        <!--Start navs-container -->
        <div class="navs-container">
            <!--Start main-nav-->
            <nav class="navbar navbar-expand-lg navbar-fixed-top">
                <div class="container">
                    <img src="{{ asset('images/logo.png') }}" style="width: 120px; height: 70px;" alt="">
                    <a class="navbar-brand" href="index.html"></a>
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
                                <a class="nav-link" href="#" data-scroll-nav="2">services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="3">portfolio</a>
                            </li>
                        </ul>
                        <a href="{{ route('cart') }}" class="butn lang-btn"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                        @if (!Auth::check())
                            <div class="dropdown">
                                <!-- Dropdown Button -->
                                <button class="butn contact-butn dropdown-toggle px-2" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    sign in
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('logout') }}"
                                class="butn contact-btn bg-danger text-decoration-none">logout</a>
                    </div>
                    @endif

                </div>
        </div>
        </nav>
        </div>
    </header>

    <div class="container mt-5">
        <div class="card shadow-lg p-4 text-white" style="background-color: rgba(0, 0, 0, 0.5)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>{{Auth::user()->first_name}}</h2>
                    <p class="text-muted">{{Auth::user()->email}}</p>
                </div>
                <div>
                    <button class="btn btn-primary">Edit Profile</button>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <ul class="nav nav-tabs" id="profileTabs">

                <li class="nav-item">
                    <a class="nav-link active text-decoration-none text-white" data-bs-toggle="tab"
                        href="#posts">Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-decoration-none text-white" data-bs-toggle="tab" href="#orders">Orders</a>
                </li>

            </ul>

            <div class="tab-content mt-3">

                <div id="posts" class="tab-pane fade show active">
                    <h4>Recent Posts</h4>
                    @if (count($userPosts) > 0)
                        @foreach ($userPosts as $post)
                            <div class="card shadow-lg p-4 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="fw-bold text-black">Post #{{ $loop->iteration }}</h4>
                                </div>
                                <p class="text-black">Post Date: {{ $post->created_at->format('Y-m-d') }}</p>
                                <p class="text-black">Post Title: {{ $post->blog }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div id="orders" class="tab-pane fade">
                    <h4>Recent Orders</h4>
                    @if (count($userOrders) > 0)
                        @foreach ($userOrders as $order)
                            <div class="card shadow-lg p-4 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="fw-bold text-black">Order #{{ $order->id }}</h4>
                                </div>
                                <p class="text-black">Order Date: {{ $order->created_at->format('Y-m-d') }}</p>
                                <p class="text-black">Total Price: {{ $order->total_price }}$</p>
                                <p class="text-black">Status: {{ $order->status }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
