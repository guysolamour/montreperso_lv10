<?php

namespace App\Models;

use Guysolamour\Administrable\Traits\SluggableTrait;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;
use Spatie\MediaLibrary\HasMedia;
use Guysolamour\Administrable\Traits\MediaableTrait;

class Bracelet extends BaseModel implements HasMedia
{
    use ModelTrait;
    use SluggableTrait;
    use MediaableTrait;

    

    // The attributes that are mass assignable.
    public $fillable = ['name', 'value', 'description', 'slug'];

    

    

    

    
    protected $sluggablefield = 'name';



    // add relation methods below

    // watch relation
    public function watches()
    {
      return $this->hasMany(Watch::class);
    }
    // end watch relation





}
