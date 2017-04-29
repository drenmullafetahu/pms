<?php

namespace Controllers;


use App\Http\Requests;
use App\Http\Requests\AppRequest;
use App\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Models\Courses;
use Models\CoursesDetails;
use Models\CourseStaff;
use Models\CoverImages;
use Models\Languages;
use Session;
use App\ViewShare\Dashboard as ViewShare;

class ProfilesController extends MainController
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

        return view('dashboard.templates.profiles');
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
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'profession' => 'required',

        ]);

        $inputs = $request->all();
        $users = User::findOrFail($id);
        $users->update($inputs);
        Session::flash('user_updated', 'User updated Successfully');
        return redirect(http('/profile'));
    }

    public function uploadCoverImage(AppRequest $request)
    {
        $this->validate($request, [
            'cover_image' => 'required|image|max:300',
        ]);

        $file = new CoverImages();
        $cover_image_url = new User();
        if (Input::hasFile('cover_image')) {
            $files = Input::file('cover_image');
//           echo "<pre>";
//           print_r($files);die();
            $file->user_id = Input::get('user_id');

            $files->move(public_path() . '/user_cover_images', $files->getClientOriginalName());
            $file->file_original_name = $files->getClientOriginalName();
            $file->file_size = $files->getClientSize();
            $file->file_type = $files->getClientMimeType();
            $cover_image_url = User::findOrFail(Input::get('user_id'));
            $cover_image_url->cover_image = $file->file_original_name;
        }
        $file->save();
        $cover_image_url->update();
        return redirect(http('/profile'));


    }

    public function uploadProfilePicture(AppRequest $request)
    {
        $this->validate($request, [
            'profile_picture' => 'required|image|max:300',
        ]);

        $file = new CoverImages();
        $cover_image_url = new User();
        if (Input::hasFile('profile_picture')) {
            $files = Input::file('profile_picture');
//           echo "<pre>";
//           print_r($files);die();
            $file->user_id = Input::get('user_id');

            $files->move(public_path() . '/user_profile_pictures', $files->getClientOriginalName());
            $file->file_original_name = $files->getClientOriginalName();
            $file->file_size = $files->getClientSize();
            $file->file_type = $files->getClientMimeType();
            $cover_image_url = User::findOrFail(Input::get('user_id'));
            $cover_image_url->img_src = $file->file_original_name;
        }
        $file->save();
        $cover_image_url->update();
        return redirect(http('/profile'));
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
