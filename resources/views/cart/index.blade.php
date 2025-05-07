<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- tailwind css --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <title>Cart</title>
</head>

<body>
  <x-navbar />

  <section>
    <div class="container">
        <div>
            <h3 class="text-3xl font-bold text-center">My Cart</h3>
        </div>
    </div>
  </section>

  <section class="py-8">
    <div class="container mx-auto px-4 mt-5">
      <div class="bg-white rounded-lg shadow-lg p-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-red-600">My Items</h2>
          <form action="" method="post">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition-colors duration-200">
              Clear Cart
            </button>
          </form>
        </div>

        <!-- Cart Table -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @if (count($cartItems) > 0)
                @foreach ($cartItems as $item)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <img src="{{ asset('product/' . $item->product->image) }}"
                           alt="{{ $item->product->name }}"
                           class="w-20 h-20 object-cover rounded">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{ $item->product->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      ${{ number_format($item->product->price, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ $item->quantity }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                      ${{ number_format($item->product->price * $item->quantity, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <a href="{{ route('deleteFromCart', $item->product->id) }}"
                         class="text-red-600 hover:text-red-900 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Remove
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="px-6 py-4 text-center text-gray-500 bg-gray-50">
                    No Items Found!
                  </td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>

        <!-- Footer Section -->
        <div class="mt-8 pt-6 border-t border-gray-200">
          <div class="flex justify-between items-center">
            <h5 class="text-lg font-semibold">
              Total: <span class="font-bold text-gray-900">${{ number_format($total, 2) }}</span>
            </h5>
            <div class="flex gap-3">
              <a href="{{ route('checkout') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition-colors duration-200">
                Place Order
              </a>
              <form action="{{ route('payPage') }}" method="get">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md transition-colors duration-200">
                  Buy Now
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>

</html>
