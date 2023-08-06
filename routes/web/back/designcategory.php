<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DesignCategoryController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('designcategories', DesignCategoryController::class)->names([
        'index'      => 'back.designcategory.index',
        'create'     => 'back.designcategory.create',
        'show'       => 'back.designcategory.show',
        'store'      => 'back.designcategory.store',
        'edit'       => 'back.designcategory.edit',
        'update'     => 'back.designcategory.update',
        'destroy'    => 'back.designcategory.delete',
    ]);
});
