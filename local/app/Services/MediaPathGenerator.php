<?php

namespace App\Services;

use Spatie\MediaLibrary\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\Media;
use Carbon\Carbon;

class MediaPathGenerator implements PathGenerator
{

    public function getPath(Media $media)
    {
        $model = class_basename($media->model_type);

        $date = Carbon::parse($media->created_at);

        return $model . DIRECTORY_SEPARATOR . $date->year . DIRECTORY_SEPARATOR . $date->month . DIRECTORY_SEPARATOR;
    }


    public function getPathForConversions(Media $media)
    {
        $model = class_basename($media->model_type);
        return $model . DIRECTORY_SEPARATOR . $date->year . DIRECTORY_SEPARATOR . $date->month . DIRECTORY_SEPARATOR . $media->name . DIRECTORY_SEPARATOR;
    }

}