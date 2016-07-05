<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MediaFilesRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {

        return [
            'upl'   => 'required|image|mimes:jpeg,bmp,png,gif|max:2000', // 2 Megas

        ];
    }

    public function messages() {
        return [
            'upl.required'              =>  'You have to upload some file',
            'upl.max'                     =>    '2MB max size',
            'upl.mimes'                   =>    'Not a valid file'
        ];
    }

}
