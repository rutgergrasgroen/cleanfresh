<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelAnalytics;
use DateTime;

class StatsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $now = new DateTime();

        if($request->year == $now->format('Y')-1) {
            $months = range(01, 12);
        } else {
            $months = range(01, $now->format('n'));
        }

        $years = range($now->format('Y')-1, $now->format('Y'));

        if(isset($request->month)) {
            $filterMonth = $request->month;
        } else {
            $filterMonth = $now->format('m');
        }

        if(isset($request->year)) {
            $filterYear = $request->year;
        } else {
            $filterYear = $now->format('Y');
        }

        $numDays = cal_days_in_month(CAL_GREGORIAN, $filterMonth, $filterYear);

        $startDate = new DateTime($filterYear ."-". $filterMonth ."-01");
        $endDate = new DateTime($filterYear ."-". $filterMonth ."-". $numDays);

        $data['visitors'] = LaravelAnalytics::getVisitorsAndPageViewsForPeriod($startDate, $endDate);

        return view('admin/stats')
            ->with([
                'data'=> $data,
                'months'=> $months,
                'years'=> $years,
                'filterMonth'=> $filterMonth,
                'filterYear'=> $filterYear
            ]);
    }


}

