<?php

class UserController extends BaseController {
  
  public function getIndex() 
  {
    return View::make('login');
  }
  
  public function postIndex()
  {
    $userinfo = ['username'=>Input::get('username'),
                     'password'=>Input::get('password')
                     ];
    if(Auth::attempt($userinfo)) {
      return Redirect::to('admin');
    } else {
      return Redirect::to('login')->with('login_errors', true);
    }
  }
}
  