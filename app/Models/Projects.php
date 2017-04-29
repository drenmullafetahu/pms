<?php
/**
 * User: Festim Nevzati
 * Date: 19-Jul-16
 * Time: 03:31 PM
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;
use DB;

class Projects extends Model
{
    protected $fillable = ['project_title','active'];

    public function getDetailedProjects(){
        $result = objectToArray(DB::select("SELECT projects.id As project_id,created_by,name ,last_name, projects.project_title , `project_description`,`state`,`city`,
      `startDate`,`endDate`,`project_budget`,`project_cost`, projects.active as active FROM `projects`
      INNER JOIN projects_details
      ON projects.id = projects_details.project_id
      INNER JOIN users
      ON projects_details.created_by = users.id;
    "));
        return $result;
    }

    public function getStatesAndCities(){
        $result = objectToArray(DB::select("SELECT states.id As state_id, state_title , state_slug , cities.id As city_id, city_title FROM states
    INNER JOIN cities
    ON states.id = cities.state_id ;
    "));
        return $result;
    }

    public function getProjectNumber(){
        $result = objectToArray(DB::select("SELECT count(*) as project_count FROM `projects` WHERE active = true;
    "));
        return $result;
    }



}

