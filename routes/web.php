<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Home

Route::get('/', [SiteController::class, 'home'])->name("homepage");

//User

Route::get('/account', [UserController::class, 'account'])->name("account");

Route::get('/account/create', [UserController::class, 'create'])->name("account.create");

Route::post('/account/store', [UserController::class, 'store'])->name("account.store");

Route::get('/account/connect', [UserController::class, 'connect'])->name("account.connect");

//Admin

Route::get('/admin', [UserController::class, 'admin'])->name("admin.panel");

Route::get('/admin/create', [UserController::class, 'create'])->name("admin.create");
