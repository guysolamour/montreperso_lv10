<?php

namespace App\Models;

use Guysolamour\Administrable\Traits\SluggableTrait;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;

class Design extends BaseModel
{
    use ModelTrait;
    use SluggableTrait;



    // The attributes that are mass assignable.
    public $fillable = ['name', 'description', 'type_id', 'slug'];








    protected $sluggablefield = 'name';



    // add relation methods below

    // watch relation
    public function watches()
    {
      return $this->hasMany(Watch::class);
    }
    // end watch relation



    // designcategory relation
    public function categories()
    {
      return $this->hasMany(DesignCategory::class, 'design_id');
    }
    // end designcategory relation







    // type relation
    public function type()
    {
      return $this->belongsTo(Type::class);
    }
    // end type relation







}
