<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\WatchController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('watches', WatchController::class)->names([
        'index'      => 'back.watch.index',
        'create'     => 'back.watch.create',
        'show'       => 'back.watch.show',
        'store'      => 'back.watch.store',
        'edit'       => 'back.watch.edit',
        'update'     => 'back.watch.update',
        'destroy'    => 'back.watch.delete',
    ]);
});
