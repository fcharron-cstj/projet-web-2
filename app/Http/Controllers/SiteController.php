<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Day;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Displays the home page of the site
     */
    public function home()
    {
        return view("home", [
            "days" => Day::with('Activity')->get(),
            "articles" => Article::limit(3)->get(),
        ]);
    }
}
