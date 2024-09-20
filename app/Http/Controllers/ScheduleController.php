<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Displays the form for creating a schedule
     *
     */
    public function create() {
        return view('schedule.create', [
            "schedules" => Schedule::all()
        ]);
    }

    /**
     * Stores a schedule in the database
     *
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "activity" => "required|max:255",
            "date" => "required|date"
        ], [
            "activity.required" => "Please enter an activity",
            "activity.max" => "The activity must have less than :max characters",
            "date.required" => "Please select a valid date",
            "date.date" => "The date must be a valid date format"
        ]);

        $schedule = new Schedule();
        $schedule->activity = $validated["activity"];
        $schedule->date = $validated["date"];

        $schedule->save();

        return redirect()
            ->route('adminPanel')
            ->with('success', "Schedule added successfully");
    }

    /**
     * Displays the form for editing a schedule
     *
     * @param integer $id
     */
    public function edit(int $id) {
        return view('schedule.edit', [
            "schedule" => Schedule::findOrFail($id)
        ]);
    }

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
