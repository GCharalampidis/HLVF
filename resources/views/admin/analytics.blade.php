@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Analytics</h1>
    <h2>Your Units</h2>

        @foreach($units as $unit)
            <br/><br/>
            <strong>{{$unit->name}}:</strong>

            <br/>
            @foreach($unit->questions as $question)
                @foreach($question->answers as $answer)
                    {{$answer->toValue()}}
                @endforeach
            @endforeach
            <br/><strong>Average: </strong>
        {{$unit->avgScores()}}
        @endforeach


@stop

