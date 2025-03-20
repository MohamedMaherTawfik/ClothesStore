<x-create title="Add New Brand">
    <x-slot name="header">
        Add New Brand
    </x-slot>

    <form action="{{ route('storeBrand') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="brandName" placeholder="Enter Brand Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brandImage" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="brandImage">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-create>
