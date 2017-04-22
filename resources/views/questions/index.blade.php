@extends('layouts/admin')

@section('content')

    <h1 class="page-header">Questions</h1>
    @if($lecture->questionsCount() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{--{{$questions = $unit->questions }}--}}

                @foreach($lecture->questions as $question)

                    <tr>
                        {{--<td><a href="{{route('staff.show', $user->id)}}">{{$user->name}}</a></td>--}}
                        <td>{{$question->text}}</td>
                        <td>@if($question->question_type == 1) Smiley Faces
                            @elseif($question->question_type == 2) Smiley Slider
                            @elseif($question->question_type == 3) Free Text
                            @else Unknown Type
                            @endif
                        </td>
                        <td>{{$question->active === 1 ? "Active" : "Not Active" }}</td>

                            <td>
                                {{--<a class="btn btn-primary" href="{{route('questions.edit', $question->id)}}" aria-label="Edit">--}}
                                    {{--<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>--}}
                                {{--</a>--}}
                                <a class="btn btn-danger" href="{{route('questions.delete', $question->id)}}" aria-label="Delete">
                                    <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                </a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        There are no questions for this lecture yet!
    @endif

    {{--when i remove this, scrolling bar appears idk why VVVVVV--}}
    {{--<div style="padding-top: 10px; padding-bottom: 10px;">--}}
        {{--<a class='btn btn-success' href="{{url('/lecture/'.$lecture->id.'/questions/create')}}">Create</a>--}}
    {{--</div>--}}

    <div style="display: flex;">
        <ul id="left" style="width: 250px; height: 350px; background-color: #f0f8d1; margin: 5px;  border-radius: 25px;
    border: 2px solid #000000; margin-right: 1em; list-style-type: none;">
            Active:
            @foreach($lecture->questions as $question)
                @if($question->active == 1)
                    <li data-id="{{$question->id}}" style="background-color: #eaf7ed; margin: 5px;  border-radius: 25px;
    border: 2px solid #73AD21; box-shadow: 3px 5px 5px #888888;"><p style="margin: 5px">{{$question->text}}</p></li>
                @endif
            @endforeach
        </ul>
        <ul id="right" style="width: 250px; height: 350px; background-color: #f0f8d1; margin: 5px;  border-radius: 25px;
    border: 2px solid #000000; margin-right: 1em; list-style-type: none;">
            Inactive:
            @foreach($lecture->questions as $question)
                @if($question->active == 0)
                    <li data-id="{{$question->id}}" style="background-color: #eaf7ed; margin: 5px; border-radius: 25px;
    border: 2px solid #73AD21; box-shadow: 3px 5px 5px #888888;"><p style="margin: 5px">{{$question->text}}</p></li>
                @endif
            @endforeach
        </ul>
    </div>
    <button type="button" class="btn btn-primary" onclick="saveQuestions()">Save</button>
    <a class='btn btn-success' href="{{url('/lecture/'.$lecture->id.'/questions/create')}}">Create</a>

    <script>

        function saveQuestions()
        {
            var x = $('#left').find('li');
            var y = $('#right').find('li');
            var active = [];
            var inactive = [];
            $.each(x, function( index, value ) {
                active.push( $(value).data("id") );
            });

            $.each(y, function( index, value ) {
                inactive.push( $(value).data("id") );
            });

            console.log('Active ids: ' + active);
            console.log('Inactive ids: ' + inactive);
        }

    </script>

@endsection