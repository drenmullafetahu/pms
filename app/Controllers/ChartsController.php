<?php
/**
 * Created by PhpStorm.
 * User: Dren
 * Date: 3/30/2017
 * Time: 7:32 PM
 */

namespace Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartsController extends MainController
{
    public function getPersonalizedMonthly()
    {
        $user = Auth::user()->id;
        $result = objectToArray(DB::select("
        SELECT  Monthname(due_date) as month,
        (SELECT Count(status_id)  FROM `tasks` where status_id=1 and assigned_to = 2) as notstarted,
        (SELECT Count(status_id)  FROM `tasks` where status_id=3 and assigned_to = 2) as doing,
        (SELECT Count(status_id)  FROM `tasks` where status_id=5 and assigned_to = 2) as completed
        from tasks
        where assigned_to = 2
        GROUP by Year(due_date), Monthname(due_date) order by Year(due_date)

        "));
        return ($result);
    }

    public function getPersonalizedMonthly_notStarted()
    {
        $user = Auth::user()->id;
        $result = objectToArray(DB::select("SELECT  Monthname(due_date) as month, Count(status_id) as notstarted ,Year(due_date) as year FROM `tasks` where status_id=1 and assigned_to = $user GROUP by Year(due_date), Monthname(due_date) order by Year(due_date)
    "));
        return ($result);
    }

    public function getPersonalizedMonthly_InProgress()
    {
        $user = Auth::user()->id;
        $result = objectToArray(DB::select("SELECT  Monthname(due_date) as month, Count(status_id) as doing FROM `tasks` where status_id=3 and assigned_to = $user GROUP by Year(due_date), Monthname(due_date) order by Year(due_date)
    "));
        return ($result);
    }

    public function getPersonalizedMonthly_Completed()
    {
        $user = Auth::user()->id;
        $result = objectToArray(DB::select("SELECT  Monthname(due_date) as month,Year(due_date) as year, Count(status_id) as completed FROM `tasks` where status_id=5 and assigned_to = $user GROUP by Year(due_date), Monthname(due_date) order by Year(due_date)
    "));
        return ($result);
    }

    public function getPersonalizedMonthlyCompared_notStarted()
    {
        $user = Auth::user()->id;
        $result = objectToArray(DB::select("SELECT  Monthname(due_date) as month, Count(status_id) as notstarted ,Year(due_date) as year FROM `tasks` where status_id=1 and assigned_to = $user GROUP by Year(due_date), Monthname(due_date) order by Year(due_date)
    "));
        return ($result);
    }

}