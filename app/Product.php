<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'is_premium',
        'stock',
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class);

    }
        
    
}
