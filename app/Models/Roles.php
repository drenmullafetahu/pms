<?php
/**
 * User: Festim Nevzati
 * Date: 19-Jul-16
 * Time: 03:36 PM
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

  protected $fillable = ['title'];


  public function content($id, $type='array')
  {
    $content = $this->where('id',$id)->get()->first()->toArray();
    return ($type=='array') ? $content : (object) $content;
  }

  public function getPermissions(){

  }


  public function users(){
    return $this->belongsToMany('Models\Users','role_user','role_id','user_id');
  }

  public function permissions(){
    return $this->belongsToMany('Models\Permissions','permission_role','role_id','permission_id')->withPivot('p_update','p_create','p_read','p_delete');
  }
}