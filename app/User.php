<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

   
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

  
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsTo(Role::class);
    }

    
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
