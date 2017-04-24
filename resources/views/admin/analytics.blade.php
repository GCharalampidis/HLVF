@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Analytics</h1>

@if(sizeof($units)>0)
    <div id="myChartSelector" style="height: 250px; width: 700px;"></div>
    @foreach($units as $unit)
        <button class="btn btn-primary" id="bunit{{$unit->id}}">{{$unit->name}}</button>
    @endforeach

    <h2>Your Units</h2>

        @foreach($units as $unit)
            <div id="unit">
            <h3><b>{{$unit->name}}:</b></h3>
            @if($unit->lecturesCount()>0)
                @foreach($unit->lectures as $lecture)
                    <b><u data-id="{{$lecture->name}}">{{$lecture->name}}</u></b>
                    <b>Answers:</b> {{$lecture->answers}} @if($lecture->unit->studentnumber > 0)({{round($lecture->answers/$lecture->unit->studentnumber*100, 2)}}%)@endif
                    <b>Average:</b> <span data-id="{{$lecture->average}}">{{$lecture->average}}</span>
                    {{--@foreach($lecture->questions as $question)--}}
                        {{--{{$question->average}}--}}
                    {{--@endforeach--}}
                    <br/>
                @endforeach
            @else
                No lectures.
            @endif


            </div>
        @endforeach
    @else
        You currently have no units.
        @endif

    {{--<script>--}}

        {{--var x = $('#unit').find('u');--}}
        {{--var y= $('#unit').find('span');--}}

        {{--var lectures = [];--}}
        {{--var marks = [];--}}

        {{--$.each(x, function( index, value ) {--}}
            {{--lectures.push( $(value).data("id").toString() );--}}
        {{--});--}}

        {{--$.each(y, function( index, value ) {--}}
            {{--marks.push( $(value).data("id") );--}}
        {{--});--}}

        {{--console.log('Lectures: ' + lectures);--}}
        {{--console.log('Marks: ' + marks);--}}

        {{--new Morris.Line({--}}

            {{--// ID of the element in which to draw the chart.--}}
            {{--element: 'myfirstchart',--}}
            {{--parseTime: false,--}}
            {{--// Chart data records -- each entry in this array corresponds to a point on--}}
            {{--// the chart.--}}
            {{--data: [--}}
                {{--{year: lectures[1], value: marks[1]},--}}
                {{--{year: '2009', value: 10},--}}
                {{--{year: '2010', value: 5},--}}
                {{--{year: '2011', value: 5},--}}
                {{--{year: '2012', value: 20}--}}
            {{--],--}}
            {{--// The name of the data record attribute that contains x-values.--}}
            {{--xkey: 'year',--}}
            {{--// A list of names of data record attributes that contain y-values.--}}
            {{--ykeys: ['value'],--}}
            {{--// Labels for the ykeys -- will be displayed when you hover over the--}}
            {{--// chart.--}}
            {{--labels: ['Value']--}}
        {{--});--}}
    {{--</script>--}}


    <script>

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

            // All the UI elements that toggle charts.
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
@stop

