<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DesignController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('designs', DesignController::class)->names([
        'index'      => 'back.design.index',
        'create'     => 'back.design.create',
        'show'       => 'back.design.show',
        'store'      => 'back.design.store',
        'edit'       => 'back.design.edit',
        'update'     => 'back.design.update',
        'destroy'    => 'back.design.delete',
    ]);
});
