<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//PAGE ROUTES
Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/invia-email', [PageController::class, 'send'])->name('send');

Route::get('/dettaglio/{uri}', [ServiceController::class, 'detail'])->name('detail');
Route::get('/service', [ServiceController::class, 'service'])->name('service');