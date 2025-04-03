@include('admin.dashboard.header')
@include('admin.dashboard.sidebar')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
@include('admin.dashboard.navbar')
    <!-- partial -->
    <div class="main-panel mt-5 ">
        <x-app title="All Sizes">
            <x-slot name="header" class="text-light bg-dark">
                All Sizes
            </x-slot>

            <x-slot name="actions">
                <a href="{{ route('createSize') }}" class="btn btn-success btn-sm float-end">Create Size</a>
            </x-slot>

            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <th>S/N</th>
                    <th>size</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody class="bg-dark">
                    @if (count($size) > 0)
                        @foreach ($size as $item)
                            <tr class="bg-dark text-light">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->size }}</td>
                                <td><a href="" class="btn btn-primary btn-md">Edit Size</a></td>
                                <td><a href="" class="btn btn-danger btn-md">Delete Size</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="bg-light">No Sizes Found!</td>
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
