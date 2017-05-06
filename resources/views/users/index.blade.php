@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="page-header">Staff Members</h1>
                            @if(Session::has('deleted_user'))
                                <div class="alert alert-success">{{session('deleted_user')}}</div>
                            @endif
                            @if(Session::has('created_user'))
                                <div class="alert alert-success">{{session('created_user')}}</div>
                            @endif
                            @if(Session::has('edited_user'))
                                <div class="alert alert-success">{{session('edited_user')}}</div>
                            @endif
                            @if(sizeof($users) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Units</th>
                                            {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                                               {{--<th>Actions</th>--}}
                                            {{--@endif--}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td><img src="{{$user->photo->path}}" class="img-rounded" height="80" width="80" alt=""></td>
                                                <td><a href="{{route('staff.show', $user->id)}}">{{$user->name}}</a></td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @if(!trim($user->email) == '')
                                                        <i class="fa fa-envelope-o fa-lg"></i>
                                                    @endif
                                                    @if(!trim($user->hnumber) == '')
                                                        <i class="fa fa-phone fa-lg"></i>
                                                    @endif
                                                    @if(!trim($user->mnumber) == '')
                                                        <i class="fa fa fa-mobile fa-lg"></i>
                                                    @endif
                                                    @if(!trim($user->skype) == '')
                                                        <i class="fa fa fa-skype fa-lg"></i>
                                                    @endif

                                                </td>


                                                <td>{{$user->unitsCount()}}</td>

                                                {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                                                    {{--<td>--}}
                                                        {{--<a class="btn btn-primary" href="{{route('staff.edit', $user->id)}}" aria-label="Edit">--}}
                                                            {{--<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>--}}
                                                        {{--</a>--}}
                                                        {{--<a class="btn btn-danger" href="{{route('staff.delete', $user->id)}}" onclick="return confirm('Are you sure?')" aria-label="Delete">--}}
                                                            {{--<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>--}}
                                                        {{--</a>--}}
                                                    {{--</td>--}}
                                                {{--@endif--}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                There are no registered users yet!
                            @endif

                            {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                                {{--<a href="{{route('staff.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>--}}
                            {{--@endif--}}


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection