<x-edit title="Edit Categorey">
    <x-slot name="header">
        Edit Categorey
    </x-slot>

    <form action="{{ route('updateBrand', $categorey->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $categorey->id }}">

        <div class="mb-3">
            <label for="categoreyName" class="form-label">categorey Name</label>
            <input type="text" name="name" value="{{ old('name', $categorey->name) }}" class="form-control" id="categoreyName" placeholder="Enter categorey Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoreyImage" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="categoreyImage">
            <small>Current Image: {{ $categorey->image }}</small>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-edit>
