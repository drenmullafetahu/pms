<?php

namespace App\Helpers;

defined('CC') or DIE('no direct access');

class Normalize
{

  public static function className($string){
    $string = ucwords(preg_replace("/[^A-Za-z0-9]/"," ", $string));
    $string = preg_replace("/[^A-Za-z0-9-_]/","", $string);
    return $string;
  }

  public static function route($route, $separator='_'){
    $route = strtolower(preg_replace("/[^A-Za-z0-9]/"," ", $route));
    $route = preg_replace("/[^A-Za-z0-9-_]/",$separator, $route);
    return $route;

  }

}