@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="padding-top: 20px">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="page-header">{{$unit->name}}</h1>
                        <div class="list-group">

                            <li class="list-group-item"><i class="fa fa fa-calendar fa-lg"></i>&nbsp {{$unit->semester}} {{$unit->year}}</li>
                            <li class="list-group-item"><i class="fa fa fa-users fa-lg"></i>&nbsp {{$unit->studentnumber}}</li>
                            <li class="list-group-item"><i class="fa fa-key fa-lg"></i>&nbsp; {{$unit->key}} <i data-placement='bottom' data-toggle='tooltip' title="Students with this key can answer this unit's questions." style="color: red;" class="fa fa-question-circle" aria-hidden="true"></i></li>
                            <div style="text-align: center; padding-top: 10px">
                                <a class='btn btn-primary' href="{{route('admin.units.index')}}">Back</a>
                                <a class='btn btn-success' href="{{route('lectures.testindex', $unit->id)}}">Lectures</a>
                                <a class="btn btn-warning" href="{{route('admin.units.edit', $unit->id)}}" >Edit</a>
                                <a class='btn btn-danger' href="{{route('admin.units.delete', $unit->id)}}" onclick="return confirm('Are you sure?')">Delete</a>
                            </div>

                        </div>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>









@endsection