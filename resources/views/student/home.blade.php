@extends('student/master')
@section('Title', 'Student Results')
@section('content')
    <div class="col-md-6 col-md-offset-3">
    <form role="form" action="{{ url('results') }}" method="post">
        {!! csrf_field() !!}
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Student Results</h4></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-1">
                            <label for="NatId">Subject</label>
                            <select class="form-control sp" name="subject1">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->subject_category }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="NatId">Points</label>
                            <select class="form-control" name="subject1_points">
                                @for($i = 0; $i < 8 ; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-1">
                            <label for="NatId">Subject</label>
                            <select class="form-control sp" name="subject2">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->subject_category }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="NatId">Points</label>
                            <select class="form-control" name="subject2_points">
                                @for($i = 0; $i < 8 ; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-1">
                            <label for="NatId">Subject</label>
                            <select class="form-control sp" name="subject3">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->subject_category }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="NatId">Points</label>
                            <select class="form-control" name="subject3_points">
                                @for($i = 0; $i < 8 ; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="form-group text-center">
            <input type="submit" style="width: 300px" value="Submit" class="btn btn-success">
        </div>
    </form>
    </div>
@endsection