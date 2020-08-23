<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hotel;
use App\Reservation;

class Room extends Model
{
    function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
}
