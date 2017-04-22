@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{$lecture->name}}</b> ({{$lecture->date->diffForHumans()}}) of <b>{{$lecture->unit->name}}</b> <i>by <a target="_blank" href="{{route('staff.show', $lecture->unit->user->id )}}">{{$lecture->unit->user->name}}</a></i>.</div>
                    <div class="panel-body">
                        @if($lecture->questionsCount() > 0)

                            <?php $activequestions = $lecture->questionsCount(); $i = 1; ?>

                            {!! Form::open(['method'=>'POST', 'action'=>'AnswerController@store']) !!}
                            <input type="hidden" id="currentqcounter" value=1>

                                @foreach($lecture->questions as $question)
                                        @if($question->active == 1)
                                            <div id="question_{{$i}}" @if ($i == 1) style="display: block;" @else style="display: none;" @endif>
                                                <h4 class="page-header"><i>Question {{$i}} of {{$activequestions}}</i></h4>
                                                <center>
                                                <h3>{{$question->text}}</h3>
                                                @if($question->question_type == 1)

                                                    <label for="content"><i class="fa fa-smile-o fa-3x"></i> </label>
                                                    {!! Form::radio('content[]', ':)', true) !!}&nbsp;&nbsp;
                                                    <label for="content"><i class="fa fa-meh-o fa-3x"></i> </label>
                                                    {!! Form::radio('content[]', ':|') !!}&nbsp;&nbsp;
                                                    <label for="content"><i class="fa fa-frown-o fa-3x"></i></label>
                                                    {!! Form::radio('content[]', ':(') !!}<br/>

                                                @elseif($question->question_type == 2)

                                                    <div id="face">
                                                        <div id="mouth-box">
                                                            <div id="mouth" class="straight"></div>
                                                        </div>
                                                    </div>
                                                    <div style="width: 20em;" id="slider"></div>
                                                    <input type="hidden" id="slidervalue" name="content[]" value=-1 />

                                                @elseif($question->question_type == 3)

                                                    {!! Form::text('content[]', null, ['class'=>'form-control']) !!}
                                                @endif
                                                @if($i == $activequestions)
                                                    <br/>
                                                    @if($i != 1)
                                                        <button type="button" class="btn btn-primary" onclick="previousQuestion()">Back</button>
                                                    @endif
                                                    {!! Form::hidden('id', $lecture->id) !!}
                                                    {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
                                                    {!! Form::close()!!}
                                                @else
                                                    <br/>
                                                    @if($i != 1)
                                                        <button type="button" class="btn btn-primary" onclick="previousQuestion()">Back</button>
                                                    @endif
                                                    <button type="button" class="btn btn-primary" onclick="nextQuestion()">Next</button>
                                                @endif
                                            </center>
                                        </div>
                                        <?php $i++; ?>
                                    @endif


                            @endforeach
                        @else
                            There are no questions for this lecture.
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<script>--}}
        {{--function printValue(sliderID, textbox) {--}}
            {{--var x = document.getElementById(textbox);--}}
            {{--var y = document.getElementById(sliderID);--}}
            {{--x.value = y.value;--}}
        {{--}--}}

        {{--window.onload = function() { printValue('slider', 'textbox'); }--}}
    {{--</script>--}}

    <script>
        function nextQuestion()
        {
            var i = parseInt(document.getElementById('currentqcounter').value);
            var next  = i + 1;
            var x = document.getElementById('question_' + next);
            document.getElementById('question_' + i).style.display = 'none';
            x.style.display = 'block';
            document.getElementById('currentqcounter').value = next;

            var svalue = $( "#slider" ).slider( "option", "value" );
            $('#slidervalue').val(svalue);

        }
    </script>
    <script>
        function previousQuestion()
        {
            var i = parseInt(document.getElementById('currentqcounter').value);
            var prev  = i - 1;
            var x = document.getElementById('question_' + prev);
            document.getElementById('question_' + i).style.display = 'none';
            x.style.display = 'block';
            document.getElementById('currentqcounter').value = prev;
        }
    </script>
@endsection