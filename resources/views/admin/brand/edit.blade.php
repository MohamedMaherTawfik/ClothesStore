<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Brand</div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif
                <div class="card-body">
                    <form action="{{route('updateBrand', $brand->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Brand Name</label>
                            <input type="text" name="name" value="{{$brand->name}}" class="form-control" id="formGroupExampleInput" placeholder="Enter Brand Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">image</label>
                            <input type="file" name="image" value="{{$brand->image}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>
