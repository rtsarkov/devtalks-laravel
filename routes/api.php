<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('tasks')->group(function () {
    Route::get('/get', [\App\Http\Controllers\TaskController::class, 'get']);
    Route::get('/all', [\App\Http\Controllers\TaskController::class, 'all']);
    Route::post('/create', [\App\Http\Controllers\TaskController::class, 'create']);
    Route::post('/update', [\App\Http\Controllers\TaskController::class, 'update']);
});

Route::name('comments.')->prefix('comments')->group(function () {
    Route::get('/{task_id}', [CommentController::class, 'getForTask'])->name('task');
    Route::post('/', [CommentController::class, 'create'])->name('create');
    Route::delete('/{id}', [CommentController::class, 'destroy'])->name('delete');
    Route::put('/{comment}', [CommentController::class, 'update'])->name('update');
});

Route::get('tasks', [CommentController::class, 'tasks']);


Route::any('test', function () {

    $dto = new \App\DTO\CreateTaskDTO(title: 'Title', description: '123123123');

    dd($dto);
});
