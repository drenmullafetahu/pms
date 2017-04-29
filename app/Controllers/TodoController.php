<?php
namespace Controllers;

use App\Http\Requests;
use App\Http\Requests\AppRequest;
use Models\Chat;
use Models\ChatMessage;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Auth\Authenticatable as Auth;
use DB;
use Models\ToDo;
use Psy\Exception\ErrorException;
use Session;
use App\ViewShare\Dashboard as ViewShare;

class TodoController extends MainController
{

    public function saveTodo()
    {

        $text = Input::get('text');
        $user = Input::get('user');

        $todo = new ToDo();
        $todo->user_id = $user;
        $todo->text = $text;
        $todo->save();
    }

    public function deleteTodo()
    {
        $id = Input::get('todoId');
        $todo = ToDo::findOrFail($id);
        $todo->delete();
    }


}