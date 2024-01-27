@extends('Backend.Layouts.app')
@section('title', 'Edit Role')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Role Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('role.update', encryptor('encrypt', $role->id)) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body row">
                                <div class="form-group col-md-12">
                                    <label for="roleType">Role Type</label>
                                    <input type="text" class="form-control" name="roleType"
                                        value="{{ old('roleType', $role->type) }}">
                                    @if ($errors->has('roleType'))
                                        <span class="text-danger"> {{ $errors->first('roleType') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="roleIdentity">Role Identity</label>
                                    <input type="text" class="form-control" name="roleIdentity"
                                        value="{{ old('roleIdentity', $role->identity) }}">
                                    @if ($errors->has('roleIdentity'))
                                        <span class="text-danger"> {{ $errors->first('roleIdentity') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('styles')
@endpush
@push('scripts')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('public/Backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('public/Backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

            // Set hidden input value based on checkbox state
            $('input[name="fullAccess"]').on('switchChange.bootstrapSwitch', function(event, state) {
                // If checked, set hidden input value to 1; otherwise, set it to 0
                $('input[name="fullAccess"]').val(state ? 1 : 0);
            });
            // Set hidden input value based on checkbox state
            $('input[name="status"]').on('switchChange.bootstrapSwitch', function(event, state) {
                // If checked, set hidden input value to 1; otherwise, set it to 0
                $('input[name="status"]').val(state ? 1 : 0);
            });
        });
    </script>
@endpush
