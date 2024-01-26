@extends('Backend.Layouts.app')
@section('title', 'Users')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header row">
                            <div class="col-8">
                                <h3 class="card-title">User List</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-success">Add New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Full Access</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user?->role->type }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td> {{ $user->contact_number }}</td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $user->full_access == 1 ? 'badge-info' : 'badge-warning' }}">
                                                    {{ $user->full_access == 1 ? 'Yes' : 'No' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $user->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('user.edit', encryptor('encrypt', $user->id)) }}"
                                                    class="text-primary" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('user.destroy', encryptor('encrypt', $user->id)) }}"
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
                                        <th colspan="6">No User Found</th>
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
