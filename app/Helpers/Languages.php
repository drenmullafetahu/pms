<?php

namespace App\Helpers;

defined('CC') or DIE('no direct access');

class Languages
{

  private static $_languageCode = '';
  private static $_languageID = '';

  public static function all(array $key = null, $fields = null){
    if(!is_null($key)){
      $fields = (is_null($fields)) ? ['id','title','code'] : $fields;
      return \Models\Languages::where($key[0], $key[1])->get($fields)->first()->toArray();
    }else{
      if(!is_null($fields))
       return \Models\Languages::get($fields)->toArray();
      else
       return \Models\Languages::all()->toArray();
    }
  }

  public static function exists($code, $type=null){
    $type = (is_null($type)) ? 'code' : $type;
    $languages = array_flatten(self::all(null, [$type]));
    return (in_array($code,$languages)) ? true : false;
  }

  public static function getIDByCode($code){

    $code = strtolower($code);

    self::$_languageCode = defaultLanguage(appModule());

    if(self::$_languageCode==$code && self::$_languageID)
      return self::$_languageID;

    self::$_languageCode = $code;

    self::$_languageID = \Models\Languages::where("code",$code)->first()->toArray()['id'];

    return self::$_languageID;

  }
  
  public static function langNav($segments){
    $results = self::all();
    $activeLang = $segments[0];
    unset($segments[0]);
    $segments = implode('/',array_values($segments));
    $nav = '<ul>';
    $counti = count($results);
    $loop = 1;
    foreach($results as $result){
      if(isset($segments[0]))
      $activeClass = ($result['code']==$activeLang) ? ' class="active" ' : '';
      $lastClass = ($loop==$counti) ? ' class="last" ' : '';
      $nav .= '<li '.$lastClass.'><a href="'.url($result['code'].'/'.$segments).'" '.$activeClass.'>'.$result['title'].'</a></li>';
      $loop++;
    }
    $nav .= '</ul>';
    return $nav;
  }

}