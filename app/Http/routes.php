<?php

use App\Post;
use App\User;
use App\Unit;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Main page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/enterkey', function ()
{
   return view('answer/index');
});

Route::post('/a1d24fg41A', 'UnitController@checkKey');

Route::group(['middlewareGroups'=>'web','auth.basic'], function()
{



    Route::resource('/admin/analytics', 'AnalyticsController');

    Route::get('admin/units/{user}/delete', ['as' => 'admin.units.delete', 'uses' => 'UnitController@destroy']);
    Route::resource('/admin/units', 'UnitController');

    Route::get('staff/{user}/delete', ['as' => 'staff.delete', 'uses' => 'UserController@destroy']);
    Route::resource('/staff', 'UserController');

    Route::resource('/answerquestions', 'AnswerController');

//    Route::get('/createquestion', 'QuestionController@create');

    Route::get('/unit/{id}/lectures', ['as' => 'lectures.testindex', 'uses' => 'LectureController@testIndex']);
    Route::get('/unit/{id}/lectures/create', ['as' => 'lectures.testcreate', 'uses' => 'LectureController@testCreate']);
    Route::get('/unit/{id}/lectures/masscreate', ['as' => 'lectures.testmasscreate', 'uses' => 'LectureController@testMassCreate']);
    Route::post('/unit/lectures/massstore', ['as' => 'lectures.massstore', 'uses' => 'LectureController@massStore']);
    Route::get('/lecture/{id}/delete', ['as' => 'lectures.delete', 'uses' => 'LectureController@destroy']);
    Route::resource('/lectures', 'LectureController');

    Route::get('/lecture/{id}/questions', ['as' => 'questions.testindex', 'uses' => 'QuestionController@testIndex']);
    Route::get('/lecture/{id}/questions/create', ['as' => 'questions.testcreate', 'uses' => 'QuestionController@testCreate']);
    Route::get('/lecture/{id}/questions/delete', ['as' => 'questions.delete', 'uses' => 'QuestionController@destroy']);
    Route::resource('/questions', 'QuestionController');





});

Route::get('/answer/{key}', 'StudentQuestionsController@testIndex');
//watafa Route::get('/answer/{id}/create', ['as' => 'answers.testindex', 'uses' => 'QuestionController@testIndex']);
//Route::resource('/answer', 'StudentQuestionsController');


Route::get('thankyou', function()
{
    return view('answer.thankyou');
});

//
//Route::get('/unit/{id}/questions', function($id)
//{
//    $unit = Unit::find($id);
//
//    foreach ($unit->questions as $question)
//    {
//        echo $question->text."<br>";
//    }
//});


Route::auth();

Route::get('/home', 'HomeController@index');

/*Route::get('admin/user/roles', ['middleware'=>'role', function()
{
    return "Middleware role";
}]);*/

Route::get('/admin', 'AdminController@index');

//Send email
Route::get('/sendemail', function()
{
    $data = [

        'title' => 'Verification mail',
        'content' => 'Please verify your account'
    ];

    Mail::send('emails.test', $data, function($message)
    {

        $message->to('xaralampodis@gmail.com', 'George')->subject('[HLVF] Please verify your account');

    });
});

//Pass data from URI
//Route::get('/post/{id}/{dogname}', function ($id,$dogname)
//{
//    return "this is post number " . $id . "! The dog's name is " . $dogname . "!";
//});

//Route::get('/post/{id}/{name}', 'PostController@show_post');

//Route::get('/user/{id}/units', function($id)
//{
//    $user = User::find($id);
//
//    foreach ($user->units as $unit)
//    {
//        echo $unit->name."<br>";
//    }
//});


