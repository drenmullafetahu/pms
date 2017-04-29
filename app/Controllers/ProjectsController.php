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
use Models\ProjectsDetails;
use Models\Tasks;
use Session;
use App\ViewShare\Dashboard as ViewShare;

class ProjectsController extends MainController
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
        return view('dashboard.templates.projects');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppRequest $request)
    {

        $inputs = $request->all();

        $project = Projects::create($inputs);
        ProjectsDetails::create(array_add($inputs, 'project_id', $project->id));

        Session::flash('project_created', 'Project created with success');
        return redirect(http('/projects'));
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
        $inputs = $request->all();
//        echo "<pre>";
//        print_r($inputs);
//        echo "</pre>";
//        die();
        $project = Projects::findOrFail($id);


        $project->update($inputs);

        $projectDetails = new ProjectsDetails();
        $projectDetails->updateProjectDetails($id, $inputs);

        Session::flash('project_updated', 'Project updated Successfully');
        return redirect(http('/projects'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();

        $projectDetails = ProjectsDetails::where('project_id', $project->id)->firstOrFail();
        $projectDetails->delete();
        Session::flash('task_deleted', "Task deleted successfully");
        return redirect(http('/projects'));

    }

    public function import_excel()
    {

    }
}
