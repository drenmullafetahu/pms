<?php

namespace Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
use DB;
class Users extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name','last_name','remember_token','email','username','password','password_changed','password_changed_date','password_reset_token','active'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];
  public function getAuthUsers($authenticated_user){
    $result = objectToArray(DB::select("select id, name , last_name, img_src From users where id <> $authenticated_user and id <> 1"));
    return $result ;
  }
  public function getUsers(){
    $result = objectToArray(DB::select("select id, name , last_name, img_src From users "));
    return $result;
  }
  public function checkUsername($username){
    $result = objectToArray(DB::select("select id from users where username='".$username."' order by id desc limit 0,1"));
    if(!empty($result)){
      return true;
    }
    return false;

  }


  public function setPasswordAttribute($password){
    $this->attributes['password'] = Hash::make($password);
  }
}
