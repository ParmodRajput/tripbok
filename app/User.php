<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','role', 'password','address','city','country','zip','phone','user_Code','gender'
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

    //logout api
    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }
    /**
    * relation betwwen users and trips
    **/
    public function trips(){
        return $this->hasMany('App\Trip');
    }

    /**
    * relation betwwen users and drivers
    **/
    public function driver(){
        return $this->hasOne('App\Driver');
    }

    public function ratings(){
        return $this->hasMany('App\DriverRating','driver_id');
    }
}
