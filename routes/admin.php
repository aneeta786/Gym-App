<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\ExcerciseController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/create', [MembersController::class, 'index'])->name('create');
        Route::post('/store', [MembersController::class, 'store'])->name('store');
        Route::get('/list', [MembersController::class, 'show'])->name('list');
        Route::get('/edit/{id}', [MembersController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [MembersController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [MembersController::class, 'destroy'])->name('delete');
    });
    Route::prefix('excercise')->name('excercise.')->group(function () {
        Route::get('/create', [ExcerciseController::class, 'index'])->name('create');
        Route::post('/store', [ExcerciseController::class, 'store'])->name('store');
        Route::get('/list', [ExcerciseController::class, 'show'])->name('list');
        Route::get('/edit/{id}', [ExcerciseController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ExcerciseController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ExcerciseController::class, 'destroy'])->name('delete');
    });
});





