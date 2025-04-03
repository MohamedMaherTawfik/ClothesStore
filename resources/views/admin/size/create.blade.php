<x-create title="Add New Size">
    <x-slot name="header">
        Add New Size
    </x-slot>

    <form action="{{ route('storeSize') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="size" class="form-label">size</label>
            <input type="text" name="size" value="{{ old('size') }}" class="form-control" id="size" placeholder="Enter size">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-create>
