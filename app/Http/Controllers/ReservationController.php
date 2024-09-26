<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Stores a reservation in the database
     * 
     */
    public function store(Request $request)
    {
        //TODO

        $ticket1 = $request['bought_tickets_1'];
        $ticket2 = $request['bought_tickets_2'];
        $ticket3 = $request['bought_tickets_3'];

        dd($ticket1, $ticket2, $ticket3);

        $validated = $request->validate([
            "bought_tickets_1" => "required|numeric|max:20",
            "bought_tickets_2" => "required|numeric|max:20",
            "bought_tickets_3" => "required|numeric|max:20",
        ], [
            "required" => "No ticket selected",
            "max" => "The title must have a maximum of :max characters",
            "numeric" => "A description is required",

        ]);

        // $reservation = new Reservation();
        // $reservation->activity = $validated["activity"];
        // $reservation->date = $validated["date"];

        // $reservation->save();

        // return redirect()
        //     ->route('adminPanel')
        //     ->with('success', "reservation added successfully");
    }
}
