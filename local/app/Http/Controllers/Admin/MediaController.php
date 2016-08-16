<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ChangesLog;

class MediaController extends Controller {

    use ChangesLog;

    // ------------------------------------------------------------------
    public function __construct() {

        $this->middleware('auth');

    }

    public function index(){

        $folders = \App\Media::where('model_id', 0)
            ->get();

        return view('admin/media/index')
            ->with([
                'folders' => $folders
            ]);

    }

    public function folder($id){

        $folder = \App\Media::where('id', '=', $id)->first();

        return view('admin/media/folder')
            ->with([
                'folder' => $folder,
                'media' => $folder->getMedia()
            ]);

    }

    public function upload(Request $request){

        $files = [];

        $folderid = $request->input('folderid');

        $media = \App\Media::firstOrNew(['id' => $folderid]);

        foreach($request->file('files') as $file) {

           $media->addMedia($file)->toMediaLibrary();
           $files["name"] = $file->getClientOriginalName();

        }

        return response()
            ->json([
                "files" => $files
            ]);

    }


    public function store(Request $request)
    {

        $media = new \App\Media;

        $validator = Validator::make($request->all(), $media->rules);

        if($validator->fails()) {

            $alert = array(
                'html' => 'De mediamap naam mag niet leeg zijn. Probeer het aub nog een keer en vul dan een mediamap naam in.',
                'class' => 'danger'
            );

            return redirect('cfadmin/Media')
                ->with([
                    'alert' => $alert
                ])
                ->withErrors($validator)
                ->withInput();

        } else {

            $media->name = $request->input('name');
            $media->file_name = $request->input('name');
            $media->save();

            $alert = array(
                'html' => 'Mediamap \''.$media->name.'\' is succesvol toegevoegd.',
                'class' => 'success'
            );

            $this->log(
                'pagina', 
                'Nieuwe mediamap: <b>'.$media->name.'</b>',
                url()->current(),
                auth()->user()
            );

            return redirect()->action('Admin\MediaController@index', $media->id)
                ->with([
                    'alert' => $alert
                ]);

        }

    }

    public function deleteFolder(Request $request)
    {

        $folder = \App\Media::where('id', '=', $request->id)->first();
        $mediaItems = $folder->getMedia();
        $mediaItems->delete();

        return \App\Media::where('id', '=', $request->id)->delete();

    }

    public function deleteMedia(Request $request)
    {

        return \App\Media::where('id', '=', $request->id)->delete();

    }


}