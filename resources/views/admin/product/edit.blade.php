<x-edit title="Edit product">
    <x-slot name="header">
        Edit product
    </x-slot>

    <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="categorey_id">categorey: </label>
            <select id="categorey_id" name="categorey_id">
                <option value="" selected disabled>None</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
            </select>
            @error('categorey_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brand_id">brand: </label>
            <select id="brand_id" name="brand_id">
                <option value="" selected disabled>None</option>
                @foreach ($brands as $item)
                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-edit>
