@extends('layouts/admin')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    <h1>Create Question for {{$lecture->name}}</h1>

                    {!! Form::open(['method'=>'POST', 'action'=>'QuestionController@store']) !!}

                        <div class="form-group">
                            {!! Form::label('text', 'Question:') !!}
                            {!! Form::text('text', null, ['class'=>'form-control']) !!}

                        </div>


                        <div class="form-group">

                            {!! Form::label('question_type', 'Type:') !!}
                            @if($lecture->hasSliderQuestion())
                                {!! Form::select('question_type', array(1 => 'Smiley Faces'), 1, ['class'=>'form-control']) !!}
                                <i>(Smiley slider option is disabled because you already have one active question which uses it).</i><br/>
                            @else
                                {!! Form::select('question_type', array(1 => 'Smiley Faces', 2 => 'Smiley Slider'), 1, ['class'=>'form-control']) !!}
                            @endif
                            <br/>
                            <center>
                                Preview:<br/>
                            <div style="border-radius: 25px; border: 2px solid black; background-color: #ffffff; width: 80%; display: block; text-align: center;" id="q1">

                                <h3>Your Question</h3>
                                <fieldset id="test">
                                    <div id="sites">
                                        <label for="1" class="selected" style="padding: 10px; border-radius: 25px;"><img src="{{asset('images/smileys/happy.png')}}" height="100" alt="happy"></label>
                                        {!! Form::radio('site', 'happy', true, array('id' => 1, 'class'=> 'input_hidden')) !!}&nbsp;&nbsp;

                                        <label for="2" style="padding: 10px; border-radius: 25px;"><img src="{{asset('images/smileys/indifferent.png')}}" height="100" alt="indifferent"></label>
                                        {!! Form::radio('site', 'indifferent', false, array('id' => 2, 'class'=> 'input_hidden')) !!}&nbsp;&nbsp;

                                        <label for="3" style="padding: 10px; border-radius: 25px;"><img src="{{asset('images/smileys/anxious.png')}}" height="100" alt="anxious"></label>
                                        {!! Form::radio('site', 'anxious', false, array('id' => 3, 'class'=> 'input_hidden')) !!}&nbsp;&nbsp;

                                        <label for="4" style="padding: 10px; border-radius: 25px;"><img src="{{asset('images/smileys/bored.png')}}" height="100" alt="bored"></label>
                                        {!! Form::radio('site', 'bored', false, array('id' => 4, 'class'=> 'input_hidden')) !!}&nbsp;&nbsp;

                                        <label for="5" style="padding: 10px; border-radius: 25px;"><img src="{{asset('images/smileys/sad.png')}}" height="100" alt="sad"></label>
                                        {!! Form::radio('site', 'sad', false, array('id' => 5, 'class'=> 'input_hidden')) !!}&nbsp;&nbsp;

                                        <label for="6" style="padding: 10px; border-radius: 25px;"><img src="{{asset('images/smileys/angry.png')}}" height="100" alt="angry"></label>
                                        {!! Form::radio('site', 'angry', false, array('id' => 6, 'class'=> 'input_hidden')) !!}&nbsp;&nbsp;
                                        <br/>
                                    </div>
                                </fieldset>

                            </div>
                            </center>
                            <div style="border-radius: 25px; border: 2px solid black; background-color: #ffffff; display: none; text-align: center;" id="q2">
                                <h3>Your Question</h3>
                                <div id="face">
                                    <div id="mouth-box" style="left: 21px;">
                                        <div id="mouth" class="straight"></div>
                                    </div>
                                </div>
                                <div style="width: 20em; left: 120px;" id="slider"></div>
                                <input type="hidden" id="slidervalue" name="test" value=-1 />
                                <br/>
                            </div>

                        </div>


                        <div class="form-group">
                            {!! Form::label('active', 'Status:') !!}
                            {!! Form::select('active', array(0 => 'Not Active', 1 => 'Active'), 1, ['class'=>'form-control']) !!}
                        </div>

                        {!!  Form::hidden('lecture_id', $lecture->id) !!}

                        <a class='btn btn-primary' href="{{route('questions.testindex', $lecture->id)}}">Back</a>
                        {!! Form::submit('Save Question', ['class'=>'btn btn-success']) !!}

                    {!! Form::close()!!}

                    {{--Error Display--}}
                    @if(count($errors) > 0)
                    <br/>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
