@extends('layouts/admin')

@section('content')

    <h1>Create Question for {{$unit->name}}</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'QuestionController@store']) !!}

            {{--{{csrf_field()}}--}}

        <div class="form-group">
            {!! Form::label('text', 'Text:') !!}
            {!! Form::text('text', null, ['class'=>'form-control']) !!}

        </div>


        <div class="form-group">
            {!! Form::label('answer_type', 'Type:') !!}
            {!! Form::select('answer_type', array(1 => 'Smiley Faces', 2 => 'Smiley slider', 3 => 'Free text'), 1, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('active', 'Status:') !!}
            {!! Form::select('active', array(0 => 'Not Active', 1 => 'Active'), 1, ['class'=>'form-control']) !!}
        </div>

        {!!  Form::hidden('unit_id', $unit->id) !!}

        {!! Form::submit('Create Question', ['class'=>'btn btn-primary']) !!}
        
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

