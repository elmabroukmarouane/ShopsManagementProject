<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'role', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function listprefrredshops()
    {
        return $this->hasMany(Listprefrredshop::class);
    }

    public function shopsdislikes()
    {
        return $this->hasMany(Shopsdislike::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
