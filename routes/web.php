<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/assignment', [AssignmentController::class, 'create']);
Route::post('/assignment', [AssignmentController::class, 'store'])->name('assignment');
Route::get('tasks', [TaskController::class, 'index'])->name('tasks-form');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks');
