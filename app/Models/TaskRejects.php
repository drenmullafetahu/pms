<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class TaskRejects extends Model
{
    protected $fillable = [ 'user_id','task_id','comment','task_response_id'];

    public function getPersTaskRejected($id){
        $result = objectToArray(DB::select("SELECT task_title ,name, task_id,comment, task_rejects.created_at as created_at ,img_src from tasks
            inner join task_rejects
            on tasks.id = task_rejects.task_id
            inner join users
            on task_rejects.user_id = users.id where assigned_to = $id and status_id = 2;
     "));
        return $result;
    }
    public function getPersTaskRejectedCount($id){
        $result = objectToArray(DB::select("SELECT count(task_title) as count from tasks
            inner join task_rejects
            on tasks.id = task_rejects.task_id
            inner join users
            on task_rejects.user_id = users.id where assigned_to = $id and status_id = 2;
    "));
        return $result;
    }
}

