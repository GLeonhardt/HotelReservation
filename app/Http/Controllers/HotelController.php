<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        return view('hotels.index', [
            'hotels' => Hotel::get()
        ]);
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store()
    {
        Log::info('User: '.auth()->user()->name .' Creating new Hotel: ' .request()->getContent());
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
        Log::info('User: '.auth()->user()->name .' Updating Hotel: ' .$hotel);
        $hotel->update($this->validateHotel());
        return redirect('/hotels/' . $hotel->id);
    }

    public function destroy(Hotel $hotel)
    {
        Log::info('User: '.auth()->user()->name .' Deleting Hotel: ' .$hotel);
        try{
            $hotel->destroy($hotel->id);
        }catch(\Exception $ex){
            if(Str::contains($ex->getMessage(), 'foreign key constraint fails'))
                throw ValidationException::withMessages(['delete' => "It is not possible to delete a hotel that has registered rooms"]);
            else
                throw ValidationException::withMessages(['delete' => $ex->getMessage()]);
        }
// 
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
