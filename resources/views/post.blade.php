@extends('layouts/app')

@section('content')

    <h1>Post Page {{ $post->id }}</h1>

    <ul>
        <li>By: {{ $post->user_id }}</li>
        <li>Title: {{ $post->title }}</li>
        <li>Content: {{ $post->content }}</li>
    </ul>


@stop

@section('footer')


@stop