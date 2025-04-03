<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/response.css')}}">
</head>
<body>
    <div class="success-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 8 0a8 8 0 0 1 8 8zM6.97 11.03a.75.75 0 0 0 1.08 0l4-4a.75.75 0 1 0-1.08-1.04L7.5 9.44l-1.47-1.47a.75.75 0 1 0-1.06 1.06l2 2z"/>
        </svg>
        <h2 class="mt-3 text-success">Success!</h2>
        <p>Your transaction was completed successfully.</p>
        <a href="{{ route('home') }}" class="btn btn-success mt-3">Go to Home</a>
    </div>
</body>
</html>
