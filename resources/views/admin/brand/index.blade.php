<x-app title="All Brands">
    <x-slot name="header">
        All Brands
    </x-slot>

    <x-slot name="actions">
        <a href="{{ route('createBrand') }}" class="btn btn-success btn-sm float-end">Create Brand</a>
    </x-slot>

    <table class="table table-sm table-striped table-bordered">
        <thead>
            <th>S/N</th>
            <th>Brand Name</th>
            <th>Brand Image URL</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            @if (count($brands) > 0)
                @foreach ($brands as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->image }}</td>
                        <td><a href="{{ route('editBrand', $item->id) }}" class="btn btn-primary btn-md">Edit Brand</a></td>
                        <td><a href="{{ route('deleteBrand', $item->id) }}" class="btn btn-danger btn-md">Delete Brand</a></td>
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
