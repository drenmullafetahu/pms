<?php
/**
 * User: Festim Nevzati
 * Date: 20-Jul-16
 * Time: 11:26 AM
 */

namespace App\Http\Requests;

use Route;

class AppRequest extends Request
{

  private $_rules = [

    'students'=>[
      'store'=>[
        'name'=>'required',
        'last_name'=>'required',
        'student_id'=>'required|min:10'],

      'update'=>[
        'name'=>'required',
        'last_name'=>'required',
        'student_id'=>'required|min:10'],
    ],

      'staff'=>[
          'store'=>[
              'name'=>'required',
              'last_name'=>'required',
              'birthdate'=>'required',
              'email'=>'required|email'],

          'update'=>[
              'name'=>'required',
              'last_name'=>'required',
              'birthdate'=>'required'],
      ],


      'courses'=>[
          'store'=>[
              'title'=>'required',
              'code'=>'required',
              'year'=>'required',
              'trimester'=>'required',
              'course_type'=>'required'],



      ],


      'submissions'=>[
          'store'=>[
              'term_id'=>'required',
              'from'=>'required',
              'to'=>'required',
              'exam_number'=>'required'],


      ],



  ];

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $currentRoute = Route::getCurrentRoute()->getAction();
    list($controller, $action) = explode('@',$currentRoute['controller']);

    $segments = $this->segments();
    $controller = '';
    if(isMultilingual()){
      $controller = $this->segment(3);
    }else
      $controller = $this->segment(2);

     $rules = array_get($this->_rules,$controller.'.'.$action);
    if($rules){
      return $rules;
    }



    return [
      //
    ];
  }

}