<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 12/25/2016
 * Time: 10:48 PM
 */
namespace Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Activities extends Model
{
    protected $fillable = ['activity_unique_id','project_id','assigned_to','created_by','modified_by','activity_title','activity_description','due_date','priority_id','status_id'];


    public function getDetailedActivities(){
        $result = objectToArray(DB::select("SELECT users.id AS user_id , name , last_name , img_src,
          activities.id as id ,activity_title ,modified_by,assigned_to,
          priorities.id AS priority_id,priority_title ,
          statuses.id AS status_id,status_title ,
          activity_description,
          projects.id AS project_id,project_title ,projects.active As active,
          progress,
          due_date,
          activities.created_at
            FROM activities
            INNER JOIN users
            ON activities.assigned_to = users.id
            INNER JOIN projects
            ON activities.project_id = projects.id
            INNER JOIN statuses
            ON activities.status_id = statuses.id
            INNER JOIN priorities
            ON activities.priority_id = priorities.id;

    "));
        return $result;
    }

    public function getUsers(){
        $result = objectToArray(DB::select("SELECT id as user_id , name , last_name From users ;

    "));
        return $result;
    }
    public function getProjects(){
        $result = objectToArray(DB::select("SELECT id , project_title ,active  From projects where active = '1' ;

    "));
        return $result;
    }
    public function getPriorities(){
        $result = objectToArray(DB::select("SELECT id , priority_title From priorities

    "));
        return $result;
    }
    public function getStatuses(){
        $result = objectToArray(DB::select("SELECT id , status_title  From statuses

    "));
        return $result;
    }
}