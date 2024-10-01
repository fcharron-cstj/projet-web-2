<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
class ArtistController extends Controller
{
    /**
     * Handle the addition of a new artist
     *
     * @param Request $request
     *
     * Done
     */
    public function store(Request $request){
        $validated = $request->validate([
            "name" => "required|max:255|unique:artists,name"
        ], [
            "name.required" => "Please enter the name of the artist",
            "name.max" => "The artist name must have a maximum of :max characters",
            "name.unique" => "This artist already exist"
        ]);

        $artist = new Artist();
        $artist->name = $validated["name"];

        $artist->save();

        return redirect()
                ->route('schedules.create')
                ->with('success_adding_artist', "The artist has successfully been added");
    }
}
