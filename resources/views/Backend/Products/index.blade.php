@extends('Backend.Layouts.app')
@section('title', 'Product List')

@section('content')
{{-- Content Header --}}
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header row">
                        <div class="col-8">
                            <h3 class="card-title">Displaying Product Data from Product Table</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('product.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-square-plus"></i> Add New Product</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Subategory</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Featured?</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{asset('public/uploads/products/'.$product->image)}}" alt="img"
                                            width="50" height="50">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category?->name }}</td>
                                    <td>{{ $product->subcategory?->name }}</td>
                                    <td>{{ $product->brand?->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="text-center">
                                        <span
                                            class="badge {{ ($product->is_featured == 1) ? 'badge-info' : 'badge-primary' }}">
                                            {{ ($product->is_featured == 1) ? 'Featured' : 'Regular' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge {{ ($product->status == 1) ? 'badge-success' : 'badge-danger' }}">
                                            {{ ($product->status == 1) ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('product.edit', encryptor('encrypt', $product->id)) }}"
                                            class="text-primary" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form
                                            action="{{ route('product.destroy', encryptor('encrypt', $product->id)) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger btn" title="Delete">
                                                <i class="fa-regular fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                            <tfoot>
                                <tr>
                                    <th colspan="8">No Product Found</th>
                                </tr>
                            </tfoot>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('public/Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('public/Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<style>
    .table td {
        vertical-align: middle;
    }
</style>
@endpush
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('public/Backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/Backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
</script>
@endpush