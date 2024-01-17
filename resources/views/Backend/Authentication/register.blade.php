@extends('Backend.Layouts.appAuth')
@section('title', 'Register')

@section('content')
<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="{{route('register.store')}}" method="post">
            @csrf
            @if($errors->has('fullName'))
            <small class="d-block text-danger">{{$errors->first('fullName')}}</small>
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name="fullName" value="{{old('name')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            @if($errors->has('contactNumber'))
            <small class="d-block text-danger">{{$errors->first('contactNumber')}}</small>
            @endif
            <div class="input-group mb-3">
                <input type="tel" class="form-control" placeholder="Contact" name="contactNumber" value="{{old('contact_number')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>
            @if($errors->has('emailAddress'))
            <small class="d-block text-danger">{{$errors->first('emailAddress')}}</small>
            @endif
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="emailAddress" value="{{old('email')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            @if($errors->has('password'))
            <small class="d-block text-danger">{{$errors->first('password')}}</small>
            @endif
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
            <small class="d-block text-danger">{{$errors->first('password_confirmation')}}</small>
            @endif
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i>
                Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i>
                Sign up using Google+
            </a>
        </div>

        <a href="{{route('login')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
@endsection