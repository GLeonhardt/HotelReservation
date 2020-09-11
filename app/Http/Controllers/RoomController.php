<?php

namespace App\Http\Controllers;

use App\Room;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('rooms.index', [
            'rooms' => Room::get()
        ]);
    }

    public function create()
    {
        $hotels = Hotel::latest()->get();
        return view('rooms.create', ['hotels' => $hotels]);
    }

    public function store(Request $request)
    {
        Log::info('User: '.auth()->user()->name .' Creating new Room: ' .request()->getContent());
        Room::create($this->validateRoom());

        return redirect('/rooms');
    }

    public function show(Room $room)
    {
        return view('rooms.show', ['room' => $room]);
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Room $room)
    {
        Log::info('User: '.auth()->user()->name .' Updating Room: ' .$room);
        $room->update($this->validateRoom());

        return redirect('rooms/'. $room->id);
    }

    public function destroy(Room $room)
    {
        Log::info('User: '.auth()->user()->name .' Deleting Room: ' .$room);
        try{
            $room->destroy($room->id);
        }catch(\Exception $ex){
            if(Str::contains($ex->getMessage(), 'foreign key constraint fails'))
                throw ValidationException::withMessages(['delete' => 'It is not possible to delete a room that has already been booked']);
            else
                throw ValidationException::withMessages(['delete' => $ex->getMessage()]);
        }

        return redirect('/rooms');
    }

    protected function validateRoom()
    {
        return request()->validate([
            'room_identifier' => 'required',
            'stars' => 'required|min:1|max:5',
            'price' => 'required',
            'hotel_id' => 'required|exists:hotels,id'
        ]);
    }
}
