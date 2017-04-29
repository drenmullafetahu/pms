<?php

namespace Controllers;
defined('CC') or DIE('no direct access');
use App\Http\Requests\AppRequest;
use Illuminate\Routing\Route;
use Models\Staff;
use Models\Users;
use Carbon\Carbon;
use App\ViewShare\Staff as ViewShare;


use Session;
use Excel;
use Html;

class StaffController extends MainController
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
        $users = new Users();
        $inputs = $request->all();
//      if(isset($inputs['username'])){
//        $username = $users->checkUsername($inputs['username']);
//        return Redirect::back()->withInput()->withErrors(['username'=>'Username already exists']);
//      }
        if (!isset($inputs['password']) || $inputs['password'] == '') {
            if (isset($inputs['birthdate'])) {
                $inputs['password'] = Carbon::parse($inputs['birthdate'])->format('d.m.Y');
            } else {
                $inputs['password'] = $inputs['name'] . $inputs['last_name'];
            }
        }
        //QKA ME I DHAN USER->USERNAME-it si INPUT ? FESTIM
        if (isset($inputs['email']) && $inputs['email'] != '') {
            $inputs['username'] = $inputs['email'];
        } else
            $inputs['username'] = $inputs['name'] . $inputs['last_name'];

        $user = Users::create($inputs);
        Staff::create(array_add($inputs, 'user_id', $user->id));

        Session::flash('Staff_created', 'Antari i stafit u shtua me sukses');
        return redirect(http_employee('/staff/create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = Users::findOrFail($id);

        if (isset($inputs['password']) && $inputs['password'] != '') {
            $user->update($inputs);
        } else {
            $inputs['username'] = $inputs['email'];
            $user->update($inputs);
            $staff = Staff::where('user_id', $id)->firstOrFail();
            $staff->update($inputs);

        }
        Session::flash('Staff_updated', 'T&euml; dhanunat e anetarit te stafit u rifreskuan me sukses');
        return redirect(http_employee('/staff/edit/' . $id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();
        $staff = Staff::where('user_id', $id)->firstOrFail();
        $staff->delete();

        Session::flash('staff_deleted', 'Anetari i stafit u fshij me sukses');
        return http_employee('/staff');
    }

    /**
     * Export students to excel file
     *
     */
    public function export(AppRequest $inputs)
    {

        $model = new Staff();
        $results = $model->contents(array(), '*', 'name ASC', '0,5000');

        Excel::create('Lista e Staff ' . date('d.m.Y') . '-' . date('his'), function ($excel) use ($results) {

            $excel->sheet('Staff', function ($sheet) use ($results) {
                $sheet->freezeFirstRow();

                $sheet->cell(1, function ($cell) {
                    $cell->setFontWeight('bold');
                    $cell->setFontSize(12);

                });

                $head = array(
                    lang('labels.user_id'),
                    lang('labels.academic_title'),
                    lang('labels.name'),
                    lang('labels.last_name'),
                    lang('labels.birthdate'),
                    lang('labels.birthplace'),
                    lang('labels.sex'),
                    lang('labels.email'),
                );
                $sheet->fromArray(array(
                    $head
                ), null, 'A1', false, false);

                //fill student info to excel
                $loop = 2;
                foreach ($results as $result) {
                    $staffArray[0] = $result['user_id'];
                    $staffArray[1] = Html::decode($result['academic_title']);
                    $staffArray[2] = Html::decode($result['name']);
                    $staffArray[3] = Html::decode($result['last_name']);
                    $staffArray[4] = $result['birthdate'];
                    $staffArray[5] = Html::decode($result['birthplace']);
                    $staffArray[6] = Html::decode(lang("labels.sex_names." . $result['sex']));
                    $staffArray[7] = $result['email'];
                    //$program = ($result['program_id'] && $result['program_id'] != 0 && isset($programs[$result['program_id']])) ? $programs[$result['program_id']] : '';
                    // $staffArray[8] = $program;

                    $sheet->row($loop, $staffArray);
                    $loop++;
                }

                //end of student fill

            });
        })->download('xls');
    }


}
