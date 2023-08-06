<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\TypeController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('types', TypeController::class)->names([
        'index'      => 'back.type.index',
        'create'     => 'back.type.create',
        'show'       => 'back.type.show',
        'store'      => 'back.type.store',
        'edit'       => 'back.type.edit',
        'update'     => 'back.type.update',
        'destroy'    => 'back.type.delete',
    ]);
});
