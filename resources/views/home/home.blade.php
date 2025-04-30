<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Ecommerce</title>
</head>

<body>

    <x-navbar />
    <x-header />

    <section class="py-24 bg-white" data-scroll-index="1">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center gap-12">
            <!-- Images Section -->
            <div class="w-full lg:w-1/2 relative">
                <!-- Main Image -->
                <img src="{{ asset('images/hody.jpg') }}" alt="Main Hoodie"
                    class="w-3/4 rounded-lg shadow-lg mb-6 animate-fade-in-right mx-auto">

                <!-- Overlay Image -->
                <img src="{{ asset('images/widthPhoto.jpg') }}" alt="Overlay Clothes"
                    class="absolute bottom-4 right-4 w-1/3 rounded-lg shadow-xl animate-fade-in-left delay-500">
            </div>

            <!-- Text Section -->
            <div class="w-full lg:w-1/2 text-gray-800 animate-text-focus-in">
                <p class="text-red-600 text-xl font-semibold mb-2">About Us</p>
                <h1 class="text-4xl font-bold text-gray-900 leading-snug">Effective Strategy <br>For Growth</h1>
                <p class="mt-4 text-gray-600">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
                    consequuntur quaem, eum nisi natus quia debitis.
                </p>
                <a href="#"
                    class="mt-6 inline-block bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg shadow transition">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <x-divider />

    <section class="py-16 bg-white">
        <h3 class="text-center text-3xl font-bold text-black mb-12">Categories</h3>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($categories as $item)
                    <div class="bg-white bg-opacity-80 rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('categorey/' . $item->image) }}" class="h-48 w-full object-cover"
                            alt="...">
                        <div class="p-4">
                            <h5 class="text-lg font-semibold">{{ $item->name }}</h5>
                            <p class="text-gray-500">{{ $item->description }}</p>
                            <a href="{{ route('showCategorey', $item->id) }}"
                                class="inline-block mt-3 bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Show
                                Category</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $categories->links() }}
            </div>
        </div>

    </section>

    <x-divider />

    <section class="py-16 bg-dark">
        <h4 class="text-center text-2xl font-bold text-gray-900">Find Us On These Platforms</h4>
        <div class="container mx-auto px-4 mt-8">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 justify-items-center">
                @foreach (['amazon', 'talabat', 'jumia', 'olx'] as $platform)
                    <div class="bg-transparent">
                        <img src="{{ asset('sponsers/' . $platform . '.png') }}"
                            class="h-20 object-contain grayscale hover:grayscale-0 transition-all duration-300"
                            alt="{{ $platform }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-divider />

    <section class="py-16">
        <h3 class="text-center text-3xl font-bold text-black mb-10">Brands</h3>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($brands as $item)
                    <div class="bg-white bg-opacity-80 rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('brand/' . $item->image) }}" class="h-48 w-full object-cover"
                            alt="{{ $item->name }}">
                        <div class="p-4">
                            <h5 class="text-lg font-semibold">{{ $item->name }}</h5>
                            <a href="#"
                                class="inline-block mt-3 bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Show
                                Brand</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $brands->links() }}
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold text-gray-900">Latest Products</h3>
            <div class="mt-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
                    @foreach ($products as $item)
                        <div class="bg-white bg-opacity-80 rounded-lg shadow-lg overflow-hidden w-full max-w-sm">
                            <a href="#" class="block">
                                <img src="{{ asset('product/' . $item->image) }}" class="w-full h-72 object-cover"
                                    alt="Product Image">
                                <div class="p-4">
                                    <!-- Product details/content here -->
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
               <div class="mt-5">{{ $products->links() }}</div>
            </div>
        </div>
    </section>

    <x-divider />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-8">
            <div class="bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-quote-left text-2xl mb-4"></i>
                <p class="mb-4">lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                <h5 class="font-semibold mb-2">John Doe</h5>
                <div class="flex justify-center space-x-1 text-yellow-400 mb-4">
                    @for ($i = 0; $i < 2; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </div>
                <img src="{{ asset('images/user.avif') }}" alt="testimonial" class="w-16 h-16 rounded-full mx-auto">
            </div>

            <div class="bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-quote-left text-2xl mb-4"></i>
                <p class="mb-4">lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                <h5 class="font-semibold mb-2">John Doe</h5>
                <div class="flex justify-center space-x-1 text-yellow-400 mb-4">
                    @for ($i = 0; $i < 5; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </div>
                <img src="{{ asset('images/user.avif') }}" alt="testimonial" class="w-16 h-16 rounded-full mx-auto">
            </div>

            <div class="bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-quote-left text-2xl mb-4"></i>
                <p class="mb-4">lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                <h5 class="font-semibold mb-2">John Doe</h5>
                <div class="flex justify-center space-x-1 text-yellow-400 mb-4">
                    @for ($i = 0; $i < 4; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </div>
                <img src="{{ asset('images/user.avif') }}" alt="testimonial" class="w-16 h-16 rounded-full mx-auto">
            </div>
    </div>


  <x-footer />

    {{-- tailwind css --}}
    <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>
