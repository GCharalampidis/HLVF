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
        <div style="display: flex; text-align: center;">
        <ul id="left" style="min-width: 250px; min-height: 200px; max-width:300px; background: #32363b;
            background: -webkit-radial-gradient(circle, #64688c, #44496b, #323650);
            background: -o-radial-gradient(circle, #64688c, #44496b, #323650);
            background: -moz-radial-gradient(circle, #64688c, #44496b, #323650);
            background: radial-gradient(circle, #64688c, #44496b, #323650);
            margin: 5px;  border-radius: 25px; border: 3px solid #000000; margin-right: 1em; list-style-type: none; padding: 10px;">
            Active:
            @foreach($lecture->questions as $question)
                @if($question->active == 1)
                    <li data-id="{{$question->id}}" style="cursor: move; background-color: #44496b; margin: 5px; padding: 5px;  border-radius: 25px;
    border: 2px solid #000000; box-shadow: 3px 5px 5px #15172a;"><p style="margin: 5px">{{$question->text}}</p></li>
                @endif
            @endforeach
        </ul>
        <ul id="right" style="min-width: 250px; min-height: 200px; max-width:300px;
            background: #ff7384;
            background: -webkit-radial-gradient(circle, #d07f77, #974341, #972423);
            background: -o-radial-gradient(circle, #d07f77, #974341, #972423);
            background: -moz-radial-gradient(circle, #d07f77, #974341, #972423);
            background: radial-gradient(circle, #d07f77, #974341, #972423);
            margin: 5px;  border-radius: 25px; border: 3px solid #000000; margin-right: 1em; list-style-type: none; padding: 10px;">
            Inactive:
            @foreach($lecture->questions as $question)
                @if($question->active == 0)
                    <li data-id="{{$question->id}}" style="cursor: move; background-color: #974341; margin: 5px; padding: 5px; border-radius: 25px;
    border: 2px solid #000000; box-shadow: 3px 5px 5px #241010;"><p style="margin: 5px">{{$question->text}}</p></li>
                @endif
            @endforeach
        </ul>

        </div>
        <button type="button" class="btn btn-info" onclick="saveQuestions()">Save</button>
    @else
        There are no questions for this lecture yet!
    @endif
    <br/><br/><a class='btn btn-primary' href="{{route('lectures.show', $lecture->id)}}">Back</a>
    <a class='btn btn-success' href="{{url('/lecture/'.$lecture->id.'/questions/create')}}">Create</a>
    <br/><br/>


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