@extends('Backend.Layouts.app')
@section('title', 'Add Brand')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Brand</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Brands</a></li>
                    <li class="breadcrumb-item active">Add Brand</li>
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
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Insert Brand Data into Brand Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">
                            @if(!fullAccess())
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="pending" {{ old('status')=='pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                            @endif
                            <div class="form-group col-md-12">
                                <label for="brandName">Brand Name</label>
                                <input type="text" class="form-control" name="brandName" value="{{ old('brandName') }}">
                                @if ($errors->has('brandName'))
                                <span class="text-danger"> {{ $errors->first('brandName') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
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

            // Initialize Bootstrap Switch for the fullAccess checkbox
            $('input[name="fullAccess"]').bootstrapSwitch();
            // Initialize Bootstrap Switch for the status checkbox
            $('input[name="status"]').bootstrapSwitch();
        });
</script>
@endpush