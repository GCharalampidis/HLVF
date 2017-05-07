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
                <th>Title</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Students</th>
                <th>Lectures</th>
                <th>Active Lecture</th>
                <th>Average</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @if($units)
            @foreach($units as $unit)
                <tr>
                    <td><a href="{{route('admin.units.show', $unit->id)}}">{{$unit->name}}</a></td>
                    <td>{{$unit->semester}}</td>
                    <td>{{$unit->year}}</td>
                    <td>{{$unit->studentnumber}}</td>
                    <td>{{$unit->lecturesCount()}}</td>
                    <td>@if($unit->lecturesCount() > 0){{$unit->activeLecture()->name}} @else No Active Lecture @endif</td>
                    <td>
                        @if($unit->average() == -1)
                            No Answers
                        @else
                            <p style="color:
                            @if($unit->average() < 50)red
                            @elseif($unit->average() < 75)#3498db;
                            @else lawngreen
                            @endif;">{{$unit->average()}}</p>
                        @endif
                    </td>
                    <td>{{$unit->created_at->diffForHumans()}}</td>
                    <td>{{$unit->updated_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.units.edit', $unit->id)}}" aria-label="Edit" data-placement='top' data-toggle='tooltip' title='Edit Unit'>
                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-danger" href="{{route('admin.units.delete', $unit->id)}}" onclick="return confirm('Are you sure?')" aria-label="Delete" data-placement='top' data-toggle='tooltip' title='Delete Unit'>
                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                        </a>
                    </td>
                    {{--<td>--}}
                        {{--<div class="form-group">--}}
                            {{--<a href="{{route('admin.units.edit', $unit->id)}}" class="btn btn-primary btn-block">Edit</a>--}}
                        {{--</div>--}}
                        {{--{!! Form::open(['method'=>'DELETE', 'action'=> ['UnitController@destroy', $unit->id]]) !!}--}}

                        {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}--}}

                        {{--{!! Form::close() !!}--}}

                    {{--</td>--}}
                </tr>
            @endforeach
         @endif
        </tbody>
    </table>
    <a class='btn btn-primary' href="{{url('admin/')}}">Back</a>
    <a class='btn btn-success' href="{{route('admin.units.create')}}">Create</a>




    {{--<a href="{{route('posts.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>--}}
    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection