<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Changes extends Model
{

    public $timestamps = false;

    protected $fillable = array('module', 'description', 'referer', 'user_id');

    public function getDates()
    {
        return array('created_at');
    }

}
