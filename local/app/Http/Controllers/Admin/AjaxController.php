<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\UrlGenerator;
use Redirect;
use Auth;
use App\Http\Requests\MediaFilesRequest;
use App\Http\Requests\MediaFilesDeleteRequest;
use Config;
use File;
use Media;
use Image;

class AjaxController extends Controller {

    protected $url;

    // ------------------------------------------------------------------
    public function __construct(UrlGenerator $url) {

        $this->url = $url;
        $this->middleware('isAjax');
        $this->middleware('isAdmin');
    }

    public function index(MediaFilesRequest $request){

        $file = $request->file('upl');

        if(!$file->isValid()){
            return abort(405);
        }

        if(!file_exists(public_path(Config::get('jmedia.upload_path')))){
            File::makeDirectory(public_path(Config::get('jmedia.upload_path')), 0777,true);
        }

        if(!file_exists(public_path(Config::get('jmedia.upload_path').'/'.Config::get('jmedia.thumbnail_directory')))){
            File::makeDirectory(public_path(Config::get('jmedia.upload_path').'/'.Config::get('jmedia.thumbnail_directory')), 0777,true);
        }

        $name = md5(uniqid()).$file->getClientOriginalName();
        $request->file('upl')->move(public_path(Config::get('jmedia.upload_path')), $name.'.'.$file->getClientOriginalExtension());

        $create = Media::create([
            'name'          => $name,
            'path'          => Config::get('jmedia.upload_path'),
            'description'   => '',
            'ext'           => $file->getClientOriginalExtension(),
            'status'        => 'A'
        ]);

        $width  = Config::get('jmedia.width_thumbnail');
        $height = Config::get('jmedia.height_thumbnail');

        $image = Image::make(Config::get('jmedia.upload_path').'/'.$name.'.'.$file->getClientOriginalExtension());
        $path = public_path(Config::get('jmedia.upload_path').'/'.Config::get('jmedia.thumbnail_directory'));

        $image->resize($width,$height);
        $image->save($path.'/'.$name.$width.'x'.$height.'.'.$file->getClientOriginalExtension());


        return $create->toJson();

    }


    public function delete_image(MediaFilesDeleteRequest $request){

        $error = [];
        $request->get('ref');

        $file  =Media::find($request->get('ref'));
        $width  = Config::get('jmedia.width_thumbnail');
        $height = Config::get('jmedia.height_thumbnail');

        $file_deleted = File::delete(public_path(Config::get('jmedia.upload_path').'/'.$file->name.'.'.$file->ext));

        if($file_deleted){
            // Once deleted the file, then we must delete the thumbnail

            $thumb_delete = File::delete(public_path(Config::get('jmedia.upload_path').'/'.Config::get('jmedia.thumbnail_directory').'/'.$file->name.$width.'x'.$height.'.'.$file->ext));
            if(!$thumb_delete){
                $error['thumb'] = 'Thumbnail couldn\'t be deleted, delete it manually or check permissions.';
            }

        }else{
            $error['file'] = 'File couldn\t be deleted, try it manually or check permissions.';
        }

        $file->delete();

        if(count($error) > 0){
            return $error->toJson();
        }
    }

}