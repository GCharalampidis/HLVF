@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="padding-top: 20px">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="page-header">Lecture at {{$lecture->date->format('l jS \\of F Y')}}</h1>
                        <div class="list-group">

                            <li class="list-group-item"><i class="fa fa fa-calendar fa-lg"></i>&nbsp {{$lecture->date}}</li>
                            <li class="list-group-item"><i class="fa fa fa-rss fa-lg"></i>&nbsp Average Mark: {{$lecture->average}}</li>
                            <div style="padding-top: 10px">
                                <a class='btn btn-primary' href="{{URL::previous()}}">Back</a>
                                <a class='btn btn-success' href="{{route('questions.testindex', $lecture->id)}}">Questions</a>
                                <a class="btn btn-warning" href="{{route('lectures.edit', $lecture->id)}}" >Edit</a>
                                <a class='btn btn-danger' href="{{route('lectures.delete', $lecture->id)}}">Delete</a>
                            </div>

                        </div>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>









@endsection