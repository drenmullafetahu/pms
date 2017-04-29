<?php
/**
 * Date: 7/6/2016
 * Time: 4:26 PM
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Module\Cms\Models\Siteconfig\User;

defined('CC') or DIE('no direct access');


class Roles
{
  
  private static $_roles = array();
  private static $_user;

  public function __construct(){
    self::$_user = Auth::user();
  }

  public static function set(){

    if(empty(self::$_roles) && self::$_user){
      $roles = User::find(Auth::user()['id'])->roles;
      foreach($roles as $k=>$v){
        self::$_roles[$v['title']] = $v['id'];
      }
    }
  }

  public static function get($role = null){
    return (!is_null($role) && isset(self::$_roles[$role])) ? self::$_roles[$role] : self::$_roles;
  }
  public static function getRole($role){
      return (isset(self::$_roles[$role])) ? self::$_roles[$role] : '';
  }

  
}