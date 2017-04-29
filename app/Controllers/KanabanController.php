<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 12/29/2016
 * Time: 6:29 PM
 */
namespace Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Input;
use Models\Tasks;

class KanabanController extends MainController
{
    public function sendToDoing()
    {

        $id = Input::get('taskId');
        $todoing = Tasks::findOrFail($id);
        $todoing->status_id = '3';
        $todoing->save();
    }

    public function sendToToDo()
    {
        $id = Input::get('taskId');
        $todoing = Tasks::findOrFail($id);
        $todoing->status_id = '1';
        $todoing->save();
    }

    public function sendToPending()
    {
        $id = Input::get('taskId');
        $todoing = Tasks::findOrFail($id);
        $todoing->status_id = '4';
        $todoing->save();
    }

    public function sendToDone()
    {
        $id = Input::get('taskId');
        $todoing = Tasks::findOrFail($id);
        $todoing->status_id = '5';
        $todoing->save();
    }
}