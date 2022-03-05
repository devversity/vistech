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
    ->name('admin');

Route::get('/user/{i}', [VistechController::class, 'user'])
    ->middleware(['auth'])
    ->name('user');

Route::get('/delete/{i}/{j}', [VistechController::class, 'delete'])
    ->middleware(['auth'])
    ->name('delete');

Route::get('/form/submit/{j}', [VistechController::class, 'form'])
    ->middleware(['auth'])
    ->name('form_submit');

Route::get('/test_email', [VistechController::class, 'test_email'])
    ->middleware(['auth'])
    ->name('test_email');

Route::get('/email_submission/{i}', [VistechController::class, 'email_submission'])
    ->middleware(['auth'])
    ->name('email_submission');

Route::get('/form/view/{i}', [VistechController::class, 'view'])
    ->middleware(['auth'])
    ->name('view_form');

Route::post('/edit/{i}/{j}', [VistechController::class, 'edit'])
    ->middleware(['auth'])
    ->name('edit');

Route::post('/insert/{i}', [VistechController::class, 'insert'])
    ->middleware(['auth'])
    ->name('insert');

Route::post('/insert/{i}/{j}', [VistechController::class, 'insert'])
    ->middleware(['auth'])
    ->name('insert');

Route::post('/form/redirect', [VistechController::class, 'redirect'])
    ->middleware(['auth'])
    ->name('redirect');

require __DIR__.'/auth.php';
