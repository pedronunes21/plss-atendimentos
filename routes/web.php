<?php

use App\Http\Controllers\CallCategoryController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\SituationController;
use Illuminate\Support\Facades\Route;

// Category
Route::get('/category', [CallCategoryController::class, 'index'])->name('calls.category.index.view');

Route::get('/category/create', function() {
    return view('calls.category.create');
});
Route::get('/category/update/{category}', [CallCategoryController::class, 'updateView'])->name('calls.category.update.view');

Route::post('/category/create', [CallCategoryController::class, 'create'])->name('calls.category.create');

Route::put('/category/update/{category}', [CallCategoryController::class, 'update'])->name('calls.category.update');

Route::delete('/category/delete/{category}', [CallCategoryController::class, 'delete'])->name('calls.category.delete');

// Situation
Route::get('/situation', [SituationController::class, 'index'])->name('calls.situation.index.view');

Route::get('/situation/create', function() {
    return view('calls.situation.create');
});
Route::get('/situation/update/{situation}', [SituationController::class, 'updateView'])->name('calls.situation.update.view');

Route::post('/situation/create', [SituationController::class, 'create'])->name('calls.situation.create');

Route::put('/situation/update/{situation}', [SituationController::class, 'update'])->name('calls.situation.update');

Route::delete('/situation/delete/{situation}', [SituationController::class, 'delete'])->name('calls.situation.delete');

// Calls
Route::get('/', [CallController::class, 'index'])->name('calls.index.view');

Route::get('/call/create', [CallController::class, 'createView'])->name('calls.create.view');

Route::get('/call/update/{call}', [CallController::class, 'updateView'])->name('calls.update.view');

Route::post('/call/create', [CallController::class, 'create'])->name('calls.create');

Route::put('/call/update/{call}', [CallController::class, 'update'])->name('calls.update');

Route::delete('/call/delete/{call}', [CallController::class, 'delete'])->name('calls.delete');