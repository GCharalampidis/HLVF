@extends('layouts/admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    <h1>Edit Unit</h1>

                    {!! Form::model($unit, ['method'=>'PATCH', 'action'=> ['UnitController@update', $unit->id]]) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('semester', 'Semester:') !!}
                            {!! Form::select('semester', array('Autumn' => 'Autumn', 'Spring' => 'Spring', 'Summer' => 'Summer'), null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('year', 'Year:') !!}
                            {!! Form::number('year', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('studentnumber', 'Students:') !!}
                            {!! Form::number('studentnumber', null, ['class'=>'form-control']) !!}
                        </div>

                        <a class='btn btn-primary' href='{{route('admin.units.show', $unit->id)}}'>Back</a>
                        {!! Form::submit('Update Unit', ['class'=>'btn btn-info']) !!}


                    {!! Form::close()!!}

                    {{--Error Display--}}
                    @if(count($errors) > 0)

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