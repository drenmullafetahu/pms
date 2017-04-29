<?php
/**
 * User: Festim Nevzati
 * Date: 19-Jul-16
 * Time: 03:31 PM
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectsDetails extends Model
{
    protected $fillable = ['project_id','created_by','modified_by' ,'project_description','state','city','startDate','endDate','project_budget','project_cost'];


    public function updateProjectDetails($id, $inputs){
        $inputs = array_only($inputs,$this->getFillable());
        $result = objectToArray(DB::table('projects_details')->where('project_id',$id)->update($inputs));
        return $result;
    }
}

