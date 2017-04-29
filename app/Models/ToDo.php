<?php
/**
 * Created by PhpStorm.
 * User: ParthVaidya
 * Date: 19-10-2014
 * Time: 00:27
 */
namespace Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class ToDo extends Model
{
    protected $fillable = ['user_id','text'];


    public function getToDos($id){
        $result = objectToArray(DB::select("SELECT * From to_dos where user_id = $id;

    "));
        return $result;
    }

} 