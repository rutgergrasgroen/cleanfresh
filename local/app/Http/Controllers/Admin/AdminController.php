<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DateTime;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $user = \App\User::where('email', '=', 'rutger@grasgroen.com')->first();

        if(count($user) == 0) 
        {

            \App\User::insert([
                'name'       => 'Rutger',
                'email'      => 'rutger@grasgroen.com',
                'password'   => \Hash::make('welkom01'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);

        }

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        return view('admin/dashboard')
            ->with('user', $user);
    }
}

