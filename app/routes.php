<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function()
{
    //Competitor
    Route::resource('/competitor', 'CompetitorController');
});

//Teszt
Route::controller('/test', 'TestController');




Route::get('/', 'HomeController@showWelcome');   

/*Route::get('/', function() {
    $albums = Country::all();
    
    foreach ($albums as $album) {
        echo $album->country;
    }
   
});*/

Route::get('/user', function()
{
    return View::make('admin/create_user_form');
});

Route::post('/user', function() 
{
    $user = new User;
    $user->username = Input::get('username');
    $user->password = Hash::make(Input::get('password'));
    $user->email = Input::get('email');
    $user->save();
    
    return Response::make('User created!');
});

Route::get('/admin', array(
    'before' => 'auth', 
    function() 
    {
        return View::make('admin/admin');
    }
));

Route::get('/login', function() 
{
    return View::make('admin/login_form');
});

Route::post('/login', function()
{
    $credentials = Input::only('username', 'password');
    $remember = Input::has('remember');
    if (Auth::attempt($credentials, $remember)) {
        return Redirect::intended('/');
    }
    return Redirect::to('/login');
});

Route::get('/logout', function()
{
    Auth::logout();
    return Response::make('You are now logged out');
});





