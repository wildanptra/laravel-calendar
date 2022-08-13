<?php

use App\Http\Controllers\FullCalendarEventMasterController;
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
});

// fullcalendar
Route::get('/fullcalendareventmaster', [FullCalendarEventMasterController::class, 'index'])->name('fullcalendareventmaster.index');
Route::post('/fullcalendareventmaster/create', [FullCalendarEventMasterController::class, 'create'])->name('fullcalendareventmaster.create');
Route::post('/fullcalendareventmaster/update', [FullCalendarEventMasterController::class, 'update'])->name('fullcalendareventmaster.update');
Route::post('/fullcalendareventmaster/delete', [FullCalendarEventMasterController::class, 'destroy'])->name('fullcalendareventmaster.destroy');

