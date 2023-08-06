<?php

namespace App\Models;

use Guysolamour\Administrable\Traits\SluggableTrait;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;
use Spatie\MediaLibrary\HasMedia;
use Guysolamour\Administrable\Traits\MediaableTrait;

class Form extends BaseModel implements HasMedia
{
    use ModelTrait;
    use SluggableTrait;
    use MediaableTrait;



    // The attributes that are mass assignable.
    public $fillable = ['slug','type_id','name', 'description', 'slug'];




    protected $sluggablefield = 'name';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image'];






    // add relation methods below

    // type relation
    public function type()
    {
      return $this->belongsTo(Type::class);
    }
    // end type relation





    // index relation
    public function index()
    {
      return $this->hasMany(Index::class);
    }
    // end index relation







}
