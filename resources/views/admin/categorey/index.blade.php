<x-app title="All Categories">
    <x-slot name="header">
        All categoreys
    </x-slot>

    <x-slot name="actions">
        <a href="{{ route('createCategorey') }}" class="btn btn-success btn-sm float-end">Create categorey</a>
    </x-slot>

    <table class="table table-sm table-striped table-bordered">
        <thead>
            <th>S/N</th>
            <th>categorey Name</th>
            <th>categorey Image URL</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            @if (count($allCategories) > 0)
                @foreach ($allCategories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->image }}</td>
                        <td><a href="{{ route('editCategorey', $item->id) }}" class="btn btn-primary btn-md">Edit categorey</a></td>
                        <td><a href="{{ route('deleteCategorey', $item->id) }}" class="btn btn-danger btn-md">Delete categorey</a></td>
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
