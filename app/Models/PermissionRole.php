<?php
/**
 * User: Festim Nevzati
 * Date: 20-Jul-16
 * Time: 11:42 AM
 */

namespace Models;


class PermissionRole
{
  protected $table = 'role_permissions';

  protected $fillable = ['role_id','permission_id','p_create','p_read','p_update','p_delete'];

}