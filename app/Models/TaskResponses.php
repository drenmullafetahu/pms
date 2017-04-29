<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class TaskResponses extends Model
{
    protected $fillable = ['task_id', 'comment', 'file_id','user_id'];

//    public function getTaskResponses()
//    {
//        $result = objectToArray(DB::select("SELECT task_responses.id as task_response_id , task_title , task_description , tasks.id = task_id ,tasks.created_by as created_by,tasks.modified_by as modified_by, tasks.assigned_to as assigned_to , name , last_name ,activity_title , activity_description , project_title , project_description , comment , file_id , task_responses.created_at as created_at FROM `task_responses`
//            inner join tasks
//            On task_responses.task_id = tasks.id
//            INNER join users
//            on tasks.assigned_to = users.id
//            INNER JOIN activities
//            on tasks.activity_id = activities.activity_unique_id
//            INNER join projects
//            on tasks.project_id = projects.id
//            INNER join projects_details
//            on projects.id = projects_details.project_id where tasks.status_id = 4;
//    "));
//        return $result;
//    }

    public function getTaskResponses(){
        $result = objectToArray(DB::select("SELECT tasks.id as task_id, task_title , task_description , tasks.due_date , project_title , activities.activity_title , name , last_name from tasks
            INNER JOIN projects
            on projects.id = tasks.project_id
            INNER join activities
            on activities.activity_unique_id = tasks.activity_id
            inner join users
            on users.id = tasks.assigned_to
            where tasks.status_id = 4

    "));
        return $result;
    }

    public function getTaskResponseComment($task_id){
        $result = objectToArray(DB::select("
            SELECT task_id , name,last_name , comment , task_responses.created_at as response_created_date FROM `task_responses`
            Inner join tasks
            on tasks.id = task_responses.task_id
            inner join users
            on users.id = task_responses.user_id
            WHERE task_id = $task_id

    "));
        return $result;
    }
}
