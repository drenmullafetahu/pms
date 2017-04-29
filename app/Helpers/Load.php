<?php

namespace App\Helpers;


use Models\Languages;
use Request;
use Config;

class Load
{

  private static $_appLanguage = '';
  private static $_appModule = '';
  private static $_segment = 1;


  public static function setModule(){
    $requestedModule = Filter::apply(Request::segment(2),'url');
    if(in_array($requestedModule,defaultModules())){
      self::$_appModule = $requestedModule;
    }
  }
  
  public static function setAppLanguage(){
    if(isMultilingual()){
      $requestedLanguage = Filter::apply(Request::segment(1),'url');
      if($requestedLanguage){
        $language  = new Languages();
        $result = $language->where('code',$requestedLanguage)->get()->count();
        if($result>0){
          self::$_appLanguage = $requestedLanguage;
        }
      }
    }
  }

  public static function init(){
    self::setModule();
    self::setAppLanguage();
  }

  public static function getAppLanguage()
  {
     return self::$_appLanguage;
  }
  public static function getAppModule()
  {
    return self::$_appModule;
  }



  private static function currentSegment(){
    return Request::segment(self::$_segment);
  }


  private static function increaseSegmentIndex(){
    self::$_segment += 1;
  }

  
}