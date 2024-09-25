<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Handle the addition of a reservation
     *
     */
    public function store(Request $request)
    {
        //TODO

        dd($request['bought-tickets']);

        // $reservation = new Reservation();
        // $reservation->activity = $validated["activity"];
        // $reservation->date = $validated["date"];

        // $reservation->save();

        // return redirect()
        //     ->route('adminPanel')
        //     ->with('success', "reservation added successfully");
    }

    /**
     * Handle the modificaiton of a reservation
     *
     * @param Request $request
     */
    public function update(Request $request){

    }
}
