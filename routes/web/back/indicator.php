<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\IndicatorController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('indicators', IndicatorController::class)->names([
        'index'      => 'back.indicator.index',
        'create'     => 'back.indicator.create',
        'show'       => 'back.indicator.show',
        'store'      => 'back.indicator.store',
        'edit'       => 'back.indicator.edit',
        'update'     => 'back.indicator.update',
        'destroy'    => 'back.indicator.delete',
    ]);
});
