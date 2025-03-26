<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Ecommerce</title>
</head>

<body class="bg-dark">

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
                                <a class="nav-link" href="#" data-scroll-nav="0">Home</a>
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
                        <a href="#" class="butn lang-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                        @if (!Auth::check())
                            <div class="dropdown">
                                <!-- Dropdown Button -->
                                <button class="butn contact-butn dropdown-toggle px-2" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    sign in
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Log in</a></li>
                                </ul>
                            </div>
                        @else
                        <div class="dropdown">
                            <!-- Dropdown Button -->
                            <button class="butn contact-butn dropdown-toggle px-2" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </ul>
                        </div>
                        @endif

                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <!--Start inner-header -->
            <div class="inner-header">
                <div class="row">
                    <div class="col-md-10 col-lg-7">
                        <div class="text-box ">
                            <div class="content wow text-focus-in ">
                                <p class="subtitle">Shop Smart, Shop Fast</p>
                                <h1 class="title mt-3">Trendy Deals<br>Hub Products</h1>
                                <p class="p mt-3">
                                    Find the best deals on top-quality products, all in one place.
                                    Fast, secure, and hassle free shopping delivered to your door step
                                </p>
                                <div class="btns-wrapper mt-4">
                                    <a href="#" data-scroll-goto="1" class="main-btn">Explore</a>
                                    <a href="https://www.youtube.com/watch?v=HmZKgaHa3Fg" data-fancybox
                                        class="video-btn"><span class="icon"><i class="fas fa-play"></i></span> Watch
                                        video</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="about-sec" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('images/hody.jpg') }}" alt="" class="main-img wow fadeInRight"
                            data-wow-duration="2s" />
                        <img src="{{ asset('images/widthPhoto.jpg') }}" alt="" class="card-img wow fadeInLeft"
                            data-wow-duration="2s" data-wow-delay=".5s" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-box wow text-focus-in" data-wow-duration="2s">
                        <div class="text-h">
                            <p class="subtitle text-danger fs-4">About us</p>
                            <h1 class="title mt-3" style="color: white">Effective Strategy <br>For Growth</h1>
                        </div>
                        <p class="mt-3" style="color: white">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
                            consequuntur quaem, eum nisi natus quia debitis.
                        </p>
                        <div>
                            <a href="#" class="btn btn-danger mt-3">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="images/pattern1.png" alt="" class="pattern wow fadeInRight" data-wow-duration="2s">

    </section>

    <div class="mt-5"></div>
    <div class="mt-5"></div>
    <div class="mt-5"></div>

    <section class="categories-sec">
        <h3 class="text-center fw-bold mb-5 text-white">Categories</h3>
        <div class="container">
            <div class="row">
                @foreach ($categories as $item)
                    <div class="col-md-3">
                        <div class="card text-black" style="width: 18rem;  opacity: 80%;">
                            <img src="{{ asset('categorey/' . $item->image) }}" class="card-img-top" style="height: 180px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                {{-- <p>{{ $item->description }}</p> --}}
                                <a href="{{ route('showCategorey', $item->id) }}" class="btn btn-danger mt-3">Show
                                    Categorey</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="mt-5">.</div>
    <div class="mt-5"></div>
    <div class="mt-5"></div>

    <section>
        <h4 class="text-center text-white fw-bold">Find Us On These Platforms</h4>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="card bg-transparent border-0">
                        <img src="{{ asset('sponsers/amazon.png') }}" class="img-fluid mt-3" alt="Amazon">
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="card bg-transparent border-0">
                        <img src="{{ asset('sponsers/talabat.png') }}" class="img-fluid" alt="Talabat">
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="card bg-transparent border-0">
                        <img src="{{ asset('sponsers/jumia.png') }}" class="img-fluid" alt="Jumia">
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="card bg-transparent border-0">
                        <img src="{{ asset('sponsers/noon.png') }}" class="img-fluid" alt="noon">
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6 text-center">
                    <div class="card bg-transparent border-0">
                        <img src="{{ asset('sponsers/olx.png') }}" class="img-fluid" alt="olx">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-5"></div>
    <div class="mt-5"></div>
    <div class="mt-5"></div>

    <section class="brand-sec">
        <h3 class="text-center fw-bold mb-4 text-white">Brands</h3>
        <div class="container">
            <div class="row">
                @foreach ($brands as $item)
                    <div class="col-md-3 mt-4">
                        <div class="card text-black" style="width: 18rem; opacity: 80%;">
                            <img src="{{ asset('brand/' . $item->image) }}" class="card-img-top"
                                style="height: 180px" alt="...">
                            {{-- <hr> --}}
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <a href="#" class="btn btn-danger mt-3">Show Categorey</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="mt-5">.</div>
    <div class="mt-5">.</div>

    <section>
        <div class="container text-center">
            <h3 class="fw-bold text-white">Latest Products</h3>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-lg-5 m">
                    <div class="card text-black" style="width: 31rem; opacity: 80%;">
                        <img src="{{ asset('images/hody2.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card text-black" style="width: 31rem; opacity: 80%;">
                        <img src="{{ asset('images/hody3.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-5"></div>
    <hr class="text-white ">

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
