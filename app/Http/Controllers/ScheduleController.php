<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Displays the form for creating an activity
     * 
     */
    public function create() {}

    /**
     * Stores an activity in the database
     * 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "activity" => "required|max:255",
            "date" => "required|date",
            "artists" => "required|max:255",
        ], [
            //TODO error messages
        ]);

        $schedule = new Schedule();
        $schedule->activity = $validated["activity"];
        $schedule->description = $validated["description"];

        //TODO Artists

        $schedule->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "Schedule added successfully");
    }

    /**
     *  Displays the form for editing an activity
     * 
     */

    public function edit() {}

    /**
     * Updates an activity from the database
     * 
     */
    public function update() {}

    /**
     * Deletes an activity from the database
     *
     */
    public function destroy() {}
}
