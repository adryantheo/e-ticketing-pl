<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name',
        'email',
        'price',
        'quantity',
        'type',
        'is_paid',
        'image',
        'product_id'
    ];

    public function products() {
        return $this->belongsTo(Ticket::class);
    }

    public function qr_codes() {
        return $this->hasOne(QRCode::class);
    }
}
