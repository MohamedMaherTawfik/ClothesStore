<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <title>Delete Product From Cart</title>

</head>

<body>
    <div class="confirm-container">
        <p>Warning <i class="fa-solid fa-triangle-exclamation"></i></p>
        <p>Are you sure you want to delete <span class="text-red fw-bold">{{ $product->name }}</span> from your cart ?</p>

        <form action="{{ route('deleteFromCart', $product->id) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-delete">Yes</button>
            <a href="{{ route('cart') }}" class="btn btn-cancel">No</a>
        </form>
    </div>
</body>

</html>
