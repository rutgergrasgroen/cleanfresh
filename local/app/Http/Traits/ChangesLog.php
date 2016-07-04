<?php
namespace App\Http\Traits;

trait ChangesLog {

    public function log($module, $description, $referer, $user) {

        $log = new \App\Changes;

        $log->module = $module;
        $log->description = $description;
        $log->referer = $referer;
        $log->user_id = $user->id;
        $log->save();

    }

}