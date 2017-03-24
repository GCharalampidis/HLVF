@extends('layouts/admin')

@section('content')

    <div class="container">
        <br/>
        <div class="row">

            <div class="col-md-5 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Create User</div>
                        <div class="panel-body">

                            {!! Form::open(['method'=>'POST', 'action'=>'UserController@store', 'files'=>true]) !!}

                                <div class="form-group">
                                    {!! Form::label('name', 'Name:') !!}
                                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', 'Email:') !!}
                                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('password', 'Password:') !!}
                                    {!! Form::password('password', ['class'=>'form-control']) !!}
                                </div>

                                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

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

