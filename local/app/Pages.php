<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Pages extends Model implements SluggableInterface
{
    
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    public $rules = [
        'title'     => 'required',
        'template'  => 'required',
    ];

    public function pageBlocks() {  

        return $this->hasMany('App\PagesBlocks', 'page_id', 'id');

    }  

}
