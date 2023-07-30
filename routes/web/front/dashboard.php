<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Dashboard\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');


