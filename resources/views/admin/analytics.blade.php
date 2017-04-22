@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Analytics</h1>
    <h2>Your Units</h2>

        @foreach($units as $unit)
            <br/><br/>
            <strong>{{$unit->name}}:</strong>

            <br/>
            @foreach($unit->lectures as $lecture)
                Lecture #{{$lecture->id}} Average: {{$lecture->average}}
                {{--@foreach($lecture->questions as $question)--}}
                    {{--{{$question->average}}--}}
                {{--@endforeach--}}
                <br/>
            @endforeach


        @endforeach


@stop

