<?php
namespace Controllers;


use App\Http\Requests;
use App\Http\Requests\AppRequest;
use App\ViewShare\Staff;
use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Route;
use Models\Courses;
use Models\CoursesDetails;
use Models\CourseStaff;
use Models\Languages;
use Models\Projects;
use Models\Tasks;
use Session;
use App\ViewShare\Dashboard as ViewShare;

class ManageTasksController extends MainController
{

    public function __construct(AppRequest $request, Route $route)
    {
        parent::__construct($request, $route);
        $this->_viewShare = new ViewShare($route, $request);
        $this->_viewShare->setAction($this->_action);
        $this->_viewShare->setController($this->_controller);
        $this->_viewShare->share();
//        $this->middleware('role:owner');
//        $this->middleware('role:admin');

    }

    public function index()
    {
        return view('dashboard.templates.task_manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppRequest $request)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }

    public function import_excel()
    {

    }
}
