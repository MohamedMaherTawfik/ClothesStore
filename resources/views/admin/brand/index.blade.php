<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Brands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>All Brands</h4>
                <a href="{{route('createBrand')}}" class="btn btn-success btn-sm float-end">Create Brand</a>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <th>S/N</th>
                        <th>Brand name</th>
                        <th>brand image url</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @if (count($brands) > 0)
                            @foreach ($brands as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->image}}</td>
                                <td><a href="{{route('editBrand', $item->id)}}" class="btn btn-primary btn-md">Edit Brand</a></td>
                                <td><a href="{{route('deleteBrand', $item->id)}}" class="btn btn-danger btn-md">Delete Brand</a></td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No Brands Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
