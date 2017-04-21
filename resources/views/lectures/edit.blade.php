@extends('layouts/app')

@section('content')

    <h1>Edit Lecture</h1>

    {!! Form::model($lecture, ['method'=>'PATCH', 'action'=> ['LectureController@update', $lecture->id]]) !!}

        <div class="form-group">
            {!! Form::label('date', 'Date:') !!}
            {!! Form::date('date', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('time', 'Time:') !!}
            {!! Form::time('time', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Update Lecture', ['class'=>'btn btn-info']) !!}

    {!! Form::close() !!}

@endsection