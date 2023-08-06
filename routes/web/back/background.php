<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\BackgroundController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('backgrounds', BackgroundController::class)->names([
        'index'      => 'back.background.index',
        'create'     => 'back.background.create',
        'show'       => 'back.background.show',
        'store'      => 'back.background.store',
        'edit'       => 'back.background.edit',
        'update'     => 'back.background.update',
        'destroy'    => 'back.background.delete',
    ]);
});
