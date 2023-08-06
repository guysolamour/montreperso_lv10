<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\FormController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('forms', FormController::class)->names([
        'index'      => 'back.form.index',
        'create'     => 'back.form.create',
        'show'       => 'back.form.show',
        'store'      => 'back.form.store',
        'edit'       => 'back.form.edit',
        'update'     => 'back.form.update',
        'destroy'    => 'back.form.delete',
    ]);
});
