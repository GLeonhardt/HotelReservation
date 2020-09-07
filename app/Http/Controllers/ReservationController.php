<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(100);

        return view('reservations.index', [
            'rooms' => $rooms
        ]);
    }

    public function create(Request $request)
    {
        $check_in = $request->query('check_in');
        $check_out = $request->query('check_out');
        
        if(!is_null($check_in)  and !is_null( $check_out) ){

            $rooms = Room::whereNotIn('id', function ($query) use($check_in, $check_out) {
                $query->select('room_id')
                    ->from('reservations')
                    ->join('reservation_room', 'reservations.id','=', 'reservation_room.reservation_id')
                    ->whereColumn('room_id', 'rooms.id')
                    ->where(function($query) use($check_in, $check_out) {
                        $query->where('check_in', '>', $check_in)
                              ->where('check_in', '<', $check_out);
                    })
                    ->orWhere(function($query) use($check_in, $check_out) {
                        $query->where('check_out', '>', $check_in)
                              ->where('check_out', '<', $check_out);
                    });
                    
            })->get();
        }else{
            $rooms = [];
        }


        return view('reservations.create', [
            'rooms' => $rooms
        ]);
    }

    public function store(Request $request)
    {
        $this->validateReservation();
        $reservation = new Reservation(request(['check_in', 'check_out']));
        $reservation->user_id = 1;
        $reservation->total_price = array_sum( Room::whereIn('id', request('rooms'))->pluck('price')->toArray());

        $reservation->save();

        $reservation->room()->attach(request('rooms'));
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', ['reservation' => $reservation]);
    }

    public function edit(Reservation $reservation)
    {
    }

    public function update(Request $request, Reservation $reservation)
    {
    }

    public function destroy(Reservation $reservation)
    {
    }

    protected function validateReservation()
    {
        return request()->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after_or_equal:check_in',
            'rooms' => 'required|exists:rooms,id'
        ]);
    }

    protected function sumProperties(object $req, $property)
    {
        $sum = 0;
        foreach($req->rooms as $room){
            dd($room);
            $sum += $room->price;
        }
        dd($sum);
    }
}
