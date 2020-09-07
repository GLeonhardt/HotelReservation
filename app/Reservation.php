<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Room;

class Reservation extends Model
{

    protected $fillable = ['check_in', 'check_out'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function room()
    {
        return $this->belongsToMany(Room::class);
    }
}
