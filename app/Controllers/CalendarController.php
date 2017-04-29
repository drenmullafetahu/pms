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

class CalendarController extends MainController
{

    public function __construct(AppRequest $request, Route $route)
    {
        parent::__construct($request, $route);
        $this->_viewShare = new ViewShare($route, $request);
        $this->_viewShare->setAction($this->_action);
        $this->_viewShare->setController($this->_controller);
        $this->_viewShare->share();
        $this->middleware('role:owner');

    }


    public function index()
    {
        return view('dashboard.templates.calendar');
    }

    public function store(AppRequest $request)
    {


    }


    public function update(AppRequest $request, $id)
    {


    }

    public function destroy($id)
    {


    }


}
