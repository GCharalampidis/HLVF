@extends('layouts/admin')

@section('content')

    <h1>Create Lecture for {{$unit->name}}</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'LectureController@store']) !!}

            {{--{{csrf_field()}}--}}

        <div class="form-group">
            {!! Form::label('date', 'Date:') !!}
            {!! Form::date('date', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('time', 'Time:') !!}
            {!! Form::time('time', null, ['class'=>'form-control']) !!}
        </div>

        {!!  Form::hidden('unit_id', $unit->id) !!}

        {!! Form::submit('Create Lecture', ['class'=>'btn btn-success']) !!}
    <a class='btn btn-primary' href="{{URL::previous()}}">Back</a>
        
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

