<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 10/2/2016
 * Time: 6:10 PM
 */


namespace App\ViewShare;
defined('CC') or DIE('no direct access');

use App\Http\Requests\AppRequest;
use Illuminate\Routing\Route;
use App\Helpers\Filter;
use Models\Programs;

class Admin
{
    private $_controller;
    private $_action;

    private $_searchFilters;
    private $_searchKeys;
    private $_programs;

    public function __construct(Route $route, AppRequest $request, $controller = null, $action = null)
    {
        if (!is_null($controller))
            $this->setController($controller);
        if (!is_null($action))
            $this->setAction($action);

    }

    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    public function setAction($action)
    {
        $this->_action = $action;

    }

    public function share()
    {
        if ($this->_action == 'index' || $this->_action == 'export') {
            //share search filter and search keys for students
            $searchFilter = array();
            $filterText = Filter::apply(app('request')->input('text'), 'search');
            $filterYear = Filter::apply(app('request')->input('year'), 'number');
            $searchKeys = null;
            if ($filterText) {
                $searchFilter['text'] = $filterText;
                $searchText = explode(' ', $filterText);
                $searchTexts = '(';
                foreach ($searchText as $k => $v) {
                    $searchTexts .= " name like '%" . $v . "%' or last_name like '%" . $v . "%' or parents_name like '%" . $v . "%' or ";
                }
                $searchTexts = substr($searchTexts, 0, -3);
                $searchTexts .= ') ';
                $searchKeys[] = $searchTexts;
            }


            if ($filterYear) {
                $filterYear = ($filterYear) ?: 0;
                $searchFilter['year'] = $filterYear;
                $searchKeys[] = "registration_year='" . $filterYear . "'";
            }

            if (!is_null($searchKeys))
                $searchKeys = implode(' AND ', $searchKeys);

            $this->_searchFilters = $searchFilter;
            $this->_searchKeys = $searchKeys;

            view()->share('searchFilters', $searchFilter);
            view()->share('searchKeys', $searchKeys);
        }

        //share programs for select in students
        $programsModel = new Programs();
        $programResults = $programsModel->contents(array(), 'program_id,title');
        $programs = [];
        foreach ($programResults as $programResult) {
            $programs[$programResult['program_id']] = $programResult['title'];
        }
        $this->_programs = $programs;
        view()->share('programs', $programs);


    }

    public function getFilters()
    {
        return $this->_searchFilters;
    }

    public function getFilterKeys()
    {
        return $this->_searchKeys;
    }

    public function getPrograms($key = null)
    {
        if (!is_null($key) && isset($this->_programs[$key]))
            return $this->_programs[$key];

        return $this->_programs;
    }


}