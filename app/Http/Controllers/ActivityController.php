<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Displays the form for creating a Activity
     *
     * Done
     */
    public function create()
    {
        return view('activity.create', [
            "activities" => Activity::all()
        ]);
    }

    /**
     * Handle the addition of a Activity
     *
     * @param Request $request
     *
     * Done
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "artists" => "required|nullable|max:255",
            "hour" => "required|date",

        ], [
            "title.required" => "Please enter the title",
            "title.max" => "The title must have less than :max characters",
            "artists.required" => "Please enter the artist(s)",
            "artist.max" => "Artists must have less than :max characters",
            "hour.required" => "Please enter the hour",
            "hour.date" => "The hour must be a valid date format",
        ]);

        $activity = new Activity();
        $activity->title = $validated["title"];
        $activity->artists = $validated["artists"];
        $activity->hour = $validated["hour"];

        if ($request->hasFile('media')) {

            Storage::putFile('public/uploads', $request->media);

            $activity->media = "/storage/uploads/" . $request->media->hashName();
        } else {
            $activity->media = "/public/medias/default-activity.jpg";
        }

        $activity->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "Activity added successfully");
    }

    /**
     * Displays the form for editing a Activity
     *
     * @param integer $id
     */
    public function edit(Request $request)
    {
        return view('Activity.edit', [
            "Activity" => Activity::findOrFail($request->id),
        ]);
    }

    /**
     * Handle the modification of a Activity
     *
     * @param Request $request
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "artists" => "required|nullable|max:255",
            "hour" => "required|date",

        ], [
            "title.required" => "Please enter the title",
            "title.max" => "The title must have less than :max characters",
            "artists.required" => "Please enter the artist(s)",
            "artist.max" => "Artists must have less than :max characters",
            "hour.required" => "Please enter the hour",
            "hour.date" => "The hour must be a valid date format",
        ]);

        $activity = Activity::findOrFail($validated["id"]);
        $activity->title = $validated["title"];
        $activity->artists = $validated["artists"];
        $activity->hour = $validated["hour"];

        if ($request->hasFile('media')) {

            Storage::putFile('public/uploads', $request->media);

            $activity->media = "/storage/uploads/" . $request->media->hashName();
        }

        $activity->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "The Activity has been modified");
    }

    /**
     * Handle the suppression of a Activity
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $Activity = Activity::findOrFail($request->id);

        Activity::destroy($Activity->id);

        return redirect()
            ->route('admin.panel')
            ->with('succes_deleting_Activity', "The Activity has been deleted");
    }
}
