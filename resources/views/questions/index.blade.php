@extends('layouts/admin')

@section('content')


                        <h1 class="page-header">Questions for Lecture #{{$lecture->id}}</h1>
                        @if(sizeof($lecture->questions) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    {{--<th>Actions</th>--}}

                                </tr>
                                </thead>
                                <tbody>
                                {{--{{$questions = $unit->questions }}--}}

                                @foreach($lecture->questions as $question)

                                    <tr>
                                        {{--<td><a href="{{route('staff.show', $user->id)}}">{{$user->name}}</a></td>--}}
                                        <td>{{$question->text}}</td>
                                        <td>{{$question->question_type}}</td>
                                        <td>{{$question->active === 1 ? "Active" : "Not Active" }}</td>

                                            {{--<td>--}}
                                                {{--<a class="btn btn-primary" href="{{route('staff.edit', $user->id)}}" aria-label="Edit">--}}
                                                    {{--<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>--}}
                                                {{--</a>--}}
                                                {{--<a class="btn btn-danger" href="{{route('staff.delete', $user->id)}}" aria-label="Delete">--}}
                                                    {{--<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>--}}
                                                {{--</a>--}}
                                            {{--</td>--}}

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else

                            There are no questions for this lecture yet!
                        @endif
                        <br/><br/><a href="{{url('/lecture/'.$lecture->id.'/questions/create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
                        {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                            {{--<a href="{{route('staff.create')}}"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>--}}
                        {{--@endif--}}























@endsection