<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Displays the list of all the articles
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
     * Displays the form for creating an article
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Handle the addition of an article
     *
     * @param Request $request
     * Done
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "description" => "required|max:499",
            "media" => "required|mimes:png,jpg,jpeg,webp"
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
        Storage::putFile('public/uploads', $request->media);
        $article->media = "/storage/uploads/" . $request->media->hashName();
        $article->created_by = auth()->user()->id;

        $article->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "Article added successfully");
    }

    /**
     * Displays the form for editing an article
     *
     * @param integer $id
     */
    public function edit(int $id) {
        return view('article.edit', [
            "article" => Article::findOrFail($id)
        ]);
    }

    /**
     * Handle the modification of an article
     *
     * @param Request $request
     * Done
     */
    public function update(Request $request) {
        $validated = $request->validate([
            "id" => "required",
            "title" => "required|max:255",
            "description" => "required|max:499",
            "media" => "required|mimes:png,jpg,jpeg,webp"
        ], [
            "id.required" => "The article doesn't exist",
            "title.required" => "The title is required",
            "title.max" => "The title must have a maximum of :max characters",
            "description.required" => "A description is required",
            "description.max" => "The description must have a maximum of :max characters",
            "media.required" => "A media is required",
            "media.mimes" => "The media must have a valid format (png, jpg, jpeg, webp)"
        ]);

        $article = Article::findOrFail($validated["id"]);
        $article->title = $validated["title"];
        $article->description = $validated["description"];

        Storage::putFile('public/uploads', $request->media);
        $article->media = "/storage/uploads/" . $request->media->hashName();

        $article->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "Article updated successfully");
    }

    /**
     * Handle the suppression of an article
     *
     * @param Request $request
     * Done
     */
    public function destroy(Request $request) {
        $article = Article::findOrFail($request->id);

        Article::destroy($article->id);

        return redirect()
                ->route("admin.panel")
                ->with("success", "Article deleted successfully");
    }
}
