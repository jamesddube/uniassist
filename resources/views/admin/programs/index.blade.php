@extends('student/master')
@section('Title','Programs')
@section('content')
    <div class="row">
        <div class="col-sm-6 text-left">
          <a href="{{ url('admin/programs/create') }}"><div class="btn btn-primary">New Program</div></a>
        </div>

        <div class="col-sm-6 text-right">
            <form class="form-inline">
                <label for="search">Search Programs</label>

                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
            </form>
        </div>
    </div>
    <div id="results">

        <div class="row">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($programs as $program)
                <tr>
                    <td>{{ $program->program_code }}</td>
                    <td>{{ $program->program_category }}</td>
                    <td>{{ $program->program_name }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
