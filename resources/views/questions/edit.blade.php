@extends('layouts/app')

@section('content')

    <h1>Edit Post</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['PostController@update', $post->id]]) !!}

        <!--http://stackoverflow.com/a/37006767-->
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{csrf_field()}}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::text('content', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}

    {!! Form::close() !!}

@endsection