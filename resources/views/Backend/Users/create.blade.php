@extends('Backend.Layouts.app')
@section('title', 'Add User')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Form</li>
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
                            <h3 class="card-title">Insert User Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="fullName">Name</label>
                                    <input type="text" class="form-control" name="fullName"
                                        value="{{ old('fullName') }}">
                                    @if ($errors->has('fullName'))
                                        <span class="text-danger"> {{ $errors->first('fullName')}}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="roleId">Role</label>
                                    <select class="form-control" name="roleId">
                                        @forelse ($role as $r)
                                            <option value="{{ $r->id }}"
                                                {{ old('roleId') == $r->id ? 'selected' : '' }}>
                                                {{ $r->type }}</option>
                                        @empty
                                            <option value="">No Role Found</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailAddress">Email address</label>
                                    <input type="email" class="form-control" name="emailAddress"
                                        value="{{ old('emailAddress') }}">
                                    @if ($errors->has('emailAddress'))
                                        <span class="text-danger"> {{ $errors->first('emailAddress') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contactNumber">Phone</label>
                                    <input type="tel" class="form-control" name="contactNumber"
                                        value="{{ old('contactNumber') }}">
                                    @if ($errors->has('contactNumber'))
                                        <span class="text-danger"> {{ $errors->first('contactNumber') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob">DOB</label>
                                    <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                                    @if ($errors->has('dob'))
                                        <span class="text-danger"> {{ $errors->first('dob') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bio">Bio</label>
                                    <textarea class="form-control" rows="3" name="bio">{{ old('bio') }}</textarea>
                                    @if ($errors->has('bio'))
                                        <span class="text-danger"> {{ $errors->first('bio') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fullAddress">Address</label>
                                    <textarea class="form-control" rows="3" name="fullAddress">{{ old('fullAddress') }}</textarea>
                                    @if ($errors->has('fullAddress'))
                                        <span class="text-danger"> {{ $errors->first('fullAddress') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="socialLinks">Social Link</label>
                                    <input type="text" class="form-control" name="socialLinks"
                                        value="{{ old('socialLinks') }}">
                                    @if ($errors->has('socialLinks'))
                                        <span class="text-danger"> {{ $errors->first('socialLinks') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
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
                                <div class="form-group col-md-6">
                                    <label for="fullAccess">Full Access</label>
                                    <select class="form-control" name="fullAccess">
                                        <option value="0" {{ old('fullAccess') == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('fullAccess') == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
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
