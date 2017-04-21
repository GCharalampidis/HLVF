@extends('layouts/admin')

@section('content')


                        <h1 class="page-header">Lectures of {{$unit->name}}</h1>
                        @if(sizeof($unit->lectures) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Questions</th>
                                    <th>Students Answered</th>
                                    <th>Average</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    {{--<th>Actions</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                {{--{{$questions = $unit->questions }}--}}

                                <?php $count = 1; ?>
                                @foreach($unit->lectures as $lecture)

                                    <tr>
                                        {{--<td><a href="{{route('staff.show', $user->id)}}">{{$user->name}}</a></td>--}}
                                        <td><a href="{{route('lectures.show', $lecture->id)}}">Lecture #{{$count}} @if($unit->activeLecture()->id === $lecture->id) <i class="fa fa-check" aria-hidden="true"></i> @endif</a></td>
                                        <td>{{$lecture->date->diffForHumans()}} ({{$lecture->date->format('d-m-y H:i')}})</td>
                                        <td>{{$lecture->questionsCount()}}</td>
                                        <td>{{$lecture->answers}}</td>
                                        <td>{{$lecture->average}}</td>
                                        <td>{{$lecture->created_at->diffForHumans()}}</td>
                                        <td>{{$lecture->updated_at->diffForHumans()}}</td>


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
                            <a class='btn btn-success' href="{{url('/unit/'.$unit->id.'/lectures/create')}}">Create</a>
                            <a class='btn btn-success' href="{{url('/unit/'.$unit->id.'/lectures/masscreate')}}">Mass Create</a>

                        </div>
                        {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                            {{--<a href="{{route('staff.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>--}}
                        {{--@endif--}}























@endsection