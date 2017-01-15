<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    public static $ROLE_USER = 1;
    public static $ROLE_ADMIN = 10;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'gender', 'email', 'password',
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
     * Get user posts
     */
    public function posts()
    {
        return $this->hasMany('App\NewsFeedPost');
    }


    /**
     * Get user files
     */
    public function files()
    {
        return $this->hasMany('App\FileUpload');
    }

}
