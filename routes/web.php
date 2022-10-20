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

Route::get('/', function () {
    return redirect()->route('maintenances.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Route::post('/maintenance/{complaint}/comments/store', [\App\Http\Controllers\ComplaintController::class, 'storeComment'])
//    ->name('maintenance.comments.store');

//Route::get('/residents/create',[\App\Http\Controllers\ResidentController::class,'create'])->name('residents.create');
//
//Route::post('/residents/store',[\App\Http\Controllers\ResidentController::class,'store'])->name('residents.store');
//
//Route::put('/residents/update',[\App\Http\Controllers\ResidentController::class,'update'])->name('residents.update');

Route::get('/residents/edit/{resident}',[\App\Http\Controllers\ResidentController::class,'edit'])->name('residents.edit');

Route::resource('/residents', \App\Http\Controllers\ResidentController::class);

Route::resource('/maintenances', \App\Http\Controllers\MaintenanceController::class);

Route::resource('/statuses', \App\Http\Controllers\StatusController::class);

Route::get('/maintenances/{maintenance}/{image}',[\App\Http\Controllers\ResidentController::class,'viewImage'])->name('maintenance.image.view');

Route::resource('/chart', \App\Http\Controllers\ChartController::class);

Route::get('search', [\App\Http\Controllers\ResidentController::class, 'search'])->name('search');

Route::get('/popular', [\App\Http\Controllers\ResidentController::class, 'popular'])->name('complaint.popular');

//Route::post('/{complaint}/updateStatus', [\App\Http\Controllers\ComplaintController::class, 'updateStatus'])->name('maintenance.updateStatus');


