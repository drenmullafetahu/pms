<?php
/**
 * User: Festim Nevzati
 * Date: 19-Jul-16
 * Time: 03:22 PM
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{

  protected $fillable = ['lang_id','title','name','group'];

  public function content($id, $type='array')
  {
    $content = $this->where('id',$id)->get()->first()->toArray();
    return ($type=='array') ? $content : (object) $content;
  }



  public function roles(){
    return $this->belongsToMany('Models\Roles','permission_role','role_id','permission_id');
  }
}