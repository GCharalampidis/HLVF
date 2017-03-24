@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Enter unit key</div>
                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'UnitController@checkKey']) !!}

                        <div class="form-group">
                            {!! Form::label('key', 'Key:') !!}
                            {!! Form::text('key', null, ['class'=>'form-control']) !!}

                        </div>

                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

                        {!! Form::close()!!}
                    </div>

                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
