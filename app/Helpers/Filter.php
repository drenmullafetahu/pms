<?php
namespace App\Helpers;

//defined('CC') or DIE('no direct access');

class Filter
{

  /**
   * array of filters to apply
   * @var array
   */
  private  static $_filters = [
    'url'=>'/[^A-Za-z0-9-_]/',
    'text' => '/[^A-Za-z]/',
    'textl' => '/[^a-z]/',
    'textu' => '/[^A-Z]/',
    'number'=>'/[^0-9]/',
    'search'=>'/[^A-Za-z0-9-_ ]/',
  ];

  private static $_phpValidateFilters = [
    'boolean' => FILTER_VALIDATE_BOOLEAN,
    'email' => FILTER_VALIDATE_EMAIL,
    'float' => FILTER_VALIDATE_FLOAT,
    'int' => FILTER_VALIDATE_INT,
    'ip' => FILTER_VALIDATE_IP,
    'regexp' => FILTER_VALIDATE_REGEXP,
    'url' => FILTER_VALIDATE_URL,
  ];

  private static $_phpSanitizeFilters = [
    'email' => FILTER_SANITIZE_EMAIL,
    'encoded' => FILTER_SANITIZE_ENCODED,
    'magic_quotes' => FILTER_SANITIZE_MAGIC_QUOTES,
    'float' => FILTER_SANITIZE_NUMBER_FLOAT,
    'int' => FILTER_SANITIZE_NUMBER_INT,
    'chars' => FILTER_SANITIZE_SPECIAL_CHARS,
    'full_chars' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'string' => FILTER_SANITIZE_STRING,
    'stripped' => FILTER_SANITIZE_STRIPPED,
    'url' => FILTER_SANITIZE_URL,
    'raw' => FILTER_UNSAFE_RAW,
    'callback' => FILTER_CALLBACK,
  ];

  /**
   * validate given value
   *
   * @param $value
   * @param $type - from $_phpValidateFilters;
   * @param null $options
   * @return mixed
   */
  public static function validate($value, $type, $options = null)
  {
    return filter_var($value, self::$_phpValidateFilters[$type], $options);
  }


  /**
   * sanitize given value
   *
   * @param $value
   * @param $type - from $_phpSanitizeFilters;
   * @param null $options
   */
  public static function sanitize($value, $type, $options = null){
    return filter_var($value, self::$_phpSanitizeFilters[$type], $options);
  }


  /**
   * Apply filters defined in $_filters and give extra regex,
   * if type set to null regex must be defined
   *
   * @param $value
   * @param $type
   * @param null $regex
   */
  public static function apply($value, $type, $regex = null, $with=''){

    if(is_null($type)){
      if(is_null($regex) || $regex=='')
        die("When using <b><em>Filter::apply</em></b> with <b><em>type set null</em></b> regex must be defined ");

      return self::replace($value, $regex, $with);
    }else{
      if($regex)
        self::$_filters[$type] = substr(self::$_filters[$type], 0, -2).$regex.']';

      return self::replace($value, self::$_filters[$type], $with);
    }

  }

  /**
   *  add custom filter to use in apply
   *
   * @param $name
   * @param $pattern
   * @param int $force
   */
  public static function addFilter($name, $pattern, $force=0){
    $exists = (isset(self::$_filters[$name])) ? 1 : 0;
    if($force && $exists){
      unset(self::$_filters[$name]);
    }elseif($exists){
      die($name." exists in array");
    }
    self::$_filters[$name] = $pattern;
  }

  private static function replace($value, $regex, $with)
  {
    return preg_replace($regex,$with, $value);
  }

}