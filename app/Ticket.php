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
        'quantity',
        'is_vip',
        'is_checkin',
        'product_id'
    ];

    public function products() {
        return $this->belongsTo(Ticket::class);

    }
}
