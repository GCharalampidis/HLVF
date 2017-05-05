@extends('layouts/admin')

@section('content')

    <h1 class="page-header">Questions</h1>
    @if(Session::has('deleted_question'))
        <div class="alert alert-success">{{session('deleted_question')}}</div>
    @endif
    @if(Session::has('created_question'))
        <div class="alert alert-success">{{session('created_question')}}</div>
    @endif
    @if(Session::has('edited_question'))
        <div class="alert alert-success">{{session('edited_question')}}</div>
    @endif
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
                                <a class="btn btn-primary" href="{{route('questions.edit', $question->id)}}" aria-label="Edit">
                                    <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('questions.delete', $question->id)}}" aria-label="Delete">
                                    <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                </a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{--DRAGULA--}}
        <div style="display: flex; text-align: center; justify-content: center;">

            <ul id="left" style="min-width: 250px; min-height: 200px; max-width:300px; background: #9f99ff;
                background: -webkit-radial-gradient(circle, #fff9fc, #d9d6ff, #a7abff);
                background: -o-radial-gradient(circle, #fff9fc, #d9d6ff, #a7abff);
                background: -moz-radial-gradient(circle, #fff9fc, #d9d6ff, #a7abff);
                background: radial-gradient(circle, #fff9fc, #d9d6ff, #a7abff);
                margin: 5px;  border-radius: 25px; border: 3px solid #000000; margin-right: 1em; list-style-type: none; padding: 10px;">
                Active:
                @foreach($lecture->questions as $question)
                    @if($question->active == 1)
                        <li data-id="{{$question->id}}" style="cursor: move; background-color: #fbf9ff; margin: 5px; padding: 5px;  border-radius: 25px;
        border: 2px solid #000000; box-shadow: 3px 5px 5px #5c5a5a;"><p style="margin: 5px">{{$question->text}}</p></li>
                    @endif
                @endforeach
            </ul>

            <ul id="right" style="min-width: 250px; min-height: 200px; max-width:300px;
                background: #ff909a;
                background: -webkit-radial-gradient(circle, #fff9fc, #fbc2c5, #ffa3a0);
                background: -o-radial-gradient(circle, #fff9fc, #fbc2c5, #ffa3a0);
                background: -moz-radial-gradient(circle, #fff9fc, #fbc2c5, #ffa3a0);
                background: radial-gradient(circle, #fff9fc, #fbc2c5, #ffa3a0);
                margin: 5px;  border-radius: 25px; border: 3px solid #000000; margin-right: 1em; list-style-type: none; padding: 10px;">
                Inactive:
                @foreach($lecture->questions as $question)
                    @if($question->active == 0)
                        <li data-id="{{$question->id}}" style="cursor: move; background-color: #fbf9ff; margin: 5px; padding: 5px; border-radius: 25px;
        border: 2px solid #000000; box-shadow: 3px 5px 5px #5c5a5a;"><p style="margin: 5px">{{$question->text}}</p></li>
                    @endif
                @endforeach
            </ul>
        </div>



    @else
        There are no questions for this lecture yet!
    @endif

    <div style="text-align: center">
        <br/><br/><a class='btn btn-primary' href="{{route('lectures.show', $lecture->id)}}">Back</a>
        <button type="button" class="btn btn-info" onclick="saveQuestions()">Save</button>
        <a class='btn btn-success' href="{{url('/lecture/'.$lecture->id.'/questions/create')}}">Create</a>
    </div>
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