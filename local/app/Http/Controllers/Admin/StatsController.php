<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelAnalytics;

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
    public function index()
    {

        $data = LaravelAnalytics::getVisitorsAndPageViews(7);

        return view('admin/stats')
            ->with('data', $data);
    }


}

