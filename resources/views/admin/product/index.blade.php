<x-app title="All Products">
    <x-slot name="header">
        All Products
    </x-slot>

    <x-slot name="actions">
        <a href="{{ route('createProduct') }}" class="btn btn-success btn-sm float-end">Create Product</a>
    </x-slot>

    <table class="table table-sm table-striped table-bordered">
        <thead>
            <th>S/N</th>
            <th>Name</th>
            <th>Image URL</th>
            <th>price</th>
            <th>discount</th>
            <th>status</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            @if (count($products) > 0)
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->image }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->discount }}</td>
                        <td>{{ $item->status }}</td>
                        <td><a href="{{ route('editProduct', $item->id) }}" class="btn btn-primary btn-md">Edit Product</a></td>
                        <td><a href="{{ route('deleteProduct', $item->id) }}" class="btn btn-danger btn-md">Delete Product</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No Brands Found!</td>
                </tr>
            @endif
        </tbody>
    </table>
</x-app>
