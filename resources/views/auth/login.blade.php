<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - e-learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gaming-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('{{ asset('images/controller.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .right-side {
            background-color: #015F66FF;
        }
    </style>
</head>

<body class="h-screen">
    <div class="flex h-full">
        <!-- Left Side - Image -->

        <div class="hidden lg:flex lg:w-1/2 bg-cover bg-center flex-col justify-center items-center text-white p-12"
            style="background-image: url('{{ asset('images/ground.jpg') }}');">

            <div class="bg-opacity-50 p-8 rounded-lg text-center text-black">
                <h1 class="text-5xl font-bold mb-4">WELCOME</h1>
                <p class="text-xl">Creativity is intelligence having fun.</p>
            </div>
        </div>


        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-12 right-side">
            <div class="w-full max-w-md">
                <h2 class="text-3xl font-bold text-white mb-8">Login</h2>

                <form action="{{ route('login') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-3 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-blue-500"
                            placeholder="email">
                        @error('error')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-blue-500"
                            placeholder="password">
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200"
                        style="width: 30%">
                        Log in
                    </button>

                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-700"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-black text-gray-400">or</span>
                        </div>
                    </div>

                    <button type="button"
                        class="w-full flex items-center justify-center bg-white text-black py-3 rounded-lg hover:bg-gray-100 transition duration-200">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4" />
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853" />
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                fill="#FBBC05" />
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="#EA4335" />
                        </svg>
                        Sign in with Google
                    </button>

                    <p class="text-white text-sm text-center mt-6">
                        Don't have an account?<a href="{{ route('register') }}" class="text-white-500 hover:text-white-400"> Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
