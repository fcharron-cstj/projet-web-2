<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
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
            "title" => "required|max:255",
            "description" => "required|max:499",
            "media" => "required",
        ], [
            //TODO error messages
        ]);

        $article = new Article();
        $article->title = $validated["title"];
        $article->description = $validated["description"];

        if ($request->hasFile('profile_picture')) {

            Storage::putFile('public/uploads', $request->media);

            $article->media = "/storage/uploads/" . $request->media->hashName();
        }

        $article->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "Article added successfully");
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
