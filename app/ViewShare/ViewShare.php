<?php

namespace App\ViewShare;
defined('CC') or DIE('no direct access');

use App\Http\Requests\AppRequest;
use App\Permission;
use App\Role;
use Illuminate\Foundation\Auth\User;
use Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Models\Activities;
use Models\Chat;
use Models\ChatMessage;
use Models\Courses;
use Models\CoursesDetails;
use Models\ExamSubmissionDates;
use Models\FbPages;
use Models\Languages;
use Models\Permissions;
use Models\Programs;
use Models\Projects;
use Models\Roles;
use Models\Staff;
use Models\Students;
use App\Helpers\Filter;
use Models\TaskRejects;
use Models\TaskResponses;
use Models\Tasks;
use Models\Terms;
use Models\ToDo;
use Models\Tree;
use Models\Users;


class ViewShare
{

    private $_controller;
    private $_action;

    public function __construct(Route $route, AppRequest $request)
    {

        list($controller, $action) = explode('@', $route->getActionName());
        $controller = strtolower(str_replace('Controller', '', explode('\\', $controller)[1]));

        $this->_controller = $controller;
        $this->_action = $action;

        view()->share('action', $action);
        view()->share('activeController', $controller);


        $rolesModle = new Role();
        view()->share('rolesModel', $rolesModle);
        $permissionModel = new Permission();
        view()->share('permissionsModel', $permissionModel);
        $fbpagesModel = new FbPages();
        view()->share('fbpagesModel', $fbpagesModel);
        $tasksModel = new Tasks();
        view()->share('tasksModel', $tasksModel);
        $projectsModel = new Projects();
        view()->share('projectsModel', $projectsModel);
        $usersModel = new Users();
        view()->share('usersModel', $usersModel);
        $chatsModel = new ChatMessage();
        view()->share('chatsModel', $chatsModel);
        $todoModel = new ToDo();
        view()->share('todoModel', $todoModel);
        $activitiesModel = new Activities();
        view()->share('activitiesModel', $activitiesModel);
        $treesModel = new Tree();
        view()->share('treesModel', $treesModel);
        $taskResponsesModel = new TaskResponses();
        view()->share('taskResponsesModel', $taskResponsesModel);
        $taskRejectsModel = new TaskRejects();
        view()->share('taskRejectsModel', $taskRejectsModel);
        $chatMessagesModel = new ChatMessage();
        view()->share('chatMessagesModel', $chatMessagesModel);


        $langNav = \App\Helpers\Languages::langNav($request->segments());
        view()->share('langNav', $langNav);


        $content = array();

        if ($action == 'edit') {
            if ($controller == 'staff') {
                $content = new Staff();
            } elseif ($controller == 'roles') {
                $content = new Roles();
            } elseif ($controller == 'programs') {
                $content = new Programs();
            } elseif ($controller == 'permissions') {
                $content = new Permissions();
            } elseif ($controller == 'users') {
                $content = new User();
            } elseif ($controller == 'roles') {
                $content = new Roles();
            } elseif ($controller == 'courses') {
                $content = new Courses();
            } elseif ($controller == 'students') {
                $content = new Students();
            } elseif ($controller == 'examsubmissiondates') {
                $content = new ExamSubmissionDates();
            } elseif ($controller == 'tasks') {
                $content = new Tasks();
            }

        }

        if ($controller == 'courses') {
            $programs = $programsModel->contents(array(), 'title,program_id', 'title ASC');
            view()->share('programs', $programs);


        }


        if (is_object($content))
            $content = $content->content($request->id);


        view()->share('content', $content);


    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function init()
    {

    }

    public function getID()
    {

    }

}