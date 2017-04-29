<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 12/26/2016
 * Time: 2:16 AM
 */
namespace Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\ViewShare;
class Tree extends Model
{

     protected $fillable = ['project_title','activity_title','task_title'];
    public function getProjects(){
        $result = objectToArray(DB::select("SELECT project_title from projects where active = 1;

    "));
        return $result;
    }
    public function getActivities(){
        $result = objectToArray(DB::select("SELECT activity_title from activities

    "));
        return $result;
    }
    public function getTasks(){
        $result = objectToArray(DB::select("SELECT task_title from tasks

    "));
        return $result;
    }

    public function getTree(){
        $projectTitles = Projects::all(); //->where('active', '=', 1); qetu duhet mi ja bo qet send
        $activityTitles = Activities::all();
        $taskTitles = Tasks::all();


        $items = Array();
        foreach($projectTitles as $projTit){
            $items[]= Array(
                'id' =>  $projTit['id'],
                'real_id'=>$projTit['id'],
                'text'=>  $projTit['project_title'],
                'task'=>0,
                'nodes' => 0
            );
        }
        foreach($activityTitles as $activTit) {
            $items[]= Array(
                'id' =>  $activTit['activity_unique_id'],
                'real_id'=>$activTit['id'],
                'text' =>  $activTit['activity_title'],
                'task'=>0,
                'nodes' =>  $activTit['project_id']
            );
        }
        foreach($taskTitles as  $taskTit){
            $items[]= Array(
                'id' => uniqid(),
                'real_id'=>$taskTit['id'],
                'text' => $taskTit['task_title'],
                'task'=>1,
                'nodes' => $taskTit['activity_id'],
            );
        }


        //index elements by id
        foreach ($items as $item) {
            $item['subs'] = Array();
            $indexedItems[$item['id']] = (object) $item;
        }


//assign to parent
        $topLevel = array();
        if(isset($indexedItems)) {
            foreach ($indexedItems as $item) {
                if ($item->nodes == 0) {
                    $topLevel[] = $item;
                } else {
                    $indexedItems[$item->nodes]->subs[] = $item;
                }
            }
        }

//recursive function
        function renderMenu($items) {

            $render = '<ul>';
            foreach ($items as $item) {

                if($item->task == 1)
                {
                    $render .= '<li>'.'<a href="javascript:void(0)"onclick="clickedTask('.$item->real_id.') "> '.$item->text.' </a>';
                }else
                $render .= '<li>' . $item->text;
                if (!empty($item->subs)) {
                    $render .= renderMenu($item->subs);
                }
                $render .= '</li>';
            }
            return $render . '</ul>';
              }
        $result = (renderMenu($topLevel)) ;
        return($result);

    }
}