<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'type',
        'date',
        'product_id'
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function products() {
        return $this->belongsTo(Product::class);
    }
}
