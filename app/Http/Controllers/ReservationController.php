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
        //TODO check for arrival date to be before leave date

        $validated = $request->validate([
            "arrival_date" => "required|date",
            "leave_date" => "required|date",
            "bought_tickets_1" => "required|numeric|max:20|min:0",
            "bought_tickets_2" => "required|numeric|max:20|min:0",
            "bought_tickets_3" => "required|numeric|max:20|min:0",
        ], [
            "required" => "Please select a ticket and a date",
            "max" => "You selected too many tickets",
            "numeric" => "Error occured, try again later.",
            "date" => "Error occured, try again later.",
        ]);

        $count = 0;
        foreach (array_slice($validated, 2) as $value) {
            $count += 1;
            if ($value != 0) {
                for ($i = 0; $i < $value; $i++) {
                    $reservation = new Reservation();
                    $reservation->arrival = $request->arrival_date;
                    $reservation->departing = $validated['leave_date'];
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
     * Handle the supression of a reservation
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $reservation = Reservation::findOrFail($request->id);

        Reservation::destroy($reservation->id);

        return redirect()
            ->route('user.show', ['id' => $reservation->user_id])
            ->with('success_deleting_reservation', "The reservation has been deleted successfully");
    }
}
