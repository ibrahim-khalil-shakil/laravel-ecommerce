@extends('Backend.Layouts.app')
@section('title', 'Add Subcategory')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Subcategory</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}">Subcategories</a></li>
                    <li class="breadcrumb-item active">Add Subcategory</li>
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
                        <h3 class="card-title">Insert Subcategory Data into Subcategory Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('subcategory.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">
                            @if(fullAccess())
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{ old('status')=="1" ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ old('status')=="0" ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                            @endif
                            <div class="form-group col-md-6">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcategoryName">Subcategory Name</label>
                                <input type="text" class="form-control" name="subcategoryName" value="{{ old('subcategoryName') }}">
                                @if ($errors->has('subcategoryName'))
                                <span class="text-danger"> {{ $errors->first('subcategoryName') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="categoryId">Category</label>
                                <select class="form-control" name="categoryId">
                                    @forelse ($category as $cat)
                                    <option value="{{$cat->id}}" {{old('categoryId')==$cat->id?'selected':''}}>
                                        {{$cat->name}}</option>
                                        @empty
                                        <option value="">No Category Found</option>
                                    @endforelse
                                </select>
                                @if ($errors->has('categoryId'))
                                <span class="text-danger"> {{ $errors->first('categoryId') }}</span>
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