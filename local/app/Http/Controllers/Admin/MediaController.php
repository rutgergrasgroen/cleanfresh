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

        $folders = \App\Media::where('parent', 0)
            ->get();

        return view('admin/media/index')
            ->with([
                'folders' => $folders
            ]);

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