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
	//return View::make('hello');
  $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate('5');
  return View::make('home')->with('posts', $posts);
});

Route::get('/alt', function()
{
	//return View::make('hello');
  $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate('5');
  return View::make('althome')->with('posts', $posts);
});

Route::get('/raw', function() {
  return User::all();
});


//When a user has logged in we visit they are taken to creating new post
Route::get('admin', array('before'=>'auth','do'=>function() {
  $user = Auth::user();
  return View::make('new')->with('user', $user);
}));


Route::delete('post/(:num)', array('before'=>'auth', 'do'=>function($id){
  $delete_post = Post::with('user')->find($id);
  $delete_post->delete();
  return Redirect::to('/')
    ->with('success_message', true);
}));


//When a new post is submitted it is handled here
Route::post('admin', array('before'=>'auth','do'=>function(){
  $new_post = array(
    'post_title'=>Input::get('post_title'),
    'post_body'=>Input::get('post_body'),
    'post_author'=>Input::get('post_author')
  );  
  
  $validation = Validator::make($new_post, $rules);
  if($validation->fails()) {
    return Redirect::to('admin')
      ->with('user', Auth::user())
      ->with_errors($validation)
      ->with_input();
  }
  //create new post after passing validation
  $post = new Post($new_post);
  $post->save();
  //redirect to view all posts
  return Redirect::to('/');
}));

//Present the login form
Route::get('login', function(){
  return View::make('login');
});

//Process the login request
Route::post('login', function(){
  $userinfo = array('username'=>Input::get('username'),
                   'password'=>Input::get('password')
                   );
  if(Auth::attempt($userinfo)) {
    return Redirect::to('admin');
  } else {
    return Redirect::to('login')->with('login_errors', true);
  }
});

//Process logout request
Route::get('logout',function(){
  Auth::logout();
  return Redirect::to('/');
});