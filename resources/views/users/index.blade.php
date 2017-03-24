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
                                            <th>Id</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Units</th>
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                               <th>Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td><img src="{{$user->photo->path}}" class="img-rounded" height=70 alt=""></td>
                                                <td><a href="{{route('staff.show', $user->id)}}">{{$user->name}}</a></td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->unitsCount()}}</td>
                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                    <td>
                                                        <div class="form-group">
                                                            <a href="{{route('staff.edit', $user->id)}}" class="btn btn-primary btn-block">Edit</a>
                                                        </div>
                                                        {!! Form::open(['method'=>'DELETE', 'action'=> ['UserController@destroy', $user->id]]) !!}

                                                            {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

                                                        {!! Form::close() !!}

                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                There are no registered users yet!
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::check())
                                <a href="{{route('staff.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
                            @endif


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection