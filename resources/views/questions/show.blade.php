@extends('layouts/app')

@section('content')

    <h1>Show Post</h1>
    {{--@if(strlen($post->path->path) > 8)--}}

    {{--<img src="{{$post->path->path}}" height=100 alt="">--}}
    {{--@endif--}}

    <ul>
        <li>{{$post->title}}</li>
        <li>{{$post->content}}</li>
    </ul>
    <a href="{{route('posts.index')}}"><i class="fa fa-hand-o-left fa-2x" aria-hidden="true"></i></a>
    <a href="{{route('posts.edit', $post->id)}}"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>

    {!! Form::open(['method'=>'DELETE', 'action'=> ['PostController@destroy', $post->id]]) !!}

        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

    {!! Form::close() !!}




@endsection