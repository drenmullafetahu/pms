<?php

namespace Controllers;

use App\Http\Requests;
use App\Http\Requests\AppRequest;
use App\ViewShare\Staff;
use Illuminate\Routing\Route;
use Models\Courses;
use Models\CoursesDetails;
use Models\CourseStaff;
use Models\Languages;
use Session;
use App\ViewShare\Login as ViewShare;

class LoginController extends MainController
{
//    public function __construct(AppRequest $request, Route $route){
//        parent::__construct($request, $route);
//        $this->_viewShare = new ViewShare($route, $request);
//        $this->_viewShare->setAction($this->_action);
//        $this->_viewShare->setController($this->_controller);
//        $this->_viewShare->share();
//
//    }

    public function index()
    {
        return view('login/index');
    }

    public function store(AppRequest $request)
    {

    }

    public function export(AppRequest $inputs)
    {


    }

    public function doLogin()
    {

// validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

// run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                echo 'SUCCESS!';

            } else {

                // validation not successful, send back to form
                return Redirect::to('/');

            }

        }
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('login'); // redirect the user to the login screen
    }


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
