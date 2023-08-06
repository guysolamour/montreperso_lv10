<?php

namespace App\Models;

use Guysolamour\Administrable\Traits\SluggableTrait;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;

class Type extends BaseModel
{
    use ModelTrait;
    use SluggableTrait;

    

    // The attributes that are mass assignable.
    public $fillable = ['name', 'description', 'slug'];

    

    

    

    
    protected $sluggablefield = 'name';



    // add relation methods below

    



    // design relation
    public function designs()
    {
      return $this->hasMany(Design::class);
    }
    // end design relation



    // form relation
    public function forms()
    {
      return $this->hasMany(Form::class);
    }
    // end form relation





}
