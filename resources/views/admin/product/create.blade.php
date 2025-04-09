<x-create title="Add New product">
    <x-slot name="header">
        Add New product
    </x-slot>

    <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="productName" class="form-label">products Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="brandName"
                placeholder="Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productDescription" class="form-label">products Description</label>
            <input type="text" name="description" value="{{ old('description') }}" class="form-control"
                id="productDescription" placeholder="description">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productPrice" class="form-label">products price</label>
            <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="productprice"
                placeholder="price">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productquantity" class="form-label">products quantity</label>
            <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" id="productquantity"
                placeholder="quantity">
            @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productstatus" class="form-label">products status</label>
            <input type="text" name="status" value="{{ old('status') }}" class="form-control" id="brandstatus"
                placeholder="status">
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productdiscount" class="form-label">products discount</label>
            <input type="text" name="discount" value="{{ old('discount') }}" class="form-control" id="branddiscount"
                placeholder="discount">
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

        <div class="mb-3">
            <label for="productImage" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="productImage">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-create>
