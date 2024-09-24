<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(){
        return view('article.index', [
            'articles' => Article::all()
        ]);
    }

    /**
     * Displays the form for creating an activity
     *
     */
    public function create() {
        return view('article.create');
    }

    /**
     * Stores an activity in the database
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "description" => "required|max:499",
            "media" => "required|mimes:png,jpg,jpeg,webp",
            "last_edited" => "required",
            "created_by" => "required|max:255"
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
