<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Home

Route::get('/', [SiteController::class, 'home'])->name("home")->middleware('guest');

//User

Route::get('/user', [UserController::class, 'loginOrRegister'])->name('loginOrRegister')->middleware('guest');

Route::post('/user/store', [UserController::class, 'store'])->name("user.store")->middleware('guest');

Route::post('/user/connect', [UserController::class, 'authentication'])->name("user.authenticate")->middleware('guest');

Route::post('/user/show', [UserController::class, 'show'])->name("user.show")->middleware('auth');

Route::post('/user/edit', [UserController::class, 'edit'])->name("user.edit")->middleware('auth');

Route::post('/user/update', [UserController::class, "update"])->name("user.update")->middleware('auth');

Route::post('user/destroy', [UserController::class, "destroy"])->name("user.destroy")->middleware('auth');

Route::get("/logout", [UserController::class, "disconnect"])->name('logout')->middleware("auth");

//Activity

Route::get('/schedule/create', [ActivityController::class], 'create')->name("schedule.create")->middleware("auth");

Route::get('/schedule/store', [ActivityController::class], 'store')->name("schedule.store")->middleware("auth");

Route::post('/schedule/edit', [ActivityController::class], 'edit')->name("schedule.edit")->middleware("auth");

Route::post('/schedule/update', [ActivityController::class], 'update')->name("schedule.update")->middleware("auth");

Route::post('/schedule/destroy', [ActivityController::class], 'destroy')->name("schedule.destroy")->middleware("auth");


//Article

Route::get('/article', [ArticleController::class], 'index')->name("article.index")->middleware("guest");

Route::get('/article/show/{id}', [ArticleController::class], 'show')->name("article.show")->middleware("guest");

Route::get('/article/create', [ArticleController::class], 'create')->name("article.create")->middleware("auth");

Route::post('/article/store', [ArticleController::class], 'store')->name("article.store")->middleware("auth");

Route::get('/article/edit/{titre}', [ArticleController::class], 'edit')->name("article.edit")->middleware("auth");

Route::post('/article/update', [ArticleController::class], 'update')->name("article.update")->middleware("auth");

Route::post('/article/destroy', [ArticleController::class], 'destroy')->name("article.destroy")->middleware("auth");

//Reservation

Route::get('/reservation/store', [ReservationController::class], 'store')->name("reservation.store")->middleware("auth");

Route::get('/reservation/destroy', [ReservationController::class], 'destroy')->name("reservation.destroy")->middleware("auth");

//Admin

Route::get('/admin', [AdministratorController::class], 'adminPanel')->name("adminPanel")->middleware("auth");

Route::get('/admin/create', [AdministratorController::class], 'create')->name("admin.create")->middleware("auth");

Route::post('/admin/store', [AdministratorController::class], 'store')->name("admin.store")->middleware("auth");

Route::get('/admin/edit/{id}', [AdministratorController::class], 'edit')->name("admin.edit")->middleware("auth");

/* Route::post('/admin/edit', [AdministratorController::class], 'edit')->name("admin.edit")->middleware("auth"); */

Route::post('/admin/update', [AdministratorController::class], 'update')->name("admin.update")->middleware("auth");
