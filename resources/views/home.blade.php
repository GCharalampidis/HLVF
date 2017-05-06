@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div id="sites">
                    <input type="radio" name="site" id="so" value="stackoverflow" /><label for="so"><img src="https://cdn3.iconfinder.com/data/icons/communication-1/100/smiley_happy-512.png" height=50px alt="Stack Overflow" /></label>
                    <input type="radio" name="site" id="sf" value="serverfault" /><label for="sf"><img src="https://cdn3.iconfinder.com/data/icons/communication-1/100/smiley_happy-512.png" height=50px  alt="Server Fault" /></label>
                    <input type="radio" name="site" id="su" value="superuser" /><label for="su"><img src="https://cdn3.iconfinder.com/data/icons/communication-1/100/smiley_happy-512.png" height=50px  alt="Super User" /></label>
                </div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
