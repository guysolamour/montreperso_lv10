<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Database\Factories\AdminFactory;
use Illuminate\Notifications\Notifiable;
use Creativeorange\Gravatar\Facades\Gravatar;
use Guysolamour\Administrable\Traits\ModelTrait;
use Guysolamour\Administrable\Traits\CommenterTrait;
use Guysolamour\Administrable\Traits\MediaableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Guysolamour\Administrable\Notifications\Back\Auth\VerifyEmail;
use Guysolamour\Administrable\Notifications\Back\Auth\ResetPassword;


class Admin extends Authenticatable implements HasMedia
{
    use HasRoles;
    use HasFactory;
    use Notifiable;
    use ModelTrait;
    use MediaableTrait;
    use CommenterTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'first_name', 'last_name', 'email', 'password','avatar',
        'facebook', 'twitter','linkedin','phone_number','website','about'
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
    ];

     /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory()
    {
        return AdminFactory::new();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Get the admin's full name.
     *
     * @return string
     */
    public function getFullNameAttribute() :string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the admin's name.
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "{$this->first_name} " . strtoupper($this->last_name);
    }


    /**
     * Get the admin's role.
     *
     * @return string|null
     */
    public function getRoleAttribute() :?string
    {
        return $this->roles->first()?->name;
    }

    /**
     * Get the admin's avatar.
     *
     * @return string
     */
    public function getAvatarAttribute() :string
    {
        return $this->getFrontImageUrl();
    }



    /**
     * Set the avatar with gravatar service before saving and updating
     *
     * @param  mixed $value
     *
     * @return void
     */
    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = is_null($value) ? Gravatar::get($this->attributes['email']) : $value;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function getRouteKeyName()
    {
      return 'pseudo';
    }


    // add relation methods below

}
