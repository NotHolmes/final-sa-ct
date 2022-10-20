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
    return redirect()->route('maintenance.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Route::post('/maintenance/{complaint}/comments/store', [\App\Http\Controllers\ComplaintController::class, 'storeComment'])
//    ->name('maintenance.comments.store');

Route::get('/residents/create',[\App\Http\Controllers\ResidentController::class,'create'])->name('residents.create');

Route::get('/residents/edit/{resident}',[\App\Http\Controllers\ResidentController::class,'edit'])->name('residents.edit');

Route::resource('/maintenance', \App\Http\Controllers\MaintenanceController::class);

Route::resource('/statuses', \App\Http\Controllers\StatusController::class);

Route::get('/maintenance/{maintenance}/{image}',[\App\Http\Controllers\ResidentController::class,'viewImage'])->name('maintenance.image.view');

Route::get('/maintenance/{maintenance}',[\App\Http\Controllers\MaintenanceController::class,'show'])->name('maintenance.show');

Route::resource('/chart', \App\Http\Controllers\ChartController::class);

Route::get('search', [\App\Http\Controllers\ResidentController::class, 'search'])->name('search');

Route::get('/popular', [\App\Http\Controllers\ResidentController::class, 'popular'])->name('complaint.popular');

//Route::post('/{complaint}/updateStatus', [\App\Http\Controllers\ComplaintController::class, 'updateStatus'])->name('maintenance.updateStatus');


