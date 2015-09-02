@extends('student/master')
@section('Title','Create A New Program')
@section('content')
    <div class="col-md-7 col-md-offset-3">
        <div id="results"></div>
        <form role="form" action="{{ url('admin/programs') }}" method="post" name="form">
            {!! csrf_field() !!}

            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4>New Program</h4></div>
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
                            <div class="col-md-3 col-md-offset-1">
                                <label for="NatId">Program Code</label>
                                <input class="form-control" type="text" name="program_code">
                            </div>
                            <div class="col-md-4">
                                <label for="program_category">Category</label>
                                <select class="form-control" name="program_category">
                                        <option value="1">Arts</option>
                                        <option value="2">Commercials</option>
                                        <option value="3">Sciences</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="program_min_points">Min Points</label>
                                <select class="form-control" name="program_min_points">
                                    @for($i=0; $i < 15 ;$i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <label for="NatId">Program Name</label>
                                <input type="text" name="program_name" id="password" placeholder="Program Name" class="form-control">
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