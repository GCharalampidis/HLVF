@extends('layouts/admin')

@section('content')

    <h1>Edit Unit</h1>

    {!! Form::model($unit, ['method'=>'PATCH', 'action'=> ['UnitController@update', $unit->id]]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('semester', 'Semester:') !!}
        {!! Form::select('semester', array('Summer' => 'Summer', 'Spring' => 'Spring'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('year', 'Year:') !!}
        {!! Form::text('year', null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Update Unit', ['class'=>'btn btn-primary']) !!}

    {!! Form::close()!!}

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

@endsection