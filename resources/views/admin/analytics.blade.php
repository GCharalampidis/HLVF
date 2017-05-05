@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Analytics</h1>
    @if(sizeof($units)>0)
        <div style="text-align: center">
            {{--Lectures - Average --}}
            <h3><strong>Every unit's lectures and their average marks.</strong></h3>
            <center>
                <div id="myChartSelector" style="height: 250px; width: 1000px;"></div><br/>
                    <button class="btn btn-primary" id="bunit0">None</button>
                    @foreach($units as $unit)
                        @if($unit->lecturesCount()>0)
                            <button class="btn btn-primary" id="bunit{{$unit->id}}">{{$unit->name}}</button>
                        @endif
                    @endforeach

                <br/><hr>
            {{--Lectures - % of Students --}}
            <h3><strong>How many of the students answered a unit's lectures.</strong></h3>
                <div id="myPercentChartSelector" style="height: 250px; width: 1000px;"></div><br/>
                <button class="btn btn-primary" id="perbunit0">None</button>
                @foreach($units as $unit)
                    @if($unit->lecturesCount()>0)
                    <button class="btn btn-primary" id="perbunit{{$unit->id}}">{{$unit->name}}</button>
                    @endif
                @endforeach

            </center>
            <i>In order to ensure the anonymity of the students, anyone who has the unit's key can answer a lecture's question more than once.
                Therefore the "Student's Answered Percentage" statistic is not always accurate.</i>
        </div>
        {{--<h2>Your Units</h2>--}}

        {{--@foreach($units as $unit)--}}
            {{--<div id="unit">--}}
            {{--<h3><b>{{$unit->name}}:</b></h3>--}}
            {{--@if($unit->lecturesCount()>0)--}}
                {{--@foreach($unit->lectures as $lecture)--}}
                    {{--<b><u data-id="{{$lecture->name}}">{{$lecture->name}}</u></b>--}}
                    {{--<b>Answers:</b> {{$lecture->answers}} @if($lecture->unit->studentnumber > 0)({{round($lecture->answers/$lecture->unit->studentnumber*100, 2)}}%)@endif--}}
                    {{--<b>Average:</b> <span data-id="{{$lecture->average}}">{{$lecture->average}}</span>--}}
                    {{--@foreach($lecture->questions as $question)--}}
                        {{--{{$question->average}}--}}
                    {{--@endforeach--}}
                    {{--<br/>--}}
                {{--@endforeach--}}
            {{--@else--}}
                {{--No lectures.--}}
            {{--@endif--}}


            {{--</div>--}}
        {{--@endforeach--}}
    @else
        You currently have no units.
        @endif


    <script>

        var Line0 =
        {
            // ID of the element in which to draw the chart.
            element: 'myChartSelector',
            parseTime: false,
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{lecture: 'No Lecture', mark: 0}],
            // The name of the data record attribute that contains x-values.
            xkey: 'lecture',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['mark'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Mark']
        };
        //These are the chart options, created by php
            @foreach($units as $unit)
                var Line{{$unit->id}} =
                {
                    // ID of the element in which to draw the chart.
                    element: 'myChartSelector',
                    parseTime: false,
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: [
                        @foreach($unit->lectures as $index=>$lecture)
                            @if($index == sizeof($unit->lectures)-1)
                                {lecture: '{{$lecture->name}}', mark: {{$lecture->average}}}
                            @else
                                {lecture: '{{$lecture->name}}', mark: {{$lecture->average}}},
                            @endif
                        @endforeach
                    ],
                    // The name of the data record attribute that contains x-values.
                    xkey: 'lecture',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['mark'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Mark']
                };
            @endforeach


        var initMorrisLogic = () => {

            // The element where the carts will be appended
            let chartElement = $('#myChartSelector');

            // The morris.js chart object, we need this to destroy it.
            let chartInstance;

            // A function that creates a chart instance and clears the previous if it exists
            let createChart = (chartOptions) => {
                if(chartInstance) {
                    chartElement.empty();
                }
                chartInstance = new Morris.Line(chartOptions);
            };

            createChart(Line0);

            // All the UI elements that toggle charts.
            let button0 = $('#bunit0');
            button0.on('click', () => {
                createChart(Line0);
            });
            @foreach($units as $unit)
                let button{{$unit->id}} = $('#bunit{{$unit->id}}');

                    // Click listeners that toggle the charts.
                    button{{$unit->id}}.on('click', () => {
                        createChart(Line{{$unit->id}});
                    });
            @endforeach






        };

        // Event listener to load script on window load.
        window.addEventListener('load', initMorrisLogic);
    </script>

    <script>

        var PercentLine0 =
        {
            element: 'myPercentChartSelector',
            parseTime: false,
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{lecture: '0', percentage: 0}],
            // The name of the data record attribute that contains x-values.
            xkey: 'lecture',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['percentage'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['% of Students']
        };
        //These are the chart options, created by php
                @foreach($units as $unit)
        var PercentLine{{$unit->id}} =
                {
                    // ID of the element in which to draw the chart.
                    element: 'myPercentChartSelector',
                    parseTime: false,
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: [
                            @foreach($unit->lectures as $index=>$lecture)
                                @if($index == sizeof($unit->lectures)-1)
                                    {lecture: '{{$lecture->name}}', percentage: {{$lecture->studentPercentage()}}}
                                @else
                                    {lecture: '{{$lecture->name}}', percentage: {{$lecture->studentPercentage()}}},
                                @endif
                            @endforeach
                    ],
                    // The name of the data record attribute that contains x-values.
                    xkey: 'lecture',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['percentage'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['% of Students']
                };
                @endforeach


        var initMorrisLogic = () => {

                    // The element where the carts will be appended
                    let chartElement = $('#myPercentChartSelector');

                    // The morris.js chart object, we need this to destroy it.
                    let chartInstance;

                    // A function that creates a chart instance and clears the previous if it exists
                    let createChart = (chartOptions) => {
                        if(chartInstance) {
                            chartElement.empty();
                        }
                        chartInstance = new Morris.Line(chartOptions);
                    };

                    createChart(PercentLine0);

                    // All the UI elements that toggle charts.
                    let perbutton0 = $('#perbunit0');
                    perbutton0.on('click', () => {
                        createChart(PercentLine0);
                    });
                    @foreach($units as $unit)
                    let perbutton{{$unit->id}} = $('#perbunit{{$unit->id}}');

                    // Click listeners that toggle the charts.
                    perbutton{{$unit->id}}.on('click', () => {
                        createChart(PercentLine{{$unit->id}});
                    });
                    @endforeach






                };

        // Event listener to load script on window load.
        window.addEventListener('load', initMorrisLogic);
    </script>
@stop

