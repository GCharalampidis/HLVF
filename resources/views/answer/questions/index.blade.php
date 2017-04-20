@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Questions for Lecture #{{$lecture->id}}</div>
                    <div class="panel-body">
                        @if($lecture->questions)
                            {!! Form::open(['method'=>'POST', 'action'=>'AnswerController@store']) !!}
                                <div style="padding-bottom: 10px">
                                    <ul>
                                        @foreach($lecture->questions as $question)
                                            @if($question->active == 1)
                                                {!! Form::label('content', $question->text) !!}
                                                @if($question->question_type == 1)
                                                    <br/><label for="content"><i class="fa fa-smile-o fa-3x"></i> </label>
                                                    {!! Form::radio('content[]', ':)') !!}&nbsp;&nbsp;
                                                    <label for="content"><i class="fa fa-meh-o fa-3x"></i> </label>
                                                    {!! Form::radio('content[]', ':|') !!}&nbsp;&nbsp;
                                                    <label for="content"><i class="fa fa-frown-o fa-3x"></i></label>
                                                    {!! Form::radio('content[]', ':(') !!}<br/>

                                                @elseif($question->question_type == 2)

                                                    <input id="slider" name="content[]" type="range" min="0" max="100"  onchange="printValue('slider','textbox')" />
                                                    <input id="textbox" type="text" size="5"/>

                                                    <br/>
                                                @elseif($question->question_type == 3)
                                                    {!! Form::text('content[]', null, ['class'=>'form-control']) !!}
                                                @endif
                                                {!!  Form::hidden('id', $lecture->id) !!}
                                            @endif
                                            <br/><br/>
                                        @endforeach
                                    </ul>
                                </div>
                            {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}

                            {!! Form::close()!!}
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
@endsection