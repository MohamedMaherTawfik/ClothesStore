<x-create title="Add New Categorey">
    <x-slot name="header">
        Add New Categorey
    </x-slot>

    <form action="{{ route('storeCategorey') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="categoreyName" class="form-label">Categorey Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="brandName" placeholder="Enter Categorey Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoreyImage" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="brandImage">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-create>
