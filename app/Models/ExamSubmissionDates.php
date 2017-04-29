<?php
/**
 * User: Festim Nevzati
 * Date: 19-Jul-16
 * Time: 03:33 PM
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;
use DB;

class ExamSubmissionDates extends Model
{

  protected $fillable = ['term_id','from','to', 'exam_number'];

  public function content($id, $type='array'){
    $exam_submission_datesResult = $this->where('term_id',$id)->first()->toArray();
    $termsResult = Terms::where('id',$id)->first()->toArray();
    return array_merge($exam_submission_datesResult,$termsResult);
  }

  public function contents($keys = [], $fields = '*', $order = 'title ASC', $limit = '0,100'){
    $limit = explode(",", $limit);

    $skip = $limit[0];
    $limit = $limit[1];
    $fields  = db()->fields($fields);
    $keys = db()->keys($keys, array());
    $orders = db()->order($order);
    if(!is_array($order) && count($orders)==3){
      $result = DB::table('exam_submission_dates')->select($fields)->join('terms', 'exam_submission_dates.term_id', '=', 'terms.id')->where($keys)->groupBy($orders[0])->orderBy($orders[1], $orders[2])->skip($skip)->take($limit)->get();
    }else{
      $result = DB::table('exam_submission_dates')->select($fields)->join('terms', 'exam_submission_dates.term_id', '=', 'terms.id')->where($keys)->orderBy($orders[0], $orders[1])->skip($skip)->take($limit)->get();
    }
    return objectToArray($result);
  }

  public function getTerms($lang =null){
    $lang_id = (is_null($lang)) ? languageID($lang) : languageID();
    $result = objectToArray(DB::select("select id, title from terms where lang_id=".$lang_id." group by id"));
    return $result;
  }

  public function updateTerms($id ,$inputs){
    $inputs = array_only($inputs,$this->getFillable());
    $result = objectToArray(DB::table('exam_submission_dates')->where('term_id',$id)->update($inputs));
    return $result;
  }
  public function terms(){
    return $this->hasOne('Models\Terms');
  }
}

