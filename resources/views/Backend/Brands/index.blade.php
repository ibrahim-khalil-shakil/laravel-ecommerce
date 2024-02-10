@extends('Backend.Layouts.app')
@section('title', 'Brand List')

@section('content')
{{-- Content Header --}}
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Brand List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Brands</a></li>
                    <li class="breadcrumb-item active">Brand List</li>
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
                            <h3 class="card-title">Displaying Brand Data from Brand Table</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('brand.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-brand-plus"></i> Add New Brand</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td><img src="{{asset('public/uploads/brands/'.$brand->image)}}" alt="img"
                                            class="rounded-circle" height="50px" width="50px">
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge {{ ($brand->status == 1) ? 'badge-success' : (($brand->status == 0) ? 'badge-danger' : 'badge-warning') }}">
                                            {{ ($brand->status == 1) ? 'Active' : (($brand->status == 0) ? 'Inactive' :
                                            'Pending') }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('brand.edit', encryptor('encrypt', $brand->id)) }}"
                                            class="text-primary" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('brand.destroy', encryptor('encrypt', $brand->id)) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger btn" title="Delete"><i
                                                    class="fa-regular fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                            <tfoot>
                                <tr>
                                    <th colspan="6">No Brand Found</th>
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