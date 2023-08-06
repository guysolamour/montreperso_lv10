<?php

namespace App\Models;

use App\Notifications\Back\CreateWatchNotification;
use Illuminate\Support\Arr;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Guysolamour\Administrable\Traits\MediaableTrait;
use Guysolamour\Administrable\Traits\SluggableTrait;
use Illuminate\Support\Facades\Notification;

class Watch extends BaseModel implements HasMedia
{
    use ModelTrait;
    use SluggableTrait;
    use MediaableTrait;


    // The attributes that are mass assignable.
    public $fillable = [
        'name', 'description', 'form_id', 'index_id', 'index_image_id', 'indicator_id',
         'background_id', 'background_image_id', 'bracelet_id', 'design_id', 'design_category_id',
         'user_id', 'text', 'background_image', 'slug'
        ];

    protected $sluggablefield = 'name';



    public function text() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => is_array($value) ? json_encode($value) : $value,
        );
    }

    public function backgroundImage() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => is_array($value) ? json_encode($value) : $value,
        );
    }


    // add relation methods below

    // design relation
    public function design()
    {
      return $this->belongsTo(Design::class);
    }
    // end design relation

    // index relation
    public function index()
    {
      return $this->belongsTo(Index::class);
    }
    // end index relation

    // indicator relation
    public function indicator()
    {
      return $this->belongsTo(Indicator::class);
    }
    // end indicator relation

    // background relation
    public function background()
    {
      return $this->belongsTo(Background::class);
    }
    // end background relation

    // bracelet relation
    public function bracelet()
    {
      return $this->belongsTo(Bracelet::class);
    }
    // end bracelet relation

    // design form
    public function form()
    {
      return $this->belongsTo(Form::class);
    }
    // end design form

    // designcategory relation
    public function designcategory()
    {
      return $this->belongsTo(DesignCategory::class, 'design_category_id');
    }
    // end designcategory relation

    // user relation
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    // end user relation

     /**
     *
     * @param string|array $data
     * @return array
     */
    public function uploadBackgroundImage($data) :array
    {
        /**
         * @var array
         */
        $data = is_string($data) ? json_decode($data, true) : $data;

        if (!Arr::get($data,'previsualisation')){
            return $data;
        }

        // verifier si image en back et le retirer
        /**
         * @var string
         */
        $previsualisation = Arr::get($data,'previsualisation');

        if (Str::startsWith($previsualisation, 'data:')){

            $media = $this
                ->addMediaFromBase64($previsualisation)
                ->usingName($name = Str::lower(Str::random(20)))
                ->usingFileName($name . '.jpg')
                ->withCustomProperties(['select' => true])
                ->toMediaCollection(config('administrable.media.collections.back.label'))

                ;
             Arr::set($data, 'previsualisation', $media->getFullUrl());
        }

        return $data;
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        parent::booted();

        static::created(function ($watch) {
            Notification::send(get_guard_notifiers(), new CreateWatchNotification($watch));
        });
    }

}
