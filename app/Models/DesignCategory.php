<?php

namespace App\Models;

use Guysolamour\Administrable\Traits\SluggableTrait;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;

class DesignCategory extends BaseModel
{
    use ModelTrait;
    use SluggableTrait;



    // The attributes that are mass assignable.
    public $fillable = ['name', 'price', 'description', 'design_id', 'slug'];








    protected $sluggablefield = 'name';



    // add relation methods below

    // watch relation
    public function watches()
    {
      return $this->hasMany(Watch::class);
    }
    // end watch relation



    // design relation
    public function design()
    {
      return $this->belongsTo(Design::class);
    }
    // end design relation







}
