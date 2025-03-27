<x-create title="Add New Size">
    <x-slot name="header">
        Add New Size
    </x-slot>

    <form action="{{ route('storeSize') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Size" class="form-label">Size</label>
            <input type="text" name="Size" value="{{ old('Size') }}" class="form-control" id="Size" placeholder="Enter Size">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-create>
