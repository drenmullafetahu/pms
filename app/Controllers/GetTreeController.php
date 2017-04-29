<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 12/26/2016
 * Time: 2:13 AM
 */
namespace Controllers;

use Models\Activities;
use Models\Projects;
use Models\Tasks;
use Models\Tree;

class GetTreeController extends MainController
{

    public function index()
    {
        return view('dashboard.templates.getTree');
    }

    public function getTreee()
    {

        $projectTitles = Projects::all(); //->where('active', '=', 1); qetu duhet mi ja bo qet send
        $activityTitles = Activities::all();
        $taskTitles = Tasks::all();

//        $items = Array
//        (
//            Array
//            (
//                'id' => 1,
//                'title' => 'Stacioni i Autobusave',
//                'parent_id' => 0
//            ),
//            Array
//            (
//                'id' => 2,
//                'title' => 'Activity1',
//                'parent_id' => 1
//            ),
//            Array
//            (
//                'id' => 3,
//                'title' => 'Task1',
//                'parent_id' => 2
//            ),
//            Array
//            (
//                'id' => 4,
//                'title' => 'Komuniteti Rom',
//                'parent_id' => 0
//            ),
//            Array
//            (
//                'id' => 5,
//                'title' => 'Activity2',
//                'parent_id' => 0
//            ),
//             Array
//             (
//                 'id' => 6,
//                 'title' => 'Task2',
//                 'parent_id' => 2
//             ),
//            Array
//            (
//                'id' => 7,
//                'title' => 'Task1',
//                'parent_id' => 0
//            )
//        );
//        echo"<pre>";
//        print_r($items);

//        //index elements by id
//        foreach ($items as $item) {
//            $item['subs'] = array();
//            $indexedItems[$item['id']] = (object) $item;
//        }
//
//
////assign to parent
//        $topLevel = array();
//        foreach ($indexedItems as $item) {
//            if ($item->parent_id == 0) {
//                $topLevel[] = $item;
//            } else {
//                $indexedItems[$item->parent_id]->subs[] = $item;
//            }
//        }
//
////recursive function
//        function renderMenu($items) {
//            $render = '<ul>';
//
//            foreach ($items as $item) {
//                $render .= '<li>' . $item->title;
//                if (!empty($item->subs)) {
//                    $render .= renderMenu($item->subs);
//                }
//                $render .= '</li>';
//            }
//
//            return $render . '</ul>';
//        }
//
//        print_r((object)renderMenu($topLevel)) ;
//        echo "PROJECTS";
//
//
//        foreach($projectTitles as $projTit){
//
//           $titles = $projTit['project_title'];
//            $id = $projTit['id'];
//            $array['id'] = $id;
//            $array['title'] = $titles;
//            $array['parent_id'] =$id;
//
//            echo "<pre>";
//            print_r($array);
//        }
//
//        echo "ACTIVITIES";
//
//        foreach($activityTitles as $activTit){
//            $titles = $activTit['activity_title'];
//            $id = $activTit['id'];
//            $correspondingId = $activTit['project_id'];
//            $array['id'] = $id;
//            $array['title'] = $titles;
//            $array['parent_id'] = $correspondingId;
//            echo "<pre>";
//            print_r($array);
//        }
//        echo "TASKS";
//
//        foreach($taskTitles as $taskTit){
//            $titles = $taskTit['task_title'];
//            $id = $taskTit['id'];
//            $correspondingId = $taskTit['activity_id'];
//            $array['id'] = $id;
//            $array['title'] = $titles;
//            $array['parent_id'] = $correspondingId;
//            echo "<pre>";
//            print_r($array);
//        }
//
//
//
//echo "u KRY E PARA";
//echo "</br>";

        $items = Array();
        foreach ($projectTitles as $projTit) {
            $items[] = Array(
                'id' => $projTit['id'],
                'text' => $projTit['project_title'],
                'nodes' => 0
            );
        }
        foreach ($activityTitles as $activTit) {
            $items[] = Array(
                'id' => $activTit['activity_unique_id'],
                'text' => $activTit['activity_title'],
                'nodes' => $activTit['project_id']
            );
        }
        foreach ($taskTitles as $taskTit) {
            $items[] = Array(
                'id' => uniqid(),
                'text' => $taskTit['task_title'],
                'nodes' => $taskTit['activity_id'],
            );
        }


        //index elements by id
        foreach ($items as $item) {
            $item['subs'] = Array();
            $indexedItems[$item['id']] = (object)$item;
        }


//assign to parent
        $topLevel = array();
        foreach ($indexedItems as $item) {
            if ($item->nodes == 0) {
                $topLevel[] = $item;
            } else {
                $indexedItems[$item->nodes]->subs[] = $item;
            }
        }

//recursive function
        function renderMenu($items)
        {
            $render = '<ul>';
            foreach ($items as $item) {
                $render .= '<li>' . $item->id;
                if (!empty($item->subs)) {
                    $render .= renderMenu($item->subs);
                }
                $render .= '</li>';
            }
            return $render . '</ul>';
        }

        $result = (renderMenu($topLevel));
        return ($result);

    }
}