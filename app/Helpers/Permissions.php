<?php
/**
 * Date: 7/6/2016
 * Time: 4:23 PM
 */

namespace App\Helpers;

use Module\Cms\Models\Siteconfig\Roles as RoleModel;

defined('CC') or DIE('no direct access');



class Permissions
{

  private static $_permissions = array();
  private static $_user;
  private static $_roles = array();
  private static $_replace = array('read'=>'edit','delete'=>'destroy');


  public function __construct(){
  }

  public static function roles($roles){
    self::$_roles = $roles;
  }

  public static function set($roles){
    if(self::isEmpty()){
      foreach($roles as $k=>$v){
        $rolesMod = RoleModel::find($v);
        $permissionResult = $rolesMod->permissions->toArray();
         foreach($permissionResult as $key=>$value){
          foreach($value['pivot'] as $pKey =>$pValue){
            $pKey = str_replace('p_','',$pKey);
            if(!isset(self::$_permissions[$value['name']][$pKey]) || self::$_permissions[$value['name']][$pKey]==0){
              self::$_permissions[$value['name']][$pKey] = $pValue;
            }
          }
        }
      }
    }
  }

  public static function get(){
    return self::$_permissions;
  }
  public static function isEmpty(){
    return (empty(self::$_permissions)) ? true : false;
  }

  public function has($permission){
    if(array_has(self::$_permissions,$permission)){
      if(array_get(self::$_permissions,$permission)==1)
        return 1;
    }


    return 0;
  }





}