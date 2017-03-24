@extends('layouts/app')

@section('content')

    <ul>
        @foreach($posts as $post)
            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a> | {{$post->content}}</li>
        @endforeach
    </ul>

    <a href="{{route('posts.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>

@endsection