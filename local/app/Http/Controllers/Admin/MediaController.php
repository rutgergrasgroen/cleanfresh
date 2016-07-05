<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller {

    // ------------------------------------------------------------------
    public function __construct() {

        $this->middleware('auth');

    }

    public function index(){

        $data = [];

        $page = \App\Media::firstOrNew(['id' => 1]);
        $page->addMediaFromUrl('http://www.grasgroen.com/cfsystem/layout/images/logo.png')->toCollection('images');

        return view('admin/media/index')
            ->with(['data' => $data]);

    }

    public function upload(Request $request){

        dd($request->all());

        return Response::json(
            array(
                "files" => array(
                    "name" => "post"
                ))
        );

    }



}