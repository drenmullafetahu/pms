<?php

namespace App\Helpers;


defined('CC') or DIE('no direct access');

use Request;
use File;
use Carbon\Carbon;

class Utils
{

  public static function objectToArray($object){
    $object = json_decode(json_encode($object),TRUE);
    return $object;
  }

  public static function testing(){
    echo Request::get('pid');
  }

  public static function pid(){
    $pid = Request::get('pid');
    $pid = ($pid) ? $pid : Request::get('parent_id');
    return (isset($pid)) ? $pid : 0;
  }

  public static function parentType($default = null){
    $default = (is_null($default)) ? 'menu' : $default;
    return (Request::get('parent_type')) ? Request::get('parent_type') : $default;
  }

  public static function upload($file, $destination, $format = 'dmyHis'){
    if(isset($file)){
      if(!File::isDirectory($destination))
        File::makeDirectory($destination, 0777);

        $extension = $file->getClientOriginalExtension();
        $fileName = str_slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),'_');
        $fileName = (!is_null($format)) ? Carbon::now()->format($format).'_'.$fileName.'.'.$extension :
        $fileName.'.'.$extension;
        $file->move($destination, $fileName);
        return $fileName;
    }
    return '';
  }


  public static function dateToMysql($date){
    return Carbon::createFromFormat('d.m.Y', $date)->toDateString();

  }
  public static function datetimeToMysql($date){
    return Carbon::createFromFormat('d.m.Y H:i:s', $date)->toDateTimeString();
  }

  public static function controllerToUrlName($controller){
    $controller = str_replace('Controller','',$controller);
    return strtolower($controller);
  }

  public static function isImage($file){
    return (file_exists($file) && is_readable($file)) ? true : false;
  }
  
  public static function uploadedImage($filename, $path){
    $localPath = paths()->local_upload_images();
    $httpPath = paths()->http_upload_images();
    if(self::isImage($localPath.$path.'/'.$filename)){
      $image = $httpPath.$path.'/'.$filename;
    }else{
      $image = $httpPath.'main/'.$filename;
    }
    return $image;
  }

}