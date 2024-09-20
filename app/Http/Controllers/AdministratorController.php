<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    /**
     * Show the admin page
     *
     */
    public function adminPanel(){
        return view("admin-pannel", [
            "users" => User::all(),
            "schedules" => Schedule::all(),
            "articles" => Article::all()
        ]);
    }

    /**
     * Show the user creation form with the possibility to choose a role
     *
     */
    public function create(){
        return view("admin.create");
    }

    /**
     * Handle the creation of an user
     *
     * @param Request $request
     */
    public function store(Request $request){

        $validated = $request->validate([
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|unique:users,email|email",
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password",
            "role_id" => "required"
        ], [
            "first_name.required" => "First name is required",
            "first_name.max" => "First name must be below :max characters",
            "last_name.required" => "Last name is required",
            "last_name.max" => "Last name must be below :max characters",
            "email.required" => "Email is required",
            "email.unique" => "This email is already chosen. Please log-in or choose another email",
            "email.email" => "Email is incorrect. Please enter a valid email",
            "password.required" => "The password is required",
            "password.min" => "Your password must be at least :min characters",
            "password_confirmation.required" => "Please confirm your password",
            "password_confirmation.same" => "The password couldn't be confirmed",
            "role_id" => "The role is invalid"
        ]);

        $admin = User::findOrFail($validated["id"]);
        $admin->first_name = $validated["first_name"] ?? now();
        $admin->last_name = $validated["last_name"] ?? now();
        $admin->email = $validated["email"];
        $admin->password = Hash::make($validated["password"]);

        $admin->save();

        return redirect()
                ->route("admin.index")
                ->with("succes_account_creation", "Account registration succeeded!");

    }

    /**
     * Show the edit page of an user
     *
     * @param integer $id
     */
    public function edit(int $id){
        return view("admin.edit", [
            "user" => User::findOrFail($id)
        ]);
    }

    /* Méthode en POST

    public function edit(Request $request){
        return view("admin.edit", [
            "admin" => User::findOrFail()
        ])
    } */



}