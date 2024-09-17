<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name("homepage");

Route::get('/', [SiteController::class, 'index'])->name("");
