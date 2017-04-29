<?php

use App\Helpers\Lang;

if (! function_exists('app_load')) {
  /**
   * Check if app is multilingual, which is set in config/app.php
   */
  function app_load(){
    return new \App\Helpers\Load();
  }
}

if (! function_exists('isMultilingual')) {
  /**
   * Check if app is multilingual, which is set in config/app.php
   */
  function isMultilingual(){
    $multilingual = Config::get('app.multilingual');
    return (isset($multilingual) && $multilingual===true) ? true : false;
  }
}


if (! function_exists('languageID')) {
  /**
   * get language id by code (en, sq etc) if not set will retrun default
   */
  function languageID($code = null){
    $code = (is_null($code)) ? appLanguage() : $code;
    return  \App\Helpers\Languages::getIDByCode($code);
  }
}

if (! function_exists('appLanguage')) {
  /**
   */
  function appLanguage(){
    return \App\Helpers\Load::getAppLanguage();
  }
}

if (! function_exists('appModule')) {
  /**
   */
  function appModule(){
    return \App\Helpers\Load::getAppModule();
  }
}
if (! function_exists('defaultLanguage')) {
  /**
   *
   */
  function defaultLanguage(){
    return Config::get('app.locale');
  }
}

if (! function_exists('defaultModules')) {
  /**
   *
   */
  function defaultModules(){
    return Config::get('modules.modules');
  }
}

if (! function_exists('defaultTemplate')) {
  /**
   *
   */
  function defaultTemplate(){
    return Config::get('modules.default.module').'.templates.'.Config::get('modules.default.template');
  }
}

if (! function_exists('db')) {
  /**
   * return Database class
   */
  function db(){
    return new \App\Helpers\Database();
  }
}


if (! function_exists('objectToArray')) {
  /**
   * Convert Object to Array
   */
  function objectToArray($object){
    return \App\Helpers\Utils::objectToArray($object);
  }
}





// paths

if (! function_exists('paths')) {
  /**
   * http path to resources
   */
  function paths(){
    return new \App\Helpers\Paths();
  }
}

if (! function_exists('http_resources')) {
  /**
   * http path to resources
   */
  function http_resources($path = ''){
    return \App\Helpers\Paths::httpResources($path);
  }
}

if (! function_exists('http_root')) {
  /**
   *  if $path not given will return http://localhost, else will create http://localhost.$path
   */
  function http_root($path = null){
    return \App\Helpers\Paths::http_root($path);
  }
}
if (! function_exists('http_uploads')) {
  /**
   * http path to uploads
   */
  function http_uploads($path = ''){
    return \App\Helpers\Paths::http_uploads($path);
  }
}

if (! function_exists('local_upload_path')) {
  /**
   * http path to uploads
   */
  function local_upload_path($path = ''){
    return \App\Helpers\Paths::local_upload_path($path);
  }
}


if (! function_exists('http')) {
  /**
   * http path to uploads
   */
  function http($path = ''){
    $language = (isMultilingual()) ? '/'.appLanguage() : '';
    return http_root($language.''.$path);
  }

}



if (! function_exists('http_employee')) {
  /**
   * http path to uploads
   */
  function http_employee($path = ''){
    $language = (isMultilingual()) ? '/'.appLanguage() : '';
    return http_root($language.'/employee'.$path);
  }
}

if (! function_exists('http_admin')) {
  /**
   * http path to uploads
   */
  function http_admin($path = ''){
    $language = (isMultilingual()) ? '/'.appLanguage() : '';
    return http_root($language.'/admin'.$path);
  }

}

if (! function_exists('http_staff')) {
  /**
   * http path to uploads
   */
  function http_staff($path = ''){
    $language = (isMultilingual()) ? '/'.appLanguage() : '';
    return http_root($language.'/staff'.$path);
  }

}



if (! function_exists('http_students')) {
  /**
   * http path to uploads
   */
  function http_students($path = ''){
    $language = (isMultilingual()) ? '/'.appLanguage() : '';
    return http_root($language.'/students'.$path);
  }
}





//Lang


if (! function_exists('lang')) {
  /**
   * default images sizes defined in /config/modules.php
   */
  function lang($key = null){
    return new Lang($key);
  }
}



?>