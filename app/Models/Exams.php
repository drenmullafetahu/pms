<?php
/**
 * User: Festim Nevzati
 * Date: 19-Jul-16
 * Time: 03:33 PM
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{

  protected  $fillable = ['lang_id','student_id','staff_id','exam_submission_dates_id','program_id','course_id','sit_for','attendance','processed','published_at','exam_date','published'];


  public function content($id, $type='array'){
    $staffResult = $this->where('user_id',$id)->first()->toArray();
    $userResult = Users::where('id',$id)->first()->toArray();
    return array_merge($staffResult,$userResult);
  }

  public function contents($keys = [], $fields = '*', $order = 'user_id ASC', $limit = '0,100'){
    $limit = explode(",", $limit);
    $skip = $limit[0];
    $limit = $limit[1];
    $fields  = db()->fields($fields);
    $keys = db()->keys($keys, array());
    $orders = db()->order($order);
    if(!is_array($order) && count($orders)==3){
      $result = DB::table('staff')->select($fields)->join('users', 'staff.user_id', '=', 'users.id')->where($keys)->groupBy($orders[0])->orderBy($orders[1], $orders[2])->skip($skip)->take($limit)->get();
    }else{
      $result = DB::table('staff')->select($fields)->join('users', 'staff.user_id', '=', 'users.id')->where($keys)->orderBy($orders[0], $orders[1])->skip($skip)->take($limit)->get();
    }
    return objectToArray($result);
  }


  public function search($keys = null, $fields = '*', $order = 'user_id ASC', $limit = '0,100'){
    $keys = (is_null($keys) && $keys=='') ? '':' where '.$keys;
    $result = objectToArray(DB::select("select ".$fields." from staff inner join users on staff.user_id = users.id ".$keys." order by ".$order." limit ".$limit));
    return $result;
  }

  public function users(){
    return $this->hasOne('Models\Users');
  }
  

}