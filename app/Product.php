<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'event_name',
        // 'date',
        'time',
        'place',
        'organizer_name',
        'stock',
    ];

    public function types() {
        return $this->hasMany(Type::class);
    }
        
    
}
