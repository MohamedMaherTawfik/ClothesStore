<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>All Brands</h4>
            <a href="{{route('create')}}" class="btn btn-success btn-sm float-end">Add New</a>
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
                    <th>brand image</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    @if (count($brands) > 0)
                        @foreach ($brands as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td><a href="{{route('edit', $item->id)}}" class="btn btn-primary btn-md">Edit</a></td>
                            <td><a href="{{route('delete', $item->id)}}" class="btn btn-danger btn-md">Delete</a></td>
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
