<?php
/**
 * User: Festim Nevzati
 * Date: 19-Jul-16
 * Time: 03:22 PM
 */

namespace App;

use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\Model;

class Permission extends EntrustPermission
{

  protected $fillable = ['name','display_name','description'];


}