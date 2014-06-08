<?php

class User extends Eloquent {
  
  public function posts()
  {
    return $this->has_many('Post');
  }
  
  public function setPasswordAttribute($password) {
    $this->attributes['password']=Hash::make($password);
  }
  
}