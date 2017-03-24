@extends('layouts/app')

@section('content')

    <h1>{{$user->name}}</h1>

    <ul style="list-style-type: none;">
        <img src="{{$user->photo->path}}" class="img-rounded" height=170 alt="">
        <li><i class="fa fa-envelope-o fa-fw"></i> {{$user->email}}</li>
    </ul>

    <a href="{{route('staff.index')}}"><i class="fa fa-hand-o-left fa-2x" aria-hidden="true"></i></a>






@endsection