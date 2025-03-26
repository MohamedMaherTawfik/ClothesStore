@include('admin.dashboard.header')
@include('admin.dashboard.sidebar')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
@include('admin.dashboard.navbar')
    <!-- partial -->
    <div class="main-panel mt-5 ">
        <x-app title="All ">
            <x-slot name="header" class="text-light bg-dark">
                All Products
            </x-slot>

            <x-slot name="actions">
                <a href="{{ route('createProduct') }}" class="btn btn-success btn-sm float-end">Create product</a>
            </x-slot>

            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Image URL</th>
                    <th>price</th>
                    <th>discount</th>
                    <th>status</th>
                    <th>categorey</th>
                    <th>brand</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody class="bg-dark">
                    @if (count($products) > 0)
                        @foreach ($products as $item)
                            <tr class="bg-dark text-light">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->image }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->discount }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->categorey_id }}</td>
                                <td>{{ $item->brand_id }}</td>
                                <td><a href="{{ route('editProduct', $item->id) }}" class="btn btn-primary btn-md">Edit Product</a></td>
                                <td><a href="{{ route('deleteProduct', $item->id) }}" class="btn btn-danger btn-md">Delete Product</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="bg-light">No Product Found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </x-app>

    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.dashboard.footer')
