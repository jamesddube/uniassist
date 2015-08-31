@extends('layout.auth')
@section('title','Register')
@section('form')
<div class="login-box center-block">
    <form class="form-horizontal" role="form" method="POST" action="/auth/register">
        {!! csrf_field() !!}
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <p class="title">Enter your details</p>

        <div class="form-group">
            <label for="username" class="control-label sr-only">Username</label>

            <div class="col-sm-12">
                <div class="input-group">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" id="username"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="username" class="control-label sr-only">Username</label>

            <div class="col-sm-12">
                <div class="input-group">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" id="username"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
            </div>
        </div>
        <label for="password" class="control-label sr-only">Password</label>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
            </div>
        </div>
        <label for="password" class="control-label sr-only">Password</label>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="password" placeholder="Confirm password"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
            </div>
        </div>
        <label class="fancy-checkbox">
            <input type="checkbox" name="remember">
            <span>Remember me next time</span>
        </label>
        <button class="btn btn-custom-primary btn-lg btn-block btn-auth"><i class="fa fa-arrow-circle-o-right"></i>
            Register
        </button>
    </form>

    <div class="links">
        <p><a href="page-login.html#">Forgot Username or Password?</a></p>

        <p><a href="page-login.html#">Create New Account</a></p>
    </div>
</div>
@endsection