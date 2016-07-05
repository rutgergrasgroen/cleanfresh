<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DateTime;
use Carbon\Carbon;

class AdminController extends Controller
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

        //Carbon::setLocale('nl');

        $changes = \App\Changes::limit(20)->get();

        return view('admin/dashboard')
            ->with([
                'user' => auth()->user(),
                'changes' => $changes
            ]);

    }
}

