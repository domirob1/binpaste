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

Route::get('/', function()
{
	return View::make('index');
});


Route::get('/signup', array('before' => 'guest', function()
{
  return View::make('signup');
}));


Route::post('/signup', array('before' => 'csrf', function()
{
  $user = new User;
  $user->email = Input::get('email');
  $user->password = Hash::make(Input::get('password'));

  # Try to add the user 
  try {
    $user->save();
  }
  # Fail
  catch (Exception $e) {
    return Redirect::to('/signup')->with('flash_message',
                                        'Sign up failed; please try again.')
                                 ->withInput();
  }

  # Log the user in
  Auth::login($user);

  return Redirect::to('/')->with('flash_message', 'Welcome to Binpaste!');
}));


Route::get('/login', array('before' => 'guest', function()
{
  return View::make('login');
}));


Route::post('/login', array('before' => 'csrf', function()
{
  $credentials = Input::only('email', 'password');

  if (Auth::attempt($credentials, $remember=True)) {
    return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
  }
  else {
    return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
  }

  return Redirect::to('/login');
}));
