@extends('layouts/admin')
@section('content')

    <h1>Create Unit</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'UnitController@store', 'files'=>true]) !!}

    {{--{{csrf_field()}}--}}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}

    </div>


    <div class="form-group">
        {!! Form::label('semester', 'Semester:') !!}
        {!! Form::select('semester', array('Autumn' => 'Autumn', 'Spring' => 'Spring', 'Summer' => 'Summer'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('year', 'Year:') !!}
        {!! Form::number('year', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('studentnumber', 'Students:') !!}
        {!! Form::number('studentnumber', null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::hidden('user_id', Illuminate\Support\Facades\Auth::id()) !!}

    {!! Form::hidden('key', str_random(5)) !!}

    {!! Form::submit('Create Unit', ['class'=>'btn btn-primary']) !!}

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

