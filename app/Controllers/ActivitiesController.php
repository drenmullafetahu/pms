<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 12/25/2016
 * Time: 11:11 PM
 */
namespace Controllers;

use Models\Activities;
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

class ActivitiesController extends MainController
{
    public function __construct(AppRequest $request, Route $route)
    {
        parent::__construct($request, $route);
        $this->_viewShare = new ViewShare($route, $request);
        $this->_viewShare->setAction($this->_action);
        $this->_viewShare->setController($this->_controller);
        $this->_viewShare->share();
    }

    public function store(AppRequest $request)
    {
        $this->validate($request, [
            'activity_title' => 'required',
            'project_id' => 'required',
            'assigned_to' => 'required',
            'priority_id' => 'required',
//            'status_id' => 'required',
            'due_date' => 'required',
            'activity_description' => 'required',

        ]);

        $inputs = $request->all();
//        print_r($inputs);
//        die();
        Activities::create($inputs);

        Session::flash('activity_created', 'Activity created Successfully');
        return redirect(http('/manage/activities'))->withInput();
    }

    public function update(AppRequest $request, $id)
    {

        $inputs = $request->all();
        $activities = Activities::findOrFail($id);
        $activities->update($inputs);
        Session::flash('activity_updated', 'Activity updated Successfully');
        return redirect(http('/manage/activities'));
    }

    public function destroy($id)
    {
        $activity = Activities::findOrFail($id);
        $activity->delete();
        Session::flash('activity_deleted', "Activity deleted successfully");
        return redirect(http('/manage/activities'));

    }

}