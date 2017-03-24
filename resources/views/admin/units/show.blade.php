@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$unit->name}}</div>

                    <div class="panel-body">
                        <ul>
                            <li>{{$unit->semester}} {{$unit->year}}</li>
                            <li>Key: {{$unit->key}}</li>
                            <br/>

                        {!! Form::open(['method'=>'DELETE', 'action'=> ['UnitController@destroy', $unit->id]]) !!}

                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}

                            <a href="{{url('/unit/'.$unit->id.'/questions')}}">Manage Questions</a>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>









@endsection