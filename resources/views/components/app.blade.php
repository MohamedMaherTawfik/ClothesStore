<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Default Title' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-light text-center justify-content-between">
                <h4>{{ $header ?? 'Default Header' }}</h4>
                {{ $actions ?? '' }} <!-- Slot for action buttons -->
            </div>

            @if (Session::has('success'))
                <span class="alert alert-success p-2 bg-dark text-light">{{ Session::get('success') }}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2 bg-dark">{{ Session::get('fail') }}</span>
            @endif

            <div class="card-body bg-dark ">
                {{ $slot }} <!-- This is where the page-specific content goes -->
            </div>
        </div>  
    </div>
</body>
</html>
