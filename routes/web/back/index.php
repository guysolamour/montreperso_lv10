<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\IndexController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('indices', IndexController::class)->names([
        'index'      => 'back.index.index',
        'create'     => 'back.index.create',
        'show'       => 'back.index.show',
        'store'      => 'back.index.store',
        'edit'       => 'back.index.edit',
        'update'     => 'back.index.update',
        'destroy'    => 'back.index.delete',
    ]);
});
