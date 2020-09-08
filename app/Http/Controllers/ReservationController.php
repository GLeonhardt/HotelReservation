<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::paginate(10);

        return view('reservations.index', [
            'reservations' => $reservations
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
                    ->where('canceled', 0)
                    ->where(function($query) use($check_in, $check_out) {
                        $query->where('check_in', '>', $check_in)
                              ->where('check_in', '<=', $check_out);
                    })
                    ->orWhere(function($query) use($check_in, $check_out) {
                        $query->where('check_out', '>=', $check_in)
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
        Log::info('User: '.auth()->user()->name .' Creating new reservation: ' .request()->getContent());
        $this->validateReservation();
        $reservation = new Reservation(request(['check_in', 'check_out']));
        $reservation->user_id = auth()->user()->id;
        $reservation->total_price = array_sum( Room::whereIn('id', request('rooms'))->pluck('price')->toArray());

        $reservation->save();

        $reservation->room()->attach(request('rooms'));
    }

    public function show(Reservation $reservation)
    {
        if($reservation->user_id == auth()->user()->id || auth()->user()->admin){
            return view('reservations.show', ['reservation' => $reservation]);
        }
        abort(401);
    }

    public function destroy(Reservation $reservation)
    {
        Log::info('User: '.auth()->user()->name .' Canceling reservation: ' .$reservation);
        if($reservation->user_id == auth()->user()->id || auth()->user()->admin){
            $reservation->canceled = true;
            $reservation->save();
        }else{
            abort(401);
        }
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
