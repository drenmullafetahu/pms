<?php

namespace Controllers;


use App\Http\Requests;
use App\Http\Requests\AppRequest;
use App\ViewShare\Staff;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;
use Models\Courses;
use Models\CoursesDetails;
use Models\CourseStaff;
use Models\Languages;
use Models\Projects;
use Models\Tasks;
use Session;
use App\ViewShare\Dashboard as ViewShare;

class TasksController extends MainController
{

    public function __construct(AppRequest $request, Route $route)
    {
        parent::__construct($request, $route);
        $this->_viewShare = new ViewShare($route, $request);
        $this->_viewShare->setAction($this->_action);
        $this->_viewShare->setController($this->_controller);
        $this->_viewShare->share();


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppRequest $request)
    {

        $this->validate($request, [
            'task_title' => 'required',
            'project_id' => 'required',
            'assigned_to' => 'required',
            'activity_id' => 'required',
            'priority_id' => 'required',
            'task_description' => 'required',

        ]);

        $inputs = $request->all();
        Tasks::create($inputs);

        Session::flash('task_created', 'Task created Successfully');
        return redirect(http('/manage/tasks'))->withInput();
    }

    public function export(AppRequest $inputs)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppRequest $request, $id)
    {
//        $this->validate($request, [
//            'task_title' => 'required',
//            'project_id' => 'required',
//            'assigned_to' => 'required',
//            'activity_id' => 'required',
//            'priority_id' => 'required',
//            'status_id' => 'required',
//            'description' => 'required',
//
//        ]);

        $inputs = $request->all();
        $tasks = Tasks::findOrFail($id);

        $tasks->update($inputs);
        Session::flash('task_updated', 'Task updated Successfully');
        return redirect(http('/manage/tasks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $task = Tasks::findOrFail($id);
        $task->delete();
        Session::flash('task_deleted', "Task deleted successfully");
        return redirect(http('/manage/tasks'));


    }

    public function import_excel()
    {

    }
}
