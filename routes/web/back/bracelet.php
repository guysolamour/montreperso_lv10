<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\BraceletController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('bracelets', BraceletController::class)->names([
        'index'      => 'back.bracelet.index',
        'create'     => 'back.bracelet.create',
        'show'       => 'back.bracelet.show',
        'store'      => 'back.bracelet.store',
        'edit'       => 'back.bracelet.edit',
        'update'     => 'back.bracelet.update',
        'destroy'    => 'back.bracelet.delete',
    ]);
});
