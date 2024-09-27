<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\admin;
use App\Models\Artist;
use Illuminate\Support\Facades\Route;

//Home

Route::get('/', [SiteController::class, 'home'])->name("home");

//User

Route::get('/user', [UserController::class, 'loginOrRegister'])->name('loginOrRegister')->middleware('guest');

Route::post('/user/store', [UserController::class, 'store'])->name("user.store")->middleware('guest');

Route::post('/user/connect', [UserController::class, 'authentication'])->name("user.authenticate")->middleware('guest');

Route::get('/user/show/{id}', [UserController::class, 'show'])->name("user.show")->middleware('auth');

Route::get('/user/edit', [UserController::class, 'edit'])->name("user.edit")->middleware('auth');

Route::post('/user/update', [UserController::class, "update"])->name("user.update")->middleware('auth');

Route::post('user/destroy', [UserController::class, "destroy"])->name("user.destroy")->middleware(admin::class);

Route::get("/logout", [UserController::class, "disconnect"])->name('logout')->middleware("auth");

//Schedule

Route::get('/schedules/create', [ScheduleController::class, 'create'])->name("schedules.create")->middleware(admin::class);

Route::get('/schedules/edit', [ScheduleController::class, 'edit'])->name("schedules.edit")->middleware(admin::class);

Route::post('/schedules/store', [ScheduleController::class, 'store'])->name("schedules.store")->middleware(admin::class);

Route::post('/schedules/update', [ScheduleController::class, 'update'])->name("schedules.update")->middleware(admin::class);

Route::post('/schedules/destroy', [ScheduleController::class, 'destroy'])->name("schedules.destroy")->middleware(admin::class);

//Article

Route::get('/articles', [ArticleController::class, 'index'])->name("article.index");

Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name("article.show");

Route::get('/articles/create', [ArticleController::class, 'create'])->name("article.create")->middleware(admin::class);

Route::post('/articles/store', [ArticleController::class, 'store'])->name("article.store")->middleware(admin::class);

Route::get('/articles/edit/{id}', [ArticleController::class, 'edit'])->name("article.edit")->middleware(admin::class);

Route::post('/articles/update', [ArticleController::class, 'update'])->name("article.update")->middleware(admin::class);

Route::post('/articles/destroy', [ArticleController::class, 'destroy'])->name("article.destroy")->middleware(admin::class);


//Reservation

Route::post('/reservation/store', [ReservationController::class, 'store'])->name("reservation.store")->middleware("auth");

Route::get('/reservation/destroy', [ReservationController::class, 'destroy'])->name("reservation.destroy")->middleware("auth");

//Admin

Route::get('/admin', [AdministratorController::class, 'adminPanel'])->name("admin.panel")->middleware(admin::class);

Route::get('/admin/create', [AdministratorController::class, 'create'])->name("admin.create")->middleware(admin::class);

Route::post('/admin/store', [AdministratorController::class, 'store'])->name("admin.store")->middleware(admin::class);

Route::get('/admin/edit/{id}', [AdministratorController::class, 'edit'])->name("admin.edit")->middleware(admin::class);

Route::post('/admin/update', [AdministratorController::class, 'update'])->name("admin.update")->middleware(admin::class);

Route::post('/admin/destroy', [AdministratorController::class, 'destroy'])->name("admin.destroy")->middleware(admin::class);


//Artist

Route::post('/artist/store', [ArtistController::class, 'store'])->name("artist.store")->middleware(admin::class);
