<?php
/**
 * Created by PhpStorm.
 * User: ParthVaidya
 * Date: 19-10-2014
 * Time: 00:36
 */
namespace Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['user1','user2','user1_is_typing','user2_is_typing'];




} 