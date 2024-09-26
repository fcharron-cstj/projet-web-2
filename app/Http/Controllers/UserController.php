<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     *  Displays the login and/or register form
     *
     */
    public function loginOrRegister()
    {
        return view("user.login-register");
    }

    /**
     *  Authenticates the login information
     *
     *  @param Request $request
     */
    public function authentication(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8"
        ], [
            "email.required" => "Please enter your email address",
            "email.email" => "Email is invalid",
            "password.required" => "Password is required",
            "password.min" => "Your password must be at least :min characters."
        ]);

        if (! Auth::attempt($validated)) {
            return back()
                ->with('error', "Information entered is incorrect. Please try again.");
        }

        $request->session()->regenerate();

        return redirect()
            ->intended(route('home'))
            ->with('success', "Welcome back!");
    }

    /**
     *  Handle the creation of a user
     *
     *  @param Request $request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|unique:users,email|email",
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password"
        ], [
            "first_name.required" => "Full name is required",
            "first_name.max" => "First name must be below :max characters",
            "last_name.required" => "Full name is required",
            "last_name.max" => "Last name must be below :max characters",
            "email.required" => "Email is required",
            "email.unique" => "This email is already chosen. Please log-in or choose another email",
            "email.email" => "Email is incorrect",
            "password.required" => "The password is required",
            "password.min" => "Your password must be at least :min characters",
            "password_confirmation.required" => "Please confirm your password",
            "password_confirmation.same" => "Password confirmation is incorrect"
        ]);

        $user = new User();
        $user->first_name = $validated["first_name"];
        $user->last_name = $validated["last_name"];
        $user->email = $validated["email"];
        $user->role_id = Role::where('title', 'client')->first()->id;

        $user->password = Hash::make($validated["password"]);

        $user->save();

        Auth::login($user);

        return redirect()
            ->route('home')
            ->with('success', "Registered successfully");
    }

    /**
     * Displays the form to modify an user
     *
     * @param integer $id
     */
    public function edit(int $id)
    {
        return view('user.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            "id" => "required",
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|unique:users,email|email",
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password"
        ], [
            "id.required" => "The user doesn't exist",
            "first_name.required" => "Full name is required",
            "first_name.max" => "First name must be below :max characters",
            "last_name.required" => "Full name is required",
            "last_name.max" => "Last name must be below :max characters",
            "email.required" => "Email is required",
            "email.unique" => "This email is already chosen. Please log-in or choose another email",
            "email.email" => "Email is incorrect",
            "password.required" => "The password is required",
            "password.min" => "Your password must be at least :min characters",
            "password_confirmation.required" => "Please confirm your password",
            "password_confirmation.same" => "Password confirmation is incorrect"
        ]);

        $user = User::findOrFail($validated['id']);
        $user->first_name = $validated["first_name"];
        $user->last_name = $validated["last_name"];
        $user->email = $validated["email"];
        $user->password = Hash::make($validated["password"]);

        $user->save();

        return redirect()
            ->route('user.show', ['id' => $user->id])
            ->with('succes_account_modification', "The user " . $user->first_name . " " . $user->last_name . " has been modified");
    }

    /**
     * Handle the disconnection of an user
     *
     * @param Request $request
     */
    public function disconnect(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('loginOrRegister');
    }
}
