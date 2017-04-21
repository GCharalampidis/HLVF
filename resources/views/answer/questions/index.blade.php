@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Questions for {{$lecture->unit->name}}</div>
                    <div class="panel-body">
                        @if($lecture->questionsCount() > 0)
                            <?php $activequestions = $lecture->questionsCount(); $i = 1; ?>

                            {!! Form::open(['method'=>'POST', 'action'=>'AnswerController@store']) !!}

                                <input type="hidden" id="currentqcounter" value=1>

                                    <ul>
                                        @foreach($lecture->questions as $question)
                                            @if($question->active == 1)
                                                <div id="question_{{$i}}" @if ($i == 1) style="display: block;" @else style="display: none;" @endif>
                                                    Question {{$i}} of {{$activequestions}} <br/><br/>
                                                    {!! Form::label('content', $question->text) !!}
                                                    {{--Smiley question--}}
                                                    @if($question->question_type == 1)

                                                        <br/><label for="content"><i class="fa fa-smile-o fa-3x"></i> </label>
                                                        {!! Form::radio('content[]', ':)', true) !!}&nbsp;&nbsp;
                                                        <label for="content"><i class="fa fa-meh-o fa-3x"></i> </label>
                                                        {!! Form::radio('content[]', ':|') !!}&nbsp;&nbsp;
                                                        <label for="content"><i class="fa fa-frown-o fa-3x"></i></label>
                                                        {!! Form::radio('content[]', ':(') !!}<br/>
                                                    {{--Slider question--}}
                                                    @elseif($question->question_type == 2)

                                                        <input id="slider" name="content[]" type="range" min="0" max="100"  onchange="printValue('slider','textbox')" />
                                                        <input id="textbox" type="text" size="5"/>
                                                        <br/><br/>
                                                    {{--Free Text question--}}
                                                    @elseif($question->question_type == 3)

                                                        {!! Form::text('content[]', null, ['class'=>'form-control']) !!}

                                                    @endif

                                                    @if($i == $activequestions)
                                                        <br/>
                                                        {!! Form::hidden('id', $lecture->id) !!}
                                                        {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
                                                        {!! Form::close()!!}
                                                    @else

                                                        <button type="button" onclick="changeQuestion()">Next</button>
                                                    @endif
                                                </div>
                                                <?php $i++; ?>
                                            @endif
                                        @endforeach

                                    </ul>




                        @else
                            There are no questions for this lecture.
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printValue(sliderID, textbox) {
            var x = document.getElementById(textbox);
            var y = document.getElementById(sliderID);
            x.value = y.value;
        }

        window.onload = function() { printValue('slider', 'textbox'); }
    </script>

    <script>
        function changeQuestion()
        {
            var i = parseInt(document.getElementById('currentqcounter').value);
            var next  = i + 1;
            var x = document.getElementById('question_' + next);
            document.getElementById('question_' + i).style.display = 'none';
            x.style.display = 'block';
            document.getElementById('currentqcounter').value = i + 1;
        }
    </script>
@endsection