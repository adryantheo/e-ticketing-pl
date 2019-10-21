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
        'type_id',
        'product_id'
    ];

    public function types() {
        return $this->belongsTo(Type::class);
    }

    public function qr_codes() {
        return $this->hasOne(QRCode::class);
    }
}
