<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    /**
     * Displays the form for creating a schedule
     *
     * Done
     */
    public function create()
    {
        return view('schedule.create', [
            "schedules" => Schedule::all(),
            "artists" => Artist::all()
        ]);
    }

    /**
     * Handle the addition of a schedule
     *
     * @param Request $request
     *
     * Done
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "activity" => "required|max:255",
            "date" => "required|date",
            "artist" => "required"
        ], [
            "activity.required" => "Please enter an activity",
            "activity.max" => "The activity must have less than :max characters",
            "date.required" => "Please select a date",
            "date.date" => "The date must be a valid date format",
            "artist.required" => "Please select an artist or create a new one"
        ]);

        $schedule = new Schedule();
        $schedule->activity = $validated["activity"];
        $schedule->date = $validated["date"];

        $schedule->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "Schedule added successfully");
    }

    /**
     * Displays the form for editing a schedule
     *
     * @param integer $id
     */
    public function edit(Request $request)
    {
        return view('schedule.edit', [
            "schedule" => Schedule::findOrFail($request->id),
            "artists" => Artist::all()
        ]);
    }

    /**
     * Handle the modification of a schedule
     *
     * @param Request $request
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            "id" => "required",
            "activity" => "required|max:255",
            "date" => "required|date",
            "artist" => "required"
        ], [
            "id.required" => "The schedule doesn't exist",
            "activity.required" => "Please enter an activity",
            "activity.max" => "The activity must have less than :max characters",
            "date.required" => "Please select a valid date",
            "date.date" => "The date must be a valid date format",
            "artist.required" => "Please select an artist or create a new one"
        ]);

        $schedule = Schedule::findOrFail($validated["id"]);
        $schedule->activity = $validated["activity"];
        $schedule->date = $validated["date"];
        $schedule->artist = $validated["artist"];

        $schedule->save();

        return redirect()
            ->route('admin.panel')
            ->with('succes_updating_schedule', "The schedule has been modified");
    }

    /**
     * Handle the suppression of a schedule
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $schedule = Schedule::findOrFail($request->id);

        Schedule::destroy($schedule->id);

        return redirect()
            ->route('admin.panel')
            ->with('succes_deleting_schedule', "The schedule has been deleted");
    }
}
