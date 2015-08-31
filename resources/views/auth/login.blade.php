@extends('student/master')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div id="results"></div>
    <form role="form" action="" method="post" name="form">
        {!! csrf_field() !!}

        <div class="panel panel-default">
            <div class="panel-heading text-center"><h4>Log In</h4></div>
            <div class="panel-body">
                {!! csrf_field() !!}
                @if (count($errors) > 0)
                    <div class="alert alert-danger text-left">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" id="username"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <label for="NatId">Password</label>
                            <input type="password" name="password" id="password" placeholder="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>

            </div>
        </div>

    </form>
    </div>
@endsection