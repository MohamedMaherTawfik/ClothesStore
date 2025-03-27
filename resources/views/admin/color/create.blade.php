<x-create title="Add New Color">
    <x-slot name="header">
        Add New Color
    </x-slot>

    <form action="{{ route('storeColor') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Color" class="form-label">Color</label>
            <input type="text" name="color" value="{{ old('color') }}" class="form-control" id="Color" placeholder="Enter Color">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-create>
