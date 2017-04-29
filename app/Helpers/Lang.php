<?php
/**
 * User: Festim Nevzati
 * Date: 7/9/16
 * Time: 3:50 PM
 */

namespace App\Helpers;

defined('CC') or DIE('no direct access');

use Illuminate\Support\Facades\Lang as mainLang;

class Lang
{

  private $_key = '';

  public function __construct($key = null)
  {
    if(!is_null($key))
      $this->_key = $key;
    
  }

  public function get($key){
    return mainLang::get($key);
  }

  public function __toString()
  {
    return (string) $this->get($this->_key);
  }


}