<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return view('hotels.index', [
            'hotels' => Hotel::paginate(5)
        ]);
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store()
    {
        Hotel::create($this->validateHotel());

        return redirect('/hotels');
    }

    public function show(Hotel $hotel)
    {
        return view('hotels.show', [
            'hotel' => $hotel
        ]);
    }

    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Hotel $hotel)
    {
        $hotel->update($this->validateHotel());
        return redirect('/hotels/' . $hotel->id);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->destroy($hotel->id);

        return redirect('/hotels');
    }

    protected function validateHotel()
    {
        return request()->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
    }
}
