<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class PagesController extends Controller
{
    
    public function show($slug)
    {

        $slugs = explode("/", $slug);

        $depth = count($slugs);

        $page = \App\Pages::where('slug', '=', $slug)
            ->where('depth', '=', $depth-1)
            ->first();

        if(count($page) == 0) 
        {
            abort(404);
        }

        return view('templates/page')
                ->with('page', $page);


    }

}
