@extends('layouts/admin')

@section('content')
    <div class="container">
        <div class="row" style="padding-top: 20px">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="page-header">Mass Create Lecture Sessions for {{$unit->name}}</h1>

                            {!! Form::open(['method'=>'POST', 'action'=>'LectureController@massStore']) !!}

                            {{--{{csrf_field()}}--}}

                            <div class="form-group">
                                {!! Form::label('starting_date', 'Starting Date:') !!}
                                {!! Form::date('starting_date', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('starting_time', 'Time:') !!}
                                {!! Form::time('starting_time', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('frequency', 'Repeat every:') !!}
                                {!! Form::select('frequency', array('1' => 'Week', '2' => '2 Weeks', '3' => '3 Weeks'), null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('lectures', 'Number of Lecture Sessions: (Max: 99)') !!}
                                {!! Form::number('lectures', null, ['class'=>'form-control']) !!}
                            </div>

                            {!!  Form::hidden('unit_id', $unit->id) !!}
                            {!!  Form::hidden('average', -1) !!}

                            {!! Form::submit('Create Lectures', ['class'=>'btn btn-success']) !!}

                            <a class='btn btn-primary' href="{{route('lectures.testindex', $unit->id)}}">Back</a>
                            {!! Form::close()!!}


                            {{--Error Display--}}
                            @if(count($errors) > 0)
                                <br/>
                                <div class="alert alert-danger">

                                    <ul>

                                        @foreach($errors->all() as $error)


                                            <li>{{$error}}</li>


                                        @endforeach
                                    </ul>

                                </div>

                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

