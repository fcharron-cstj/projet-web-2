<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Home

Route::get('/', [SiteController::class, 'home'])->name("home")->middleware('guest');

//User
Route::get('/user', [UserController::class, 'loginOrRegister'])->name("loginOrRegister")->middleware('guest');

Route::post('/user', [UserController::class, 'store'])->name("user.store")->middleware('guest');

Route::post('/user', [UserController::class, 'authentication'])->name("user.authenticate")->middleware('guest');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name("user.edit")->middleware('auth');

Route::post('/user/update', [UserController::class, "update"])->name("user.update")->middleware('auth');

Route::post('user/destroy', [UserController::class, "destroy"])->name("user.destroy")->middleware('auth');

Route::get("/logout", [UserController::class, "disconnect"])->name('logout')->middleware("auth");

//Activity
Route::get('/activity', [ActivityController::class], 'index')->name('activity.index')->middleware("guest");

Route::get('/activity/show/{id}', [ActivityController::class], 'show')->name('activity.show')->middleware("guest");

Route::get('/activity/create', [ActivityController::class], 'create')->name('activity.create')->middleware("auth");

Route::get('/activity/store', [ActivityController::class], 'store')->name('activity.store')->middleware("auth");

Route::get('/activity/edit/{id}', [ActivityController::class], 'edit')->name('activity.edit')->middleware("auth");

Route::post('/activity/update', [ActivityController::class], 'update')->name('activity.update')->middleware("auth");

Route::get('/activity/destroy', [ActivityController::class], 'create')->name('activity.create')->middleware("auth");

//Admin
Route::get('/admin', [UserController::class, 'admin'])->name("admin.home");

Route::get('/admin/create', [UserController::class, 'create'])->name("admin.create");


