@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="page-header">{{$user->name}}</h1>
                        <div class="list-group">
                            <div class="col-sm-4">
                                <img src="{{$user->photo->path}}" class="img-rounded center-block" height=200 width="200" alt="">
                            </div>
                            <div class="col-sm-8" style="padding-bottom: 10px">
                                @if(!trim($user->email) == '')
                                    <li class="list-group-item"><i class="fa fa-envelope-o fa-lg"></i>&nbsp;  {{$user->email}}</li>
                                @endif
                                @if(!trim($user->hnumber) == '')
                                    <li class="list-group-item"><i class="fa fa-phone fa-lg"></i>&nbsp;  {{$user->hnumber}}</li>
                                @endif
                                @if(!trim($user->mnumber) == '')
                                    <li class="list-group-item"><i class="fa fa fa-mobile fa-2x"></i>&nbsp;  {{$user->mnumber}}</li>
                                @endif
                                @if(!trim($user->skype) == '')
                                    <li class="list-group-item"><i class="fa fa fa-skype fa-lg"></i>&nbsp;   {{$user->skype}}</li>
                                @endif

                            </div>


                                <a class='btn btn-info' href="{{route('staff.index')}}">Back</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection