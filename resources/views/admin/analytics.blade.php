@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Analytics</h1>
    <h2>Your Units</h2>

        @foreach($units as $unit)
            <h3><b>{{$unit->name}}:</b></h3>

            @foreach($unit->lectures as $lecture)
                <b><u>{{$lecture->name}}</u></b>
                <b>Answers:</b> {{$lecture->answers}} @if($lecture->unit->studentnumber > 0)({{round($lecture->answers/$lecture->unit->studentnumber*100, 2)}}%)@endif
                <b>Average:</b> {{$lecture->average}}
                {{--@foreach($lecture->questions as $question)--}}
                    {{--{{$question->average}}--}}
                {{--@endforeach--}}
                <br/>
            @endforeach


        @endforeach


@stop

