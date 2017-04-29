<?php

namespace App\Helpers;

defined('CC') or DIE('no direct access');

use Request;

class Paths
{


  public static function httpResources($path = ''){
   return Request::root().'/resources'.$path;
  }

  public static function http_root($path = null){
    if(!is_null($path))
      return Request::root().$path;

    return Request::root();
  }
  public static function http_path($path = ''){
    return Request::root().$path;
  }

  public static function http_uploads($path = '/'){
    return self::http_root('/uploads'.$path);
  }
  public static function http_upload_images(){
    return self::http_uploads('/images/');
  }
  public static function http_upload_documents(){
    return self::http_uploads('documents/');
  }
  public static function local_upload_path($path = '/'){
    return base_path().'/uploads'.$path;
  }
  public static function local_upload_images(){
    return base_path().'/uploads/images/';
  }
  
  
  
  
}