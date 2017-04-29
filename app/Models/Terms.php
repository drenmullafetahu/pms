<?php
/**
 * User: Festim Nevzati
 * Date: 19-Jul-16
 * Time: 03:32 PM
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;
use DB;
class Terms extends Model
{
    protected $fillable = ['lang_id','title'];

//    public function content($id, $type='array'){
//        $termsResult = $this->where('id',$id)->first()->toArray();
//        $exam_submissionsResult = Users::where('term_id',$id)->first()->toArray();
//        return array_merge($termsResult,$exam_submissionsResult);
//    }
//
//    public function contents($lang = null,$keys = [], $fields = '*', $order = 'title ASC', $limit = '0,100'){
//        $limit = explode(",", $limit);
//        $lang_id = (is_null($lang)) ? languageID($lang) : languageID();
//        $skip = $limit[0];
//        $limit = $limit[1];
//        $fields  = db()->fields($fields);
//        $keys = db()->keys($keys, array());
//        $orders = db()->order($order);
//        $result = objectToArray(DB::table('term')->where('lang_id', $lang_id)->get());
////        if(!is_array($order) && count($orders)==3){
////            $result =objectToArray( DB::table('courses')->select($fields)->join('courses_details', 'courses_details.course_id', '=', 'courses.id')->where($keys)->groupBy($orders[0])->orderBy($orders[1], $orders[2])->skip($skip)->take($limit)->get());
////        }else{
////            $result = objectToArray(DB::table('courses')->select($fields)->join('courses_details', 'courses_details.course_id', '=', 'courses.id')->where($keys)->orderBy($orders[0], $orders[1])->skip($skip)->take($limit)->get());
////        }
//        return ($result);
//
//    }
//
//
//    public function saveByLang($inputs, $id, $lang = null){
//        $lang_id = (is_null($lang)) ? languageID($lang) : languageID();
//        $inputs = array_only($inputs,$this->getFillable());
//        $this->where('term_id', $id)->where('lang_id', $lang_id)->update($inputs);
//        return $this;
//    }
//
//    public function programs(){
//        return $this->belongsTo('Models\Courses','course_id');
//    }

}