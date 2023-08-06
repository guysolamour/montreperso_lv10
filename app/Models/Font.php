<?php

namespace App\Models;

use Guysolamour\Administrable\Traits\SluggableTrait;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;

class Font extends BaseModel
{
    use ModelTrait;
    use SluggableTrait;

    

    // The attributes that are mass assignable.
    public $fillable = ['name', 'description', 'slug'];

    

    

    

    
    protected $sluggablefield = 'name';



    // add relation methods below



}
