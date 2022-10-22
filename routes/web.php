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


// ALWAYS USE GET ON TOP OF RESOURCE !!!!!
Route::get('/residents/edit/{resident}',[\App\Http\Controllers\ResidentController::class,'edit'])->name('residents.edit');

Route::resource('/residents', \App\Http\Controllers\ResidentController::class);

// ALWAYS USE GET ON TOP OF RESOURCE !!!!!
Route::get('/maintenances/table', [\App\Http\Controllers\MaintenanceController::class, 'table'])->name('maintenances.table');

Route::get('/maintenances/table/accept/{maintenance}', [\App\Http\Controllers\MaintenanceController::class, 'accept'])->name('maintenances.accept');

Route::resource('/maintenances', \App\Http\Controllers\MaintenanceController::class);

Route::get('/checklists/{checklist}', [\App\Http\Controllers\ChecklistController::class, 'show'])->name('checklists.show');

Route::get('/checklists/{checklist}/parts', [\App\Http\Controllers\ChecklistController::class, 'parts'])->name('checklists.parts');

Route::resource('/checklists', \App\Http\Controllers\ChecklistController::class);

Route::resource('/parts', \App\Http\Controllers\PartController::class);

Route::resource('/statuses', \App\Http\Controllers\StatusController::class);

Route::resource('/chart', \App\Http\Controllers\ChartController::class);

//Route::group(function(){
//
//})->middleware('Auth');


