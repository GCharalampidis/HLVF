@extends('layouts/admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    <h1>Create Unit</h1>

                    {!! Form::open(['method'=>'POST', 'action'=>'UnitController@store', 'files'=>true]) !!}

                    {{--{{csrf_field()}}--}}

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

                    {!! Form::hidden('user_id', Illuminate\Support\Facades\Auth::id()) !!}

                    {!! Form::hidden('key', str_random(5)) !!}

                    <a class='btn btn-primary' href="{{route('admin.units.index')}}">Back</a>
                    {!! Form::submit('Create Unit', ['class'=>'btn btn-success']) !!}


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

