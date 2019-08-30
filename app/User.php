<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

   
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
