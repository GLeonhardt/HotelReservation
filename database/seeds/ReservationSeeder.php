<?php

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation = factory(App\Reservation::class, 3)->create()->each(function ($reservation) {

                // Create Models Support
                $room = factory(\App\Room::class)->create();
                
                // Create Pivot with Parameters
                $reservation->room()->attach($room->id);
            });;
    }
}
