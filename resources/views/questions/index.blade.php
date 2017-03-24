@extends('layouts/admin')

@section('content')
    <h1>Questions for {{$unit->name}}</h1>
    <ul>
        @foreach($unit->questions as $question)
                {{--<li><a href="{{route('questions.show', $question->id)}}">{{$question->text}}</a></li>--}}
                <li>{{$question->text}} | Answer type: {{$question->answer_type}} | Status: {{$question->active}}</li>
        @endforeach
    </ul>
    <a href="{{url('/unit/'.$unit->id.'/questions/create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>



@endsection