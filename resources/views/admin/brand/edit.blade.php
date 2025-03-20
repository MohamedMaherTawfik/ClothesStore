<x-edit title="Edit Brand">
    <x-slot name="header">
        Edit Brand
    </x-slot>

    <form action="{{ route('updateBrand', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $brand->id }}">

        <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <input type="text" name="name" value="{{ old('name', $brand->name) }}" class="form-control" id="brandName" placeholder="Enter Brand Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brandImage" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="brandImage">
            <small>Current Image: {{ $brand->image }}</small>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-edit>
