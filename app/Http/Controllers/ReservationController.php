<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Handle the addition of a reservation
     *
     */
    public function store(Request $request)
    {
        //TODO add dates

        $validated = $request->validate([
            "bought_tickets_1" => "required|numeric|max:20",
            "bought_tickets_2" => "required|numeric|max:20",
            "bought_tickets_3" => "required|numeric|max:20",
        ], [
            "required" => "No ticket selected",
            "max" => "You selected too many tickets",
            "numeric" => "Error occured, try again later.",
        ]);

        $count = 0;
        foreach ($validated as $value) {
            $count += 1;
            if ($value != 0) {
                for ($i = 0; $i < $value; $i++) {
                    $reservation = new Reservation();
                    $reservation->arrival = now();
                    $reservation->departing = now();
                    $reservation->package_id = $count;
                    $reservation->user_id = $request->user()->id;
                    $reservation->save();
                }
            }
        }

        return redirect()
            ->route('user.show', ['id' => $request->user()->id])
            ->with('success', "Reservation added successfully");
    }

    /**
     * Handle the modificaiton of a reservation
     *
     * @param Request $request
     */
    public function update(Request $request) {}
}
