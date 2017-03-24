@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Questions for {{$unit->name}}</div>
                        <div class="panel-body">
                            {!! Form::open(['method'=>'POST', 'action'=>'AnswerController@store']) !!}

                                <ul>
                                    @foreach($unit->questions as $question)
                                        @if($question->active == 1)
                                            {!! Form::label('content', $question->text) !!}
                                            {{--{!! Form::radio('content', 'value') !!}--}}
                                            {!! Form::text('content[]', null, ['class'=>'form-control']) !!}
                                            {!!  Form::hidden('question_id[]', $question->id) !!}

                                        @endif
                                    @endforeach
                                </ul>

                                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

                            {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection