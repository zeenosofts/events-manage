<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/save_event', [App\Http\Controllers\EventController::class, 'save_event'])->name('save_event');
Route::post('/update_event', [App\Http\Controllers\EventController::class, 'update_event'])->name('update_event');

Route::get('/home/events/edit/{id}', [App\Http\Controllers\EventController::class, 'edit_event'])->name('edit-event');
Route::get('/home/events/delete/{id}', [App\Http\Controllers\EventController::class, 'delete_event'])->name('delete-event');
Route::get('/home/events', [App\Http\Controllers\EventController::class, 'home_events'])->name('home_events');
Route::get('/home/events/all', [App\Http\Controllers\EventController::class, 'home_events_all'])->name('home_events_all');
