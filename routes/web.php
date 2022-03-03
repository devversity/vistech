<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VistechController;

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

Route::get('/', [VistechController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/admin/{i}', [VistechController::class, 'admin'])
    ->middleware(['auth'])
    ->name('admin_administrators');

Route::get('/user/{i}', [VistechController::class, 'user'])
    ->middleware(['auth'])
    ->name('user_forms');

require __DIR__.'/auth.php';
