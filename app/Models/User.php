<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Guysolamour\Administrable\Traits\ModelTrait;
use Guysolamour\Administrable\Traits\CommenterTrait;
use Guysolamour\Administrable\Traits\MediaableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Guysolamour\Administrable\Traits\CustomFieldsTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use ModelTrait;
    use HasFactory;
    use Notifiable;
    use CommenterTrait;
    use MediaableTrait;
    use CustomFieldsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'name', 'email', 'password', 'phone_number', 'custom_fields'
    ];

    public $form = \Guysolamour\Administrable\Forms\Back\UserForm::class;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $custom_form_fields = [
        ['name' => 'notify_via_whatsapp', 'type' => 'boolean',  'label' => 'Notification par whatsapp'],
        ['name' => 'cb_whatsapp_apikey',  'type' => 'text',     'label' => 'Clé API notification whatsapp'],
        ['name' => 'cb_whatsapp_number',  'type' => 'text',     'label' => 'Numéro whatsapp notification whatsapp'],
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'custom_fields'     => 'json',
    ];

    public function getAvatarAttribute() :string
    {
        if ($avatar = $this->getFrontImageUrl()){
            return $avatar;
        }

        return Gravatar::get($this->attributes['email']);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // add relation methods below

    // watch relation
    public function watches()
    {
      return $this->hasMany(Watch::class);
    }
    // end watch relation


}
