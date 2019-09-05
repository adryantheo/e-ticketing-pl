<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    protected $fillable = [
        'qr_code',
        'is_checkin',
        'ticket_id'
    ];

    public function tickets() {
        return $this->belongsTo(Ticket::class);
    }
}
