<?php

namespace App\Helpers;


use Module\Cms\Models\Content;
use Module\Cms\Models\Image;
use Module\Cms\Models\Menu;

class Breadcrumbs
{
  private $_controller;
  private $_id;
  private $_parentID;
  private $_parentType;
  private $_action;
  private $_breadcrumbs = array();

  public function __construct()
  {
    $this->_action = getAppAction();
    $this->_controller = activeController();
    $this->_id = ($this->_action=='create') ? parentID() : getAppID();
    $this->_parentType = parentType();
   $this->init();
  }

  public function get(){
    return $this->_breadcrumbs;
  }

  private function init(){
    if(!$this->_id){
      $this->_breadcrumbs[] = '<li><a href="">'.ucfirst($this->_controller).'</a></li>';
      return '';

    }

    if($this->_action=='create'){
      if(parentID()){
        if($this->_parentType=='article'){
          if($this->_controller=='image' || $this->_controller=='document'){
            $this->content();
          }
          $this->menu();
        }elseif($this->_parentType=='menu'){
          $this->menu();
        }

        $this->_breadcrumbs = array_reverse($this->_breadcrumbs);
        $count = count($this->_breadcrumbs);
        $lastArray = str_replace('<li>','<li class="active">',strip_tags(last($this->_breadcrumbs),'<li>'));
        unset($this->_breadcrumbs[$count-1]);
        $this->_breadcrumbs[$count-1] = $lastArray;
      }


      $this->_breadcrumbs[] = '<li class="active">&nbsp;&nbsp;&nbsp;&nbsp; New '.ucfirst($this->_controller).'</li>';
    }else{
      $cmsSiteOptions = cms()->options();
      $cmsSiteconfigOptions = cms()->options('siteconfig');

      if(array_key_exists($this->_controller, $cmsSiteOptions)){

        if($this->_controller=='image' && $this->_action!='create')
          $this->image();

        if($this->_controller!='menu' && $this->_action!='create'){
          $this->content();
        }

        $this->menu();
        $this->_breadcrumbs = array_reverse($this->_breadcrumbs);
      }elseif(array_key_exists($this->_controller,$cmsSiteconfigOptions)){
        $this->_breadcrumbs[] = '<li><a href="">'.ucfirst($this->_controller).'</a></li>';
      }

      if(empty($this->_breadcrumbs))
        return '';


      $count = count($this->_breadcrumbs);
      $lastArray = str_replace('<li>','<li class="active">',strip_tags(last($this->_breadcrumbs),'<li>'));
      unset($this->_breadcrumbs[$count-1]);
      $this->_breadcrumbs[$count-1] = $lastArray;
    }


  }

}