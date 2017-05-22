@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">

                        {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['UserController@update', $user->id], 'files'=>true ]) !!}

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

                            <div class="form-group">
                                {!! Form::label('hnumber', 'Home number:') !!}
                                {!! Form::tel('hnumber', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('mnumber', 'Mobile number:') !!}
                                {!! Form::tel('mnumber', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('skype', 'Skype:') !!}
                                {!! Form::text('skype', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <img src="{{$user->photo->path}}" class="img-rounded" height=170 alt="" style="padding-bottom: 10px;">
                                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                            </div>


                            {!! Form::submit('Update Profile', ['class'=>'btn btn-success']) !!}
                            {!! Form::reset('Reset', ['class'=>'btn btn-warning']) !!}

                        {!! Form::close() !!}

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