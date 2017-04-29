<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Module\Cms\Models\Content;
use Module\Cms\Models\ContentDetails;
use Module\Cms\Models\Menu;
use Module\Cms\Models\MenuDetails;

class Database
{


  private $_queryLog = array();


  public function keys($keys, $default = array()){
    return (empty($keys)) ? $default : $keys;
  }

  public function fields($fields){
    return (is_array($fields)) ? $fields : explode(",", $fields);
  }

  public function order($order){
    if(is_array($order)){
      return $order;
    }elseif(str_contains($order,',')){
      $orders = explode("," , $order);
      $newOrder[0] = $orders[0];
      $orders1 = explode(" ",trim($orders[1]));
      $newOrder = array_merge($newOrder,$orders1);
      return $newOrder;
    }else{
      return explode(" ",$order);
    }

    //return (is_array($order)) ? $order : explode(" ",$order);
  }

  public function url($table, $url, $id, $language = null){
    $url = str_slug($url);
    $language = (is_null($language)) ? languageID() : languageID($language);


    if(ucfirst($table)=='Content')
     $result = ContentDetails::where('lang_id', $language)->where('url',$url)->get()->count();
    elseif(ucfirst($table)=='Menu')
      $result = MenuDetails::where('lang_id', $language)->where('url',$url)->get()->count();

    return ($result) ? $url.'-'.$id : $url;
  }

  public function withParents($id = null, $visible = 1){
    $menu = new Menu();
    $parent = $id;
    $parents = array();
    while($parent !=0 ){
      $keys = ["lang_id"=>languageID(),'menu.id'=>$parent];
      if($visible)
        $keys['visible'] = 1;
      $result = $menu->nav('title,menu_id,parent_id',$keys)[0];
      $parent = $result['parent_id'];
      $parents[$result['menu_id']] = $result['title'];
    }
    return $parents;
  }

  public function menuParentID(){
    $parentID = parentID();
    $parentType = '';
    $content = new Content();
    $menuID = '';
    while($parentType != 'menu'){
      $results = array_first($content->contents(['lang_id'=>languageID(), 'content.id'=>$parentID],'parent_type,parent_id,content_id'));
      $menuID = $results['content_id'];
      $parentType = $results['parent_type'];
      $parentID = $results['parent_id'];
    }
    return $parentID;
  }

  public function queryLog($index = null){
    $this->_queryLog = DB::getQueryLog();
    if(is_null($index))
      return $this->_queryLog;
    elseif($index == 'last')
      return array_last($this->_queryLog);
    elseif($index == 'first')
      return array_first($this->_queryLog);
    elseif(is_int($index) && isset($this->_queryLog[$index]))
      return $this->_queryLog[$index];

    return array();
  }
  
  public function firstMenuID(){
    $menu = new Menu();
    return $menu->fieldValue([],'menu_id');
  }
  
  public function arrayToStrign($keys, $sep = ' AND '){
    if(is_array($keys)){
      foreach($keys as $k=>$v){
        
      }
    }
  }



}