<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    /**
     * Show the admin page
     */
    public function adminPanel()
    {
        return view("admin.admin-panel", [
            "users" => User::all(),
            "activities" => Activity::with('Day')->get()->all(),
            "articles" => Article::all()
        ]);
    }

    /**
     * Show the user creation form with the possibility to choose a role
     */
    public function create()
    {
        return view("admin.create", [
            "roles" => Role::all()
        ]);
    }

    /**
     * Handle the creation of an user
     *
     * @param Request $request
     * Done
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|unique:users,email|email:strict",
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
            "role_id.required" => "The role is invalid"
        ]);

        $user = new User();
        $user->first_name = $validated["first_name"];
        $user->last_name = $validated["last_name"];
        $user->email = $validated["email"];
        $user->password = Hash::make($validated["password"]);
        $user->role_id = $validated["role_id"];

        $user->save();

        return redirect()
            ->route("admin.panel")
            ->with("success", "Account registration succeeded!");
    }

    /**
     * Displays the edit form of an user
     *
     * @param integer $id
     */
    public function edit(int $id)
    {
        return view("admin.edit", [
            "user" => User::findOrFail($id)
        ]);
    }


    /**
     * Handle the modification of an user
     *
     * @param Request $request
     * Done
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            "id" => "required",
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|email:strict|unique:users,email," . $request->id
        ], [
            "id.required" => "This account doesn't exist",
            "first_name.required" => "First name is required",
            "first_name.max" => "First name must be below :max characters",
            "last_name.required" => "Last name is required",
            "last_name.max" => "Last name must be below :max characters",
            "email.required" => "Email is required",
            "email.unique" => "This email is already chosen. Please enter another email",
            "email.email" => "Email is incorrect. Please enter a valid email"
        ]);

        $user = User::findOrFail($validated["id"]);
        $user->first_name = $validated["first_name"];
        $user->last_name = $validated["last_name"];
        $user->email = $validated["email"];

        $user->save();

        return redirect()
            ->route('admin.panel')
            ->with('success', "The account of " . $user->first_name . " " . $user->last_name . " has been modified");
    }

    /**
     * Handle the deletion of an user
     *
     * @param Request $request
     * Done but missing success message
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);

        User::destroy($user->id);

        return redirect()
            ->route('admin.panel')
            ->with('success', "The account has been deleted");
    }
}
