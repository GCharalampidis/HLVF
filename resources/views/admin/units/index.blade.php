@extends('layouts.admin')

@section('content')

    <h1 class="page-header">Your Units</h1>
    @if(Session::has('deleted_unit'))
        <div class="alert alert-success">{{session('deleted_unit')}}</div>
    @endif
    @if(Session::has('created_unit'))
        <div class="alert alert-success">{{session('created_unit')}}</div>
    @endif
    @if(Session::has('edited_unit'))
        <div class="alert alert-success">{{session('edited_unit')}}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Lectuter</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @if($units)
            @foreach($units as $unit)
                <tr>
                    <td>{{$unit->id}}</td>
                    <td><a href="{{route('admin.units.show', $unit->id)}}">{{$unit->name}}</a></td>
                    <td>{{$unit->semester}}</td>
                    <td>{{$unit->year}}</td>
                    <td>{{$unit->user->name}}</td>
                    <td>{{$unit->created_at->diffForHumans()}}</td>
                    <td>{{$unit->updated_at->diffForHumans()}}</td>
                    <td>
                        <div class="form-group">
                            <a href="{{route('admin.units.edit', $unit->id)}}" class="btn btn-primary btn-block">Edit</a>
                        </div>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['UnitController@destroy', $unit->id]]) !!}

                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
         @endif
        </tbody>
    </table>
    <a href="{{route('admin.units.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>



    {{--<a href="{{route('posts.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>--}}

@endsection