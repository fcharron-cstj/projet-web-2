<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Schedule;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Displays the home page of the site
     */
    public function home()
    {
        return view("home", [
            "schedules" => Schedule::get(),
            "articles" => Article::get()->all(),
        ]);
    }
}
