@extends('student/master')
@section('Title','Subjects')
@section('content')
    <div class="row">
        <div class="col-sm-6 text-left">
          <a href="{{ url('admin/subjects/create') }}"><div class="btn btn-primary">New Subject</div></a>
        </div>

        <div class="col-sm-6 text-right">
            <form class="form-inline">
                <label for="search">Search Subjects</label>

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
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->subject_code }}</td>
                    <td>{{ $subject->subject_category }}</td>
                    <td>{{ $subject->subject_name }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>HCS-102</td>
                    <td>Sciences</td>
                    <td>Introduction To Computer Architecture</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection