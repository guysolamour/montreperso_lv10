<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\WatchController;
use App\Http\Controllers\Front\Dashboard\DashboardController;

// FRONT
Route::get('watch/create', [WatchController::class, 'create'])->name('front.watch.create');
Route::post('watch', [WatchController::class, 'store'])->name('front.watch.store');

// AJAX
Route::post('user/login', [AuthController::class, 'login'])->name('front.user.login');
Route::post('user/register', [AuthController::class, 'register'])->name('front.user.register');

// DASHBOARD
Route::get('dashboard/watches', [DashboardController::class, 'watches'])
        ->name('front.user.dashboard.watch');
Route::get('dashboard/watches/create', [DashboardController::class, 'create'])
        ->name('front.user.dashboard.watch.create');
Route::get('dashboard/watches/{watch}/edit', [DashboardController::class, 'edit'])
        ->name('front.user.dashboard.watch.update');
Route::put('dashboard/watches/{watch}/edit', [DashboardController::class, 'update'])
        ->name('front.user.dashboard.watch.update');
Route::delete('dashboard/watches/{watch}', [DashboardController::class, 'destroy'])
        ->name('front.user.dashboard.watch.delete');
