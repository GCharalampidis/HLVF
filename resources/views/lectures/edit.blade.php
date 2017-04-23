@extends('layouts/admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    <h1>Edit Lecture</h1>

                    {!! Form::model($lecture, ['method'=>'PATCH', 'action'=> ['LectureController@update', $lecture->id]]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('date', 'Date:') !!}
                            {!! Form::date('date', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time', 'Time:') !!}
                            {!! Form::time('time', null, ['class'=>'form-control']) !!}
                        </div>

                        <a class='btn btn-primary' href={{URL::previous()}}'>Back</a>
                        {!! Form::submit('Update Lecture', ['class'=>'btn btn-info']) !!}

                    {!! Form::close() !!}


                    {{--Error Display--}}
                    @if(count($errors) > 0)

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

@endsection