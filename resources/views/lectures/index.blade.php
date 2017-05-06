@extends('layouts/admin')

@section('content')


                        <h1 class="page-header">Lectures of {{$unit->name}}</h1>
                        @if(Session::has('deleted_lecture'))
                            <div class="alert alert-success">{{session('deleted_lecture')}}</div>
                        @endif
                        @if(Session::has('created_lecture'))
                            <div class="alert alert-success">{{session('created_lecture')}}</div>
                        @endif
                        @if(Session::has('created_lectures'))
                            <div class="alert alert-success">{{session('created_lectures')}}</div>
                        @endif
                        @if(Session::has('edited_lecture'))
                            <div class="alert alert-success">{{session('edited_lecture')}}</div>
                        @endif
                        @if(sizeof($unit->lectures) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Questions</th>
                                    <th>Students Answered*</th>
                                    <th>Average</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--{{$questions = $unit->questions }}--}}

                                <?php $count = 1; ?>
                                @foreach($unit->lectures as $lecture)

                                    <tr>
                                        {{--<td><a href="{{route('staff.show', $user->id)}}">{{$user->name}}</a></td>--}}
                                        <td><a href="{{route('lectures.show', $lecture->id)}}">{{$lecture->name}} @if($unit->activeLecture()->id === $lecture->id) (Active) <i class="fa fa-check" aria-hidden="true"></i> @endif</a></td>
                                        <td>{{$lecture->date->diffForHumans()}} ({{$lecture->date->format('d-m-y H:i')}})</td>
                                        <td>{{$lecture->questionsCount()}}</td>
                                        <td>{{$lecture->answers}} @if($lecture->unit->studentnumber > 0)({{$lecture->studentPercentage()}}%)@endif</td>
                                        <td><p style="color:
                                            @if($lecture->average < 50)red
                                            @elseif($lecture->average < 75)#3498db;
                                            @else lawngreen
                                            @endif;">{{$lecture->average}}</p></td>
                                        <td>{{$lecture->created_at->diffForHumans()}}</td>
                                        <td>{{$lecture->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('lectures.edit', $lecture->id)}}" aria-label="Edit" data-placement='top' data-toggle='tooltip' title='Edit Lecture'>
                                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{route('lectures.delete', $lecture->id)}}" onclick="return confirm('Are you sure?')" aria-label="Delete" data-placement='top' data-toggle='tooltip' title='Delete Lecture'>
                                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                            </a>
                                        </td>


                                            {{--<td>--}}
                                                {{--<a class="btn btn-primary" href="{{route('staff.edit', $user->id)}}" aria-label="Edit">--}}
                                                    {{--<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>--}}
                                                {{--</a>--}}
                                                {{--<a class="btn btn-danger" href="{{route('staff.delete', $user->id)}}" aria-label="Delete">--}}
                                                    {{--<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>--}}
                                                {{--</a>--}}
                                            {{--</td>--}}

                                    </tr>
                                    <?php $count += 1; ?>
                                @endforeach
                                </tbody>
                            </table>

                        @else
                            There are no lectures for this unit yet!
                        @endif
                        <div style="padding-top: 10px">
                            <a class='btn btn-primary' href="{{url('admin/units/'.$unit->id)}}">Back</a>
                            <a class='btn btn-success' href="{{url('/unit/'.$unit->id.'/lectures/create')}}">Create</a>
                            <a class='btn btn-success' href="{{url('/unit/'.$unit->id.'/lectures/masscreate')}}" data-placement='top' data-toggle='tooltip' title="If this unit's sessions take place once a week at the same day, create more than one lecture sessions for this unit.">Mass Create</a>
                            @if($unit->lecturesCount() > 0) <a class='btn btn-warning' href="{{url('#')}}" data-placement='top' data-toggle='tooltip' title="Set the same questions for this unit's already existing lecture sessions." onclick="return confirm('Are you sure you want to overwrite all the questions?')">Mass Set Questions</a> @endif
                        </div>
                        {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                            {{--<a href="{{route('staff.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>--}}
                        {{--@endif--}}

@endsection