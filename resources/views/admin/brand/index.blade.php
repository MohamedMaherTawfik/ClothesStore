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
                All Brands
            </x-slot>

            <x-slot name="actions">
                <a href="{{ route('createBrand') }}" class="btn btn-success btn-sm float-end">Create Brand</a>
            </x-slot>

            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <th>S/N</th>
                    <th>Brand Name</th>
                    <th>Brand Image URL</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody class="bg-dark">
                    @if (count($brands) > 0)
                        @foreach ($brands as $item)
                            <tr class="bg-dark text-light">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->image }}</td>
                                <td><a href="{{ route('editBrand', $item->id) }}" class="btn btn-primary btn-md">Edit Brand</a></td>
                                <td><a href="{{ route('deleteBrand', $item->id) }}" class="btn btn-danger btn-md">Delete Brand</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="bg-light">No Brand Found!</td>
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
