<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name',
        'email',
        'price',
        'qr_code',
        'is_vip'
    ];
}
