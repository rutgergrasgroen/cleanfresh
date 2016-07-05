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
            $months = range(1, 12);
        } else {
            $months = range(1, $now->format('n'));
        }

        $years = range($now->format('Y')-1, $now->format('Y'));

        if(isset($request->month)) {
            $filterMonth = $request->month;
        } else {
            $filterMonth = $now->format('n');
        }

        if(isset($request->year)) {
            $filterYear = $request->year;
        } else {
            $filterYear = $now->format('Y');
        }

        $numDays = cal_days_in_month(CAL_GREGORIAN, $filterMonth, $filterYear);

        $startDate = new DateTime($filterYear ."-". $filterMonth ."-01");
        $endDate = new DateTime($filterYear ."-". $filterMonth ."-". $numDays);

        $monthsArray = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maart',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Augustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'December'
        ];

        $data['visitors'] = LaravelAnalytics::getVisitorsAndPageViewsForPeriod($startDate, $endDate);
        $data['keywords'] = LaravelAnalytics::getTopKeyWordsForPeriod($startDate, $endDate);
        $data['referrers'] = LaravelAnalytics::getTopReferrersForPeriod($startDate, $endDate, 30);
        $data['browsers'] = LaravelAnalytics::getTopBrowsersForPeriod($startDate, $endDate, 30);
        $data['pages'] = LaravelAnalytics::getMostVisitedPagesForPeriod($startDate, $endDate);

        //echo "<pre>";
        //print_r($data['pages']);
        //echo "</pre>";

        return view('admin/stats')
            ->with([
                'data'=> $data,
                'months'=> $months,
                'years'=> $years,
                'filterMonth'=> $filterMonth,
                'filterYear'=> $filterYear,
                'monthsArray' => $monthsArray
            ]);
    }


}

