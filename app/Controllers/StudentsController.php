<?php

namespace Controllers;
defined('CC') or DIE('no direct access');

use App\Http\Requests\AppRequest;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Models\Students;
use Models\Users;
use App\Helpers\Filter;
use App\ViewShare\Students as ViewShare;

use Session;
use Excel;
use Html;

class StudentsController extends MainController
{

    private $_viewShare;

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
        $inputs['username'] = $inputs['student_id'];
        $user = Users::create($inputs);
        Students::create(array_add($inputs, 'user_id', $user->id));

        Session::flash('student_created', 'Studenti u shtua me sukses');
        return redirect(http_employee('/students/create'));

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
            $inputs['username'] = $inputs['student_id'];
            $user->update($inputs);
            $student = Students::where('user_id', $id)->firstOrFail();
            $student->update($inputs);
            die('here');
        }
        Session::flash('student_updated', 'T&euml; dhanunat e studentit u rifreskuan me sukses');
        return redirect(http_employee('/students/edit/' . $id));

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
        $student = Students::where('user_id', $id)->firstOrFail();
        $student->delete();

        Session::flash('student_deleted', 'Studenti u fshij me sukses');
        return http_employee('/students');
        //return redirect(http_employee('/students'));
    }

    public function import()
    {
        return view('employee.templates.students');
    }

    /*
     * import students from excel file
     * */
    public function importFile(AppRequest $request)
    {
        $students = [];
        $inputs = $request->all();
        Excel::selectSheets(0)->load($inputs['students'], function ($reader) {
            foreach ($reader->toArray() as $row) {
                foreach ($row as $k => $v) {
                    if ($v['id_studentit'] && $v['emri'] && $v['mbiemri']
                        && $v['programi'] && $v['viti_i_regjistrimit']
                    ) {
                        $studentModel = new Students();
                        if ($studentModel->idExists($v['id_studentit'])) {
                            $students = $v;
                        } else {
                            $userInfo['email'] = $v['email'];
                            $userInfo['username'] = $v['id_studentit'];
                            $userInfo['role_id'] = 4;
                            $userInfo['active'] = 1;
                            $userInfo['password'] = Carbon::parse($v['data_e_lindjes'])->format('d.m.Y');
                            $user = Users::create($userInfo);

                            $dbInfo['student_id'] = $v['id_studentit'];
                            $dbInfo['user_id'] = $user->id;
                            $dbInfo['name'] = $v['emri'];
                            $dbInfo['last_name'] = $v['mbiemri'];
                            $dbInfo['parents_name'] = $v['emri_i_prindit'];
                            $dbInfo['email'] = $v['email'];
                            $dbInfo['birthdate'] = Carbon::parse($v['data_e_lindjes'])->format('Y-m-d');
                            $dbInfo['birthplace'] = $v['vendi_i_lindjes'];
                            $dbInfo['program_id'] = $v['programi'];
                            $dbInfo['registration_year'] = $v['viti_i_regjistrimit'];
                            $dbInfo['sex'] = $v['gjinia'];

                            Students::create($dbInfo);
                        }
                    }
                }

            }

        });
        return redirect(http_employee('/students/import'))->with('students', $students);

    }


    /**
     * Export students to excel file
     *
     */
    public function export(AppRequest $inputs)
    {

        $model = new Students();
        $results = $model->search($this->_viewShare->getFilterKeys(), '*', 'name ASC', '0,5000');

        Excel::create('Lista e Studenteve ' . date('d.m.Y') . '-' . date('his'), function ($excel) use ($results) {

            $excel->sheet('Students', function ($sheet) use ($results) {
                $sheet->freezeFirstRow();

                $sheet->cell(1, function ($cell) {
                    $cell->setFontWeight('bold');
                    $cell->setFontSize(12);

                });

                $head = array(
                    lang('labels.student_id'),
                    lang('labels.name'),
                    lang('labels.last_name'),
                    lang('labels.parents_name'),
                    lang('labels.birthdate'),
                    lang('labels.birthplace'),
                    lang('labels.sex'),
                    lang('labels.email'),
                    lang('labels.program'),
                    lang('labels.registration_year'),
                );
                $sheet->fromArray(array(
                    $head
                ), null, 'A1', false, false);

                //fill student info to excel
                $loop = 2;
                $programs = $this->_viewShare->getPrograms();
                foreach ($results as $result) {
                    $studentArray[0] = $result['student_id'];
                    $studentArray[1] = Html::decode($result['name']);
                    $studentArray[2] = Html::decode($result['last_name']);
                    $studentArray[3] = Html::decode($result['parents_name']);
                    $studentArray[4] = $result['birthdate'];
                    $studentArray[5] = Html::decode($result['birthplace']);
                    $studentArray[6] = Html::decode(lang("labels.sex_names." . $result['sex']));
                    $studentArray[7] = $result['email'];
                    $program = ($result['program_id'] && $result['program_id'] != 0 && isset($programs[$result['program_id']])) ? $programs[$result['program_id']] : '';
                    $studentArray[8] = $program;
                    $studentArray[9] = $result['registration_year'];
                    $sheet->row($loop, $studentArray);
                    $loop++;
                }

                //end of student fill

            });
        })->download('xls');
    }

    /*
     * Generate student id by year
     * */
    public function lastIDByYear(AppRequest $request)
    {
        $year = $request->input('selYear');
        $student = new Students();
        $student_id = $student->studentIDByYear($year);
        if (!$student_id) {
            $student_id = '100001' . $year;
        }
        $student = substr($student_id, 0, -4);
        $student = $student + 1;
        $student_id = $student . $year;
        return $student_id;
    }
}
