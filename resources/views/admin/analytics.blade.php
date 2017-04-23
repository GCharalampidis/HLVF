@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Analytics</h1>

    <div id="myfirstchart" style="height: 250px; width: 600px;"></div>

    <h2>Your Units</h2>

        @foreach($units as $unit)
            <div id="unit">
            <h3><b>{{$unit->name}}:</b></h3>

            @foreach($unit->lectures as $lecture)
                <b><u data-id="{{$lecture->name}}">{{$lecture->name}}</u></b>
                <b>Answers:</b> {{$lecture->answers}} @if($lecture->unit->studentnumber > 0)({{round($lecture->answers/$lecture->unit->studentnumber*100, 2)}}%)@endif
                <b>Average:</b> <span data-id="{{$lecture->average}}">{{$lecture->average}}</span>
                {{--@foreach($lecture->questions as $question)--}}
                    {{--{{$question->average}}--}}
                {{--@endforeach--}}
                <br/>
            @endforeach

            </div>
        @endforeach


@stop

