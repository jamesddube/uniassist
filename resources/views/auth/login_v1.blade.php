@extends('layout.auth')
@section('title','Login')
@section('form')
<div class="login-box center-block">
    <form class="form-horizontal" role="form" method="POST" action="/auth/login">
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
        <p class="title">Use your username</p>

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
        <label class="fancy-checkbox">
            <input type="checkbox" name="remember">
            <span>Remember me next time</span>
        </label>
        <button class="btn btn-custom-primary btn-lg btn-block btn-auth"><i class="fa fa-arrow-circle-o-right"></i>
            Login
        </button>
    </form>

    <div class="links">
        <p><a href="{{ url('password/email') }}">Forgot Username or Password?</a></p>

        <p><a href="{{ url('auth/register') }}">Create New Account</a></p>
    </div>
</div>
@endsection