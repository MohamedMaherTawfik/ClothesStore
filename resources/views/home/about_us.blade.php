<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-dark text-light">

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
                                <a class="nav-link" href="{{ route('about') }}" data-scroll-nav="1">About</a>
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
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Log in</a></li>
                                </ul>
                            </div>
                        @else
                            <div class="dropdown">
                                <!-- Dropdown Button -->
                                <button class="butn contact-butn dropdown-toggle px-2" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->first_name }}
                                </button>
                                <ul class="dropdown-menu">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                    <a href="{{ route('profile') }}"
                                        class="dropdown-item text-decoration-none text-black">Profile</a>
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section >
        <div class="about-section mt-4">

            <div class="container">
                <nav aria-label="breadcrumb">
                    <div>
                        <a class="text-decoration-none about-home" href="{{route('home')}}">Home /</a>
                        <a class="text-decoration-none about-home" href="{{route('about')}}">About</a>
                    </div>
                </nav>

                <!-- Title -->
                <p class="fs-1 fw-bold">About Our Company</p>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="mt-3 text-muted">.</div>
                    <h2 class="fw-bold mt-5">Our Motive Is To Provide Best For Those Who Deserve</h2>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis exercitationem commodi aliquam
                        necessitatibus vero
                        reiciendis quaerat illo est fuga ea temporibus natus doloremque ipsum voluptas quod deserunt
                        expedita.
                    </p>
                    <div class="row">
                        <div class="col-4 stat-box">
                            <h4>34785</h4>
                            <p>Registered Users</p>
                        </div>
                        <div class="col-4 stat-box">
                            <h4>2623</h4>
                            <p>Per Day Visitors</p>
                        </div>
                        <div class="col-4 stat-box">
                            <h4>189</h4>
                            <p>Total Products</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                style="height: 200px;">500x500</div>
                        </div>
                        <div class="col-6">
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                style="height: 200px;">500x500</div>
                        </div>
                        <div class="col-6">
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                style="height: 200px;">500x500</div>
                        </div>
                        <div class="col-6">
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                style="height: 200px;">500x500</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <h2 class="text-center mb-5">Why People Choos Us</h2>
        <div class="row">
            <!-- Feature 1: Fresh Organic Food -->
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <div class="icon">
                        <i class="fa-solid fa-bowl-food"></i>
                    </div>
                    <h4>100% Fresh Organic Food</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing tempora facere dolores cupiditate debitis.</p>
                </div>
            </div>
            <!-- Feature 2: Delivery Within One Hour -->
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <div class="icon">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <h4>Delivery Within One Hour</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing tempora pariatur provident animi error
                        dignissimos cumque minus facere dolores cupiditate debitis.</p>
                </div>
            </div>
            <!-- Feature 3: Instant Support Team -->
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <div class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <h4>Instant Support Team</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing tempora pariatur provident animi error
                        dignissimos cumque minus facere dolores cupiditate debitis.</p>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <h4>Instant Support Team</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing tempora pariatur provident animi error
                        dignissimos cumque minus facere dolores cupiditate debitis.</p>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container py-5">
            <h2 class="text-center mb-5">Our Team Members</h2>
            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/300" alt="Team Member 1">
                        <h5>John Doe</h5>
                        <p>Founder & CEO</p>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/300" alt="Team Member 2">
                        <h5>Jane Smith</h5>
                        <p>Head of Operations</p>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/300" alt="Team Member 3">
                        <h5>Michael Johnson</h5>
                        <p>Marketing Manager</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
    </section>

    <hr>
    <section class="info" id="info" style="background-color:#212529">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <p style="font-size: 30px; font-weight: 700; color: rgb(255, 255, 255);">Clothes Store</p>
                <div>
                    <p style="font-size: 15px; font-weight: 400; margin-top: 15px; color: rgb(255, 255, 255);">
                        Donec facilisis quam ut purus rutrum lobortis.
                        Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit
                        . Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-1 mt-5">
                <p><a class="pp" style="font-size: 20px;" href="">About-us</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Services</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Blog</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Contact-Us</a></p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-1 mt-5">
                <p><a class="pp" style="font-size: 20px;" href="">Support</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Facebook</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Whatsapp</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Live-Chat</a></p>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-1 mt-5">
                <p><a class="pp" style="font-size: 20px;" href="">Jobs</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Our Team</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Leadership</a></p>
                <p><a class="pp" style="font-size: 20px;" href="">Privacy Policy</a></p>
            </div>
        </div>
        <hr>
        <div>
            <p class="ppp" style="color: rgb(255, 255, 255);">Copyright ©2023. All Rights Reserved. — Designed by
                <span class="namee">Mohamed-Maher</span>
            </p>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
