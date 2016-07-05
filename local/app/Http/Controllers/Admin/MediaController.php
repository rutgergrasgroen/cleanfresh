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

        

        return view('admin/media/index')
            ->with(['data' => $data]);

    }

    public function upload(Request $request){

        $files = [];

        $media = \App\Media::firstOrNew(['id' => 1]);

        foreach($request->file('files') as $file) {
           $media->addMedia($file)->toCollection('images');
           $files["name"] = $file->getClientOriginalName();
        }

        return response()
            ->json([
                "files" => $files
            ]);

    }



}