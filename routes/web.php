<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;

Route::get('/', [ProjectController::class, 'index'])
    ->name('projects.index');

Route::get('/', [TypeController::class, 'index'])
    ->name('types.index');

Route::get('/projects/create', [ProjectController::class, 'create'])
    ->name('projects.create');

Route::post('/projects', [ProjectController::class, 'store'])
    ->name('projects.store');

Route::get('/projects/{id}', [ProjectController::class, 'show'])
    ->name('projects.show');

Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])
    ->name('projects.destroy');


Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])
    ->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'])
    ->name('projects.update');