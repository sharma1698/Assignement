<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\SessionController;


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
Route::get('/slot', [SlotController::class , 'index']);
Route::post('/add_slot', [SlotController::class, 'store'])->name("add.slot");
Route::post('/update_slot', [SlotController::class, 'update'])->name("update.slot");
Route::get('/session', [SessionController::class , 'index'])->name('session.index');
Route::post('store-form', [SessionController::class, 'store']);
Route::delete('destroy-form', [SessionController::class, 'destroy'])->name('session.destroy');
Route::get('edit-form', [SessionController::class, 'edit'])->name('session.edit');
Route::post('update-form', [SessionController::class, 'update'])->name('session.update');
Route::get('final_submit', [SessionController::class, 'final_submit'])->name('session.final_submit');



