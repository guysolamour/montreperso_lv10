<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\FontController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('fonts', FontController::class)->names([
        'index'      => 'back.font.index',
        'create'     => 'back.font.create',
        'show'       => 'back.font.show',
        'store'      => 'back.font.store',
        'edit'       => 'back.font.edit',
        'update'     => 'back.font.update',
        'destroy'    => 'back.font.delete',
    ]);
});
