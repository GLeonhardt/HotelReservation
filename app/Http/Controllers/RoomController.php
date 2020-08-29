<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;


class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();

        return view('rooms.index', [
            'rooms' => Room::paginate(10)
        ]);
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        Room::create($this.validateRoom());

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

    public function update(Request $request, Room $room)
    {
        $room->update($this->validateRoom());

        return redirect('rooms/'. $room.id);
    }

    public function destroy(Room $room)
    {
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

    protected function validateRoom(){
        return request()->validate([
            'room_identifier' => 'required',
            'stars' => 'required|min:1|max:5',
            'hotel_id' => 'required|exists:hotels'
        ]);
    }
}
