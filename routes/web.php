<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Home

Route::get('/', [SiteController::class, 'home'])->name("site.home")->middleware('auth');

//User
Route::get('/user', [UserController::class, 'loginOrRegister'])->name("user.loginOrRegister")->middleware('guest');

Route::post('/user-store', [UserController::class, 'store'])->name("user.store")->middleware('guest');

Route::post('/user-connect', [UserController::class, 'authentication'])->name("user.authenticate")->middleware('guest');

//Admin

Route::get('/admin', [UserController::class, 'admin'])->name("admin.home");

Route::get('/admin/create', [UserController::class, 'create'])->name("admin.create");


