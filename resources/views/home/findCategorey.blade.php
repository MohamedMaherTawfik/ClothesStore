<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- taiilwind css --}}

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Find Category - ClothesStore</title>
    <style>

    </style>
</head>

<body>
    <x-navbar />

    <section class="py-12 bg-gray-50">
        <!-- Category Header Section -->
        <div class="container mx-auto px-4 mb-12">
            <div class="flex flex-col md:flex-row gap-8 items-center">
                <!-- Category Image -->
                <div class="w-full md:w-1/3 lg:w-1/4">
                    <img src="{{ asset('categorey/' . $categorey->image) }}" alt="Electronics Category"
                        class="w-full h-64 object-cover rounded-lg shadow-lg">
                </div>

                <!-- Category Info -->
                <div class="w-full md:w-2/3 lg:w-3/4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <nav class="flex mb-4" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="/"
                                        class="text-sm font-medium text-gray-700 hover:text-blue-600">Home</a>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="w-3 h-3 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $categorey->name }}</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>

                        <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ $categorey->name }}</h1>
                        <p class="text-gray-600 mb-4">{{ $categorey->description }}</p>

                        <div class="flex flex-wrap gap-4 mb-4">
                            <span
                                class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">{{ count($categorey->products) }}
                                Products</span>
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">Free
                                Shipping</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-800 text-sm font-medium rounded-full">New
                                Arrivals</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="container mx-auto px-4">
            <!-- Filters/Sorting -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <h2 class="text-xl font-semibold text-gray-800">Featured Products</h2>
                <div class="flex gap-4">
                    <select
                        class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Sort by: Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest Arrivals</option>
                    </select>
                    <button class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-filter mr-2"></i> Filters
                    </button>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <!-- Product Card -->
                @foreach ($categorey->products as $item)
                <form action="{{ route('addToCart', $item->id) }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="relative">
                            <img src="{{ asset('product/' . $item->image) }}" alt="{{ $item->name }}"
                                class="w-full h-48 object-cover">
                            @if($item->discount) <!-- Only show SALE if there's a discount -->
                            <span class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">SALE</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <!-- Name and Rating on same line -->
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $item->name }}</h3>
                                <div class="flex text-yellow-400">
                                    @php
                                        $fullStars = floor($item->rating);
                                        $hasHalfStar = ($item->rating - $fullStars) >= 0.5;
                                    @endphp

                                    @for($i = 0; $i < $fullStars; $i++)
                                        <i class="fas fa-star text-sm"></i>
                                    @endfor

                                    @if($hasHalfStar)
                                        <i class="fas fa-star-half-alt text-sm"></i>
                                        @php $fullStars++; @endphp
                                    @endif

                                    @for($i = $fullStars; $i < 5; $i++)
                                        <i class="far fa-star text-sm"></i>
                                    @endfor
                                </div>
                            </div>

                            <!-- Price and Quantity on next line -->
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-lg font-bold text-gray-900">${{ number_format($item->price, 2) }}</span>
                                <div class="flex items-center">
                                    <label for="quantity_{{ $item->id }}" class="text-sm text-gray-600 mr-2">Qty:</label>
                                    <input type="number" name="quantity" id="quantity_{{ $item->id }}"
                                        value="1" min="1" max="100" step="1"
                                        class="w-16 border border-gray-300 rounded px-2 py-1 text-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <!-- Add to Cart button full width below -->
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition-colors duration-200">
                                Add To Cart
                            </button>
                        </div>
                    </div>
                </form>
            @endforeach
            </div>

        </div>
    </section>


    <x-footer />
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
