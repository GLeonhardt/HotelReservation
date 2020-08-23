<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;

class Hotel extends Model
{
    function room()
    {
        return $this->hasMany(Room::class);
    }
}
