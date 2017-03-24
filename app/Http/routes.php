<?php

use App\Post;
use App\User;
use App\Unit;
use Illuminate\Support\Facades\Mail;

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

//Why do I have to have this for @checkKey to work??
Route::post('/asdf', 'UnitController@checkKey');

Route::group(['middlewareGroups'=>'web','auth.basic'], function()
{

    Route::resource('/posts', 'PostController');
    Route::resource('/staff', 'UserController');

    Route::get('/createquestion', 'QuestionController@create');

    Route::get('/unit/{id}/questions', 'QuestionController@testIndex');

    Route::get('/unit/{id}/questions/create', 'QuestionController@testCreate');

    Route::resource('/questions', 'QuestionController');

    Route::resource('/answers', 'AnswerController');


});

//Route::resource('/answer', 'StudentQuestionsController');
Route::get('/answer/{key}', 'StudentQuestionsController@testIndex');
Route::get('thankyou', function()
{
    return view('answer.thankyou');
});



//Insert row in a table
//Route::get('insert', function(){
//
//    $post = new Post;
//
//    $post->title = 'Test post';
//    $post->content = 'Test post';
//
//    $post->save();
//
//});

//Create row in a table
Route::get('post/create', function()
{

    Post::create(['title'=>'create test title', 'content'=>'create test content']);


});

//Update row in a table
Route::get('update', function(){

    $post = Post::find(3);

    $post->title = 'Test post2';
    $post->content = 'Test post2';

    $post->save();

});

//Update fast row in a table
Route::get('updatefast', function()
{

    Post::where('id', 4)->where('is_admin', 0)->update(['title'=>'update test title', 'content'=>'update test content']);

});

//Delete row(s)
Route::get('delete', function(){

    Post::destroy(3);
    //Post::destroy([4,5,6]);
    //Post::where('is_admin', 0)->delete();

});

//|--------------
//| ELOQUENT Relationships
//|--------------

//One to one
Route::get('/user/{id}/post', function($id)
{
    return User::find($id)->post->title;
});

//Inverse one to one
Route::get('/unit/{id}/user', function($id)
{
    echo Unit::find($id)->user->name;


});

//One to Many
Route::get('/user/{id}/posts', function($id)
{
    $user = User::find($id);

    foreach ($user->posts as $post)
    {
        echo $post->title."<br>";
    }
});


//Many to Many
Route::get('/user/{id}/roles', function($id)
{
    $user = User::find($id);

    foreach ($user->roles as $role)
    {
        echo $role->name . "<br>";
    }
});


Route::group(['middlewareGroups'=>'auth'], function()
{

    Route::resource('admin/units', 'UnitController');

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


