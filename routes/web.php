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
    return redirect()->route('complaints.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Route::post('/complaints/{complaint}/comments/store', [\App\Http\Controllers\ComplaintController::class, 'storeComment'])
//    ->name('complaints.comments.store');

Route::resource('/complaints', \App\Http\Controllers\ComplaintController::class);

Route::resource('/statuses', \App\Http\Controllers\StatusController::class);

Route::get('/complaints/{complaint}/{image}',[\App\Http\Controllers\ComplaintController::class,'viewImage'])->name('complaints.image.view');

Route::resource('/chart', \App\Http\Controllers\ChartController::class);

Route::get('search', [\App\Http\Controllers\ComplaintController::class, 'search'])->name('search');

Route::get('/popular', [\App\Http\Controllers\ComplaintController::class, 'popular'])->name('complaint.popular');

Route::post('/{complaint}/updateStatus', [\App\Http\Controllers\ComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');


