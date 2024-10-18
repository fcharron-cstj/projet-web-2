<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Activity;
use App\Models\Day;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Displays all the activities
     */
    public function index()
    {
        return view('activity.index', [
            "activities" => Activity::orderBy('date')->get(),
            "days" => Day::all()
        ]);
    }

    /**
     * Displays the form for creating an Activity
     */
    public function create()
    {
        return view('activity.create', [
            "activities" => Activity::all(),
            "days" => Day::all()
        ]);
    }

    /**
     * Handle the addition of an Activity
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "artists" => "required|max:255",
            "date" => "required|numeric",
            "hour" => 'required|date_format:H:i',
            "media" => "nullable|mimes:png,jpg,jpeg,webp"

        ], [
            "title.required" => "Please enter the title",
            "title.max" => "The title must have less than :max characters",
            "artists.required" => "Please enter the artist(s)",
            "artist.max" => "Artists must have less than :max characters",
            "date.required" => "Please select a date and an hour for the activity",
            "hour.required" => "Please select a date and an hour for the activity",
            "hour.date_format" => "The hour must be a valid format (H:i)",
            "media.mimes" => "The media must have a valid format (png, jpg, jpeg, webp)"
        ]);

        $date = date('Y-m-d', strtotime(Day::findOrFail($validated["date"]))) . ' ' . $validated["hour"];

        $activity = new Activity();
        $activity->title = $validated["title"];
        $activity->artists = $validated["artists"];
        $activity->date = $date;



        if ($request->hasFile('media')) {

            Storage::putFile('public/uploads', $request->media);

            $activity->media = "/storage/uploads/" . $request->media->hashName();
        } else {
            $activity->media = "medias/ai-festival-img.webp";
        }

        $activity->save();

        //Attach the day to the activity
        $activity->Day()->attach(Day::findOrFail($validated["date"]));

        return redirect()
            ->route('admin.panel')
            ->with('success', "Activity added successfully");
    }

    /**
     * Displays the form for editing an Activity
     *
     * @param integer $id
     */
    public function edit(int $id)
    {
        return view('Activity.edit', [
            "activity" => Activity::with("Day")->findOrFail($id),
            "days" => Day::all()
        ]);
    }

    /**
     * Handle the modification of an Activity
     *
     * @param Request $request
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            "id" => "required|numeric",
            "title" => "required|max:255",
            "artists" => "required|max:255",
            "date" => "required|numeric",
            "hour" => 'required|date_format:H:i',
            "media" => "nullable|mimes:png,jpg,jpeg,webp"

        ], [
            "title.required" => "Please enter the title",
            "title.max" => "The title must have less than :max characters",
            "artists.required" => "Please enter the artist(s)",
            "artist.max" => "Artists must have less than :max characters",
            "date.required" => "Please select a date and an hour for the activity",
            "hour.required" => "Please select a date and an hour for the activity",
            "hour.date_format" => "The hour must be a valid format (H:i)",
            "media.mimes" => "The media must have a valid format (png, jpg, jpeg, webp)"
        ]);

        $date = date('Y-m-d', strtotime(Day::findOrFail($validated["date"]))) . ' ' . $validated["hour"];

        $activity = Activity::findOrFail($validated["id"]);
        $activity->title = $validated["title"];
        $activity->artists = $validated["artists"];
        $activity->date = $date;

        if ($request->hasFile('media')) {

            Storage::putFile('public/uploads', $request->media);

            $activity->media = "/storage/uploads/" . $request->media->hashName();
        }

        $activity->save();

        $activity->Day()->detach();
        //Attach the day to the activity
        $activity->Day()->attach(Day::findOrFail($validated["date"]));

        return redirect()
            ->route('admin.panel')
            ->with('success', "The Activity has been modified");
    }

    /**
     * Handle the suppression of an Activity
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $Activity = Activity::findOrFail($request->id);

        Activity::destroy($Activity->id);

        return redirect()
            ->route('admin.panel')
            ->with('succes', "The Activity has been deleted");
    }
}
