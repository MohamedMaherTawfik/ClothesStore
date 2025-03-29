<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>find Categorey</title>
</head>

<body class="bg-dark">

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 justify-content-center">
                    <div class="text-white fs-3 text-center">{{ $categorey->name }}</div>
                    <img src="{{ asset('categorey/' . $categorey->image) }}"
                        class="img-fluid mt-5 justify-content-center" style="width: 100%; height: 7    0%;"
                        alt="...">
                </div>
            </div>
        </div>
    </section>

    <section class="categories-sec">
        <h3 class="text-center fw-bold mb-5 text-white">Products</h3>
        <div class="container">
            <div class="row">
                @foreach ($categorey->products as $item)
                    <div class="col-md-3">
                        <div class="card text-black" style="width: 18rem; opacity: 80%;">
                            <img src="{{ asset('product/' . $item->image) }}" style="height: 180px" class="card-img-top"
                                alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p>{{ $item->description }}</p>
                                    <form action="{{ route('addToCart', $item->id) }}" method="POST">
                                        @csrf
                                        <p class="fw-bold mb-0">price: ${{ $item->price }}</p>
                                        <div class="d-flex align-items-center justify-content-between mt-3">

                                            <div class="d-flex align-items-center">
                                                <label for="quantity" class="fw-bold me-2">Quantity:</label>
                                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="100" step="1" class="form-control" style="width: 55px;">
                                            </div>
                                            <input type="submit" name="submit" value="Add to Cart" class="btn btn-primary">

                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="mt-5">.</div>

</body>

</html>
