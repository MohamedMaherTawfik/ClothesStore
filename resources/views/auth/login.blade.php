<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>

    <div class="signin-container">
        <h3 class="mb-3 text-white">Log In</h3>
        <form method="post" enctype="multipart/form-data" action="{{ route('login') }}">
            @csrf
            <div class="mb-3" style="">
                <input type="email" name="email" class="form-control" placeholder="Email">
                @error('error')
                    <span class="text-warning">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn signin-btn text-white">login</button>
        </form>
        <p class="mt-3 text-white">
            Don't have an account? <a class="BelowLink text-decoration-none text-warning" href="/signup">Register</a>
        </p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
