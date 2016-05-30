<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    
    public function show($slug)
    {

        $page = \App\Pages::where('slug', '=', $slug)->first();

        if(count($page) == 0) 
        {
            abort(404);
        }

        return view('page')
                ->with('page', $page);


    }

}
