@extends('student/master')
@section('Title','Create A New Subject')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div id="results"></div>
        <form role="form" action="{{ url('admin/subjects') }}" method="post" name="form">
            {!! csrf_field() !!}

            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4>New Subject</h4></div>
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
                            <div class="col-md-5 col-md-offset-1">
                                <label for="NatId">Subject Code</label>
                                <input class="form-control" type="text" name="subject_code">
                            </div>
                            <div class="col-md-5">
                                <label for="NatId">Category</label>
                                <select class="form-control" name="subject_category">
                                        <option value="1">Arts</option>
                                        <option value="2">Commercials</option>
                                        <option value="3">Sciences</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <label for="NatId">Subject Name</label>
                                <input type="text" name="subject_name" id="password" placeholder="password" class="form-control">
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