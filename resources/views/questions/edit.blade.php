@extends('layouts/admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    {!! Form::model($question, ['method'=>'PATCH', 'action'=> ['QuestionController@update', $question->id]]) !!}
                        <h1>Edit Question</h1>
                        <div class="form-group">
                            {!! Form::label('text', 'Text:') !!}
                            {!! Form::text('text', null, ['class'=>'form-control']) !!}

                        </div>


                        <div class="form-group">

                            {!! Form::label('question_type', 'Type:') !!}
                            @if($question->lecture->hasSliderQuestion())
                                {!! Form::select('question_type', array(1 => 'Smiley Faces'), null, ['class'=>'form-control']) !!}
                                <i>(Smiley slider option is disabled because you already have one active question which uses it).</i><br/>
                            @else
                                {!! Form::select('question_type', array(1 => 'Smiley Faces', 2 => 'Smiley slider'), null, ['class'=>'form-control']) !!}
                            @endif
                            <br/>

                            <div style="border-radius: 25px; border: 2px solid black; background-color: #ffffff; display: block; text-align: center;" id="q1">

                                <h3>Your Question</h3>
                                <label for="test"><i class="fa fa-smile-o fa-3x"></i> </label>
                                {!! Form::radio('test', 'test', true) !!}&nbsp;&nbsp;
                                <label for="test"><i class="fa fa-meh-o fa-3x"></i> </label>
                                {!! Form::radio('test', 'test') !!}&nbsp;&nbsp;
                                <label for="test"><i class="fa fa-frown-o fa-3x"></i></label>
                                {!! Form::radio('test', 'test') !!}<br/>

                            </div>
                            <div style="border-radius: 25px; border: 2px solid black; background-color: #ffffff; display: none; text-align: center;" id="q2">
                                <img src="{{asset('images/gif.gif')}}" alt="smiley slider preview">
                            </div>

                        </div>


                        <div class="form-group">
                            {!! Form::label('active', 'Status:') !!}
                            {!! Form::select('active', array(0 => 'Not Active', 1 => 'Active'), 1, ['class'=>'form-control']) !!}
                        </div>

                        {!!  Form::hidden('lecture_id', $question->lecture->id) !!}

                        <a class='btn btn-primary' href='{{route('questions.testindex', $question->lecture->id)}}'>Back</a>
                        {!! Form::submit('Update Question', ['class'=>'btn btn-success']) !!}

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