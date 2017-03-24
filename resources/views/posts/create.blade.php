@extends('layouts/app')

@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'PostController@store', 'files'=>true]) !!}

            {{--{{csrf_field()}}--}}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}

        </div>


        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::text('content', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::file('photo_id', null,  ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        
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

