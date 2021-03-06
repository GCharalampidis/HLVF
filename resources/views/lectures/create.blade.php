@extends('layouts/admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    <h1>Create Lecture Session for {{$unit->name}}</h1>

                    {!! Form::open(['method'=>'POST', 'action'=>'LectureController@store']) !!}

                            {{--{{csrf_field()}}--}}

                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('date', 'Date:') !!}
                            {!! Form::date('date', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time', 'Time:') !!}
                            {!! Form::time('time', null, ['class'=>'form-control']) !!}
                        </div>

                        {!!  Form::hidden('unit_id', $unit->id) !!}
                        {!!  Form::hidden('average', -1) !!}

                        <a class='btn btn-primary' href="{{route('lectures.testindex', $unit->id)}}">Back</a>
                        {!! Form::submit('Save Lecture', ['class'=>'btn btn-success']) !!}


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

