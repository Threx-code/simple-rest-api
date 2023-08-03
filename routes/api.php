<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\TaskController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([])
    ->prefix('/v1/')
    ->group(function () {
        Route::get('/tasks', [TaskController::class, 'getAllTasks'])->name('all_tasks');

        Route::get('/tasks/{id}', [TaskController::class, 'getATask'])->name('single_task');

        Route::middleware(['tasks.file.processor'])->group(function () {
            Route::post('/tasks', [TaskController::class, 'store']);
            Route::put('/tasks/{id}', [TaskController::class, 'update']);
        });
        Route::delete('tasks/{id}', [TaskController::class, 'delete']);

    });

