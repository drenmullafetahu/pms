<?php

namespace Controllers;


use App\Http\Requests;
use App\Http\Requests\AppRequest;
use App\ViewShare\Staff;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Models\Courses;
use Models\CoursesDetails;
use Models\CourseStaff;
use Models\Files;
use Models\Languages;
use Models\Projects;
use Models\TaskRejects;
use Models\TaskResponses;
use Models\Tasks;
use Session;
use App\ViewShare\Dashboard as ViewShare;

class TaskResponsesController extends MainController
{

    public function __construct(AppRequest $request, Route $route)
    {
        parent::__construct($request, $route);
        $this->_viewShare = new ViewShare($route, $request);
        $this->_viewShare->setAction($this->_action);
        $this->_viewShare->setController($this->_controller);
        $this->_viewShare->share();


    }

    public function index()
    {
        return view('dashboard.templates.task_responses');
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
            'comment' => 'required',


        ]);

        $file = new Files();
        $taskResponse = new TaskResponses();
        if (Input::hasFile('file')) {
            $files = Input::file('file');
//           echo "<pre>";
//           print_r($files);die();
            $file->posted_by = Input::get('posted_by');
            $file->file_title = Input::get('file_title');
            $files->move(public_path() . '/task_response_files', Input::get('file_title') . '.' . $files->getClientOriginalExtension());
            $file->file_original_name = $files->getClientOriginalName();
            $file->size = $files->getClientSize();
            $file->type = $files->getClientMimeType();
        }
        $file->save();

        $taskResponse->task_id = Input::get('task_id');
        $taskResponse->comment = Input::get('comment');
        $taskResponse->user_id = Input::get('posted_by');
        $taskResponse->file_Id = $file->id;
        $task = Tasks::findOrFail(Input::get('task_id'));
        $task->status_id = '4';
        $taskResponse->save();
        $task->update();

        Session::flash('task_created', 'Task created Successfully');
        return redirect(http('/dashboard'))->withInput();
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
        $this->validate($request, [
            'task_title' => 'required',
            'project_id' => 'required',
            'assigned_to' => 'required',
            'priority_id' => 'required',
            'status_id' => 'required',
            'description' => 'required',

        ]);

        $inputs = $request->all();
        $tasks = Tasks::findOrFail($id);
        $tasks->update($inputs);
        Session::flash('task_updated', 'Task updated Successfully');
        return redirect(http('/manage'));
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
        return redirect(http('/manage'));

    }

    public function reject(AppRequest $request)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);
        $id = Input::get('task_id');
        $response_id = Input::get('task_response_id');
        $inputs = $request->all();
        TaskRejects::create($inputs);
        $tasksReject = Tasks::findOrFail($id);
        $tasksReject->status_id = '2';
        $tasksReject->update();

        return redirect(http('/task-responses'));
    }

    public function approve(AppRequest $request, $id)
    {

//        $id = Input::get('task_id');

        $taskApprove = Tasks::findOrFail($id);
        $taskApprove->status_id = '5';
        $taskApprove->update();

        return redirect(http('/task-responses'));
    }

    public function import_excel()
    {

    }
}
