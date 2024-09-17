<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Home

Route::get('/', [SiteController::class, 'home'])->name("homepage")->middleware('guest');

//User
Route::get('/user', [UserController::class, 'loginOrRegister'])->name("user.loginOrRegister")->middleware('guest');

Route::post('/user', [UserController::class, 'store'])->name("user.store")->middleware('guest');

Route::post('/user', [UserController::class, 'authentication'])->name("user.authentication")->middleware('guest');

// To check
Route::get('/account/create', [UserController::class, 'create'])->name("account.create")->middleware('guest');

Route::post('/account/store', [UserController::class, 'store'])->name("account.store")->middleware('guest');

Route::get('/account/connect', [UserController::class, 'connect'])->name("account.connect");

//Admin

Route::get('/admin', [UserController::class, 'admin'])->name("admin");

Route::get('/admin/create', [UserController::class, 'create'])->name("admin.create");


