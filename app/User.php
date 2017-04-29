<?php

namespace app;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'last_name', 'username', 'email', 'remember_token', 'password', 'birthdate', 'education', 'profession', 'experience', 'img_src', 'cover_image', 'active'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
