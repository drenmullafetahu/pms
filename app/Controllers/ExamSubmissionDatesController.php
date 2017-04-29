<?php

namespace Controllers;
defined('CC') or DIE('no direct access');

use App\Http\Requests\AppRequest;
use Illuminate\Routing\Route;
use Models\ExamSubmissionDates;
use Carbon\Carbon;
use App\ViewShare\Staff as ViewShare;

use Session;
use Html;

class ExamSubmissionDatesController extends MainController
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

    public function store(AppRequest $request)
    {

        $inputs = $request->all();
        ExamSubmissionDates::create($inputs);
        Session::flash('Exam_sub_dates_cretad', 'Afati u shtua me sukses');


        return redirect(http_employee('/submissions/create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


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

        //$submission = ExamSubmissionDates::findOrFail($id);
        $submission = new ExamSubmissionDates();
        $submission->updateTerms($id, $inputs);
//        $submission = ExamSubmissionDates::where('id', $id)->firstOrFail();

//        $submission->update($inputs);


        Session::flash('submission_updated', "Afati u rifreskua me skuses");
        return redirect(http_employee('/submissions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $submissions = ExamSubmissionDates::findOrFail($id);
        $submissions->delete();
//        $exams = Exams::findOrFail($id);
//        $exams->delete();

        return http_employee('/submissions');

        Session::flash('submission_deleted', "Afati u fshi me sukses");

    }
}
