<x-edit title="Edit product">
    <x-slot name="header">
        Edit product
    </x-slot>

    <form action="{{ route('updateBrand', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $product->id }}">

        <div class="mb-3">
            <label for="productName" class="form-label">product Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" id="productName" placeholder="Enter product Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productDescription" class="form-label">product Description</label>
            <input type="text" name="description" value="{{ old('description', $product->description) }}" class="form-control" id="productDescription" placeholder="Enter product Description">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productPrice" class="form-label">product Price</label>
            <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control" id="productPrice" placeholder="Enter product Price">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productStatus" class="form-label">product Status</label>
            <input type="text" name="status" value="{{ old('status', $product->status) }}" class="form-control" id="productStatus" placeholder="Enter product Status">
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productDiscount" class="form-label">product Discount</label>
            <input type="text" name="discount" value="{{ old('discount', $product->discount) }}" class="form-control" id="productDiscount" placeholder="Enter product Discount">
            @error('discount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productImage" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="productImage">
            <small>Current Image: {{ $product->image }}</small>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-edit>
