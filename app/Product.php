<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'event_name',
        'stock',
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
        
    
}
