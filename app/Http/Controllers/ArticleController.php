<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Displays the list of all the articles
     *
     */
    public function index()
    {
        return view('article.index', [
            'articles' => Article::all()
        ]);
    }

    /**
     * Displays one article regarding an id
     *
     * @param integer $id
     */
    public function show(int $id)
    {
        return view('article.show', [
            'article' => Article::findOrFail($id)
        ]);
    }

    /**
     * Displays the form for creating an activity
     *
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Stores an activity in the database
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        //TODO add validation for last_edited and created_by | Maybe remove both section if using timestamp
        $validated = $request->validate([
            "title" => "required|max:255",
            "description" => "required|max:499",
            "media" => "nullable|mimes:png,jpg,jpeg,webp"
            /* "last_edited" => "required",
            "created_by" => "required|max:255" */
        ], [
            "title.required" => "The title is required",
            "title.max" => "The title must have a maximum of :max characters",
            "description.required" => "A description is required",
            "description.max" => "The description must have a maximum of :max characters",
            "media.required" => "A media is required",
            "media.mimes" => "The media must have a valid format (png, jpg, jpeg, webp)"
        ]);

        $article = new Article();
        $article->title = $validated["title"];
        $article->description = $validated["description"];

        if ($request->hasFile('media')) {

            Storage::putFile('public/uploads', $request->media);

            $article->media = "/storage/uploads/" . $request->media->hashName();
        }

        $article->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "Article added successfully");
    }

    /**
     * Displays the form for editing an activity
     *
     * @param integer $id
     */
    public function edit(int $id) {}

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
