<?php

namespace App\Models;

use Guysolamour\Administrable\Traits\SluggableTrait;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;
use Spatie\MediaLibrary\HasMedia;
use Guysolamour\Administrable\Traits\MediaableTrait;

/*
MONTRE
Design
    name
     - montre en cuir
     - montre or plaque
     - montre argente
    type_id

DesignCategory
    name:
     - standard
     - moyenne
     - originale
    price
     - 20 000
     - 25 000
     - 30 000
    design_id

HORLOGE
Design
    name
     - horloge vip
     - horloge mural (ronde, carre, triangle)
    type_id

DesingCategory
    name:
     - standard
     - moyenne
     - originale
    price
     - 20 000
     - 25 000
     - 30 000
    design_id


Watch -> designs -> price

*/

class Index extends BaseModel implements HasMedia
{
    use ModelTrait;
    use SluggableTrait;
    use MediaableTrait;



    // The attributes that are mass assignable.
    public $fillable = ['name', 'description', 'form_id', 'slug'];



    protected $sluggablefield = 'name';


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['images'];



    // add relation methods below

    // watch relation
    public function watches()
    {
      return $this->hasMany(Watch::class);
    }
    // end watch relation



    // form relation
    public function form()
    {
      return $this->belongsTo(Form::class);
    }
    // end form relation





}
