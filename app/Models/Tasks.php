<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class Tasks extends Model
{
    protected $fillable = ['project_id','activity_id','created_by', 'modified_by', 'assigned_to', 'task_title', 'task_description', 'priority_id', 'status_id', 'progress', 'due_date'];

    public function content($id, $type='array'){
        $tasksResult = $this->where('id',$id)->first()->toArray();
        return ($tasksResult);
    }

//    public function contents($keys = [], $fields = '*', $order = 'id ASC', $limit = '0,100'){
//        $limit = explode(",", $limit);
//        $skip = $limit[0];
//        $limit = $limit[1];
//        $fields  = db()->fields($fields);
//        $keys = db()->keys($keys, array());
//        $orders = db()->order($order);
//        if(!is_array($order) && count($orders)==3){
//            $result =objectToArray( DB::table('courses')->select($fields)->join('courses_details', 'courses_details.course_id', '=', 'courses.id')->where($keys)->groupBy($orders[0])->orderBy($orders[1], $orders[2])->skip($skip)->take($limit)->get());
//        }else{
//            $result = objectToArray(DB::table('courses')->select($fields)->join('courses_details', 'courses_details.course_id', '=', 'courses.id')->where($keys)->orderBy($orders[0], $orders[1])->skip($skip)->take($limit)->get());
//        }
//        return ($result);
//
//    }
//
//    public function search($lang = [] ,$keys = null, $fields = '*', $order = 'lang_id ASC', $limit = '0,100'){
//        $keys = (is_null($keys) && $keys=='') ? '':' where '.$keys;
//        $result = objectToArray(DB::select("select ".$fields." from courses
//     inner join courses_details on courses.id = courses_details.course_id ".$keys." group by ".$lang." order by ".$order." limit ".$limit));
//
//        return $result;
//
//    }
//
//    public function details(){
//        return $this->hasMany('Models\CoursesDetails','course_id');
//    }

    public function getLatestTasks()
    {
        $result = objectToArray(DB::select("SELECT tasks.id , name , last_name , img_src, task_title , project_title, tasks.created_at , status_title
    FROM tasks
    INNER JOIN users
    ON tasks.assigned_to = users.id
    INNER JOIN projects
    ON tasks.project_id = projects.id
    INNER JOIN statuses
    ON tasks.status_id = statuses.id
    ORDER BY tasks.created_at DESC ;
    "));
        return $result;
    }

    public function getDetailedTasks()
    {
            $result = objectToArray(DB::select("SELECT tasks.id as id , name , last_name , img_src, task_title , project_title,activity_title ,tasks.created_by as created_by,tasks.assigned_to as assigned_to,task_description, tasks.due_date as due_date, priorities.priority_title as priority, tasks.created_at , status_title
        FROM tasks
        INNER JOIN users
        ON tasks.assigned_to = users.id
        INNER JOIN projects
        ON tasks.project_id = projects.id
        INNER JOIN statuses
        ON tasks.status_id = statuses.id
        inner join priorities
        on tasks.priority_id = priorities.id
        INNER JOIN activities
        on tasks.activity_id = activities.activity_unique_id
        ORDER BY tasks.created_at DESC ;

    "));
        return $result;
    }

    public function getPriorities()
    {
        $result = objectToArray(DB::select("SELECT id , priority_title From priorities

    "));
        return $result;
    }

    public function getUsers()
    {
        $result = objectToArray(DB::select("SELECT id as user_id , name , last_name From users ;

    "));
        return $result;
    }
    public function getProjects()
    {
        $result = objectToArray(DB::select("SELECT id , project_title ,active  From projects where active = '1' ;

    "));
        return $result;
    }

    public function getAcivities()
        {
        $result = objectToArray(DB::select("SELECT activity_unique_id , activity_title   From activities ;

    "));
        return $result;
    }
    public function getStatuses()
    {
        $result = objectToArray(DB::select("SELECT id , status_title  From statuses

    "));
        return $result;
    }

//    public function getProgress()
//    {
//        $result = objectToArray(DB::select("SELECT  projects.id , 100/COUNT(DISTINCT(tasks.id )) as progress
//FROM projects
//INNER JOIN tasks
//ON projects.id=tasks.project_id
//GROUP BY projects.id;
//
//    "));
//        return $result;
//    }
    public function getTerms($lang = null)
    {
        $lang_id = (is_null($lang)) ? languageID($lang) : languageID();
        $result = objectToArray(DB::select("select id, title from terms where lang_id=" . $lang_id . " group by id"));
        return $result;
    }

    public function getProgress($id){
        $result = objectToArray(DB::select("SELECT 100/ count(task_title) as count from tasks WHERE project_id = $id;
    "));
        return $result;
    }
    public function getPersonalizedTasks_ToDo($id){
        $result = objectToArray(DB::select("SELECT tasks.id as task_id ,modified_by,project_id,projects.id ,status_title,project_title,task_title ,task_description , priority_id ,status_id,tasks.updated_at , tasks.created_at as created_at , users.img_src as img_src, users.name as name , users.last_name as last_name , due_date
     from tasks
     INNER  JOIN projects
     On tasks.project_id = projects.id
     Inner Join users
     On tasks.modified_by = users.id
      INNER Join statuses
      On tasks.status_id = statuses.id where assigned_to=$id And status_title ='Not Started' Or assigned_to = $id and status_title = 'Rejected' ORDER by updated_at Desc;
    "));
        return $result;
    }
    public function getPersonalizedTasks_Doing($id){
        $result = objectToArray(DB::select("SELECT tasks.id as task_id ,modified_by,project_id,projects.id ,status_title,project_title,task_title ,task_description , priority_id ,status_id,tasks.updated_at , tasks.created_at as created_at , users.img_src as img_src, users.name as name , users.last_name as last_name ,users.id as user_id, due_date
     from tasks
     INNER  JOIN projects
     On tasks.project_id = projects.id
     Inner Join users
     On tasks.modified_by = users.id
      INNER Join statuses
      On tasks.status_id = statuses.id where assigned_to=$id And status_title ='In Progress' ORDER by updated_at Desc;
    "));
        return $result;
    }
    public function getPersonalizedTasks_Pending($id){
        $result = objectToArray(DB::select("SELECT tasks.id as task_id ,modified_by,project_id,projects.id ,status_title,project_title,task_title ,task_description , priority_id ,status_id,tasks.updated_at , tasks.created_at as created_at , users.img_src as img_src, users.name as name , users.last_name as last_name , due_date
     from tasks
     INNER  JOIN projects
     On tasks.project_id = projects.id
     Inner Join users
     On tasks.modified_by = users.id
      INNER Join statuses
      On tasks.status_id = statuses.id where assigned_to=$id And status_title ='Pending' ORDER by updated_at Desc;
    "));
        return $result;
    }
    public function getPersTaskCount($id){
        $result = objectToArray(DB::select("SELECT count(task_title) as count  from tasks where assigned_to=$id and status_id <> 5 ;
    "));
        return $result;
    }
    public function getPersonalizedTasks_Completed($id){
        $result = objectToArray(DB::select("SELECT tasks.id as task_id ,modified_by,project_id,projects.id ,status_title,project_title,task_title ,task_description , priority_id ,status_id,tasks.updated_at , tasks.created_at as created_at , users.img_src as img_src, users.name as name , users.last_name as last_name , due_date
     from tasks
     INNER  JOIN projects
     On tasks.project_id = projects.id
     Inner Join users
     On tasks.modified_by = users.id
      INNER Join statuses
      On tasks.status_id = statuses.id where assigned_to=$id And status_title ='Completed' ORDER by updated_at Desc;
    "));
        return $result;
    }


    public function getTasksNumber(){
        $result = objectToArray(DB::select("SELECT count(*) as task_count FROM `tasks`;
    "));
        return $result;
    }

    public function getClickedTask($id){
        $result = objectToArray(DB::select("SELECT tasks.id as task_id ,assigned_to,project_id,projects.id ,status_title,project_title ,task_title ,task_description , priority_id ,status_id,tasks.updated_at , tasks.created_at as created_at , users.img_src as img_src, users.name as name , users.last_name as last_name , due_date
     from tasks
     INNER  JOIN projects
     On tasks.project_id = projects.id
     Inner Join users
     On tasks.assigned_to = users.id
      INNER Join statuses
      On tasks.status_id = statuses.id where tasks.id=$id ;
    "));
        return $result;
    }
}