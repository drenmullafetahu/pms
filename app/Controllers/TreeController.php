<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 1/7/2017
 * Time: 10:58 PM
 */
namespace Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Models\Tasks;

class TreeController extends MainController
{
    public function index()
    {
        return view('dashboard.templates.tree');
    }

    public function getClicked()
    {

        $id = Input::get('taskId');
        $getClicked = new Tasks();
        $tasks = $getClicked->getClickedTask($id);
        return $tasks;
    }

}