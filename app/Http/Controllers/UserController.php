<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     *  Displays the login or register form
     *
     */
    public function loginOrRegister()
    {
        return view("");
    }

    /**
     *  Stores user information in the database
     *
     */
    public function store(Request $request)
    {
        return view("");
    }

    /**
     *  Authenticates login information with the database
     *
     */
    public function connect()
    {
        return view("");
    }
}
