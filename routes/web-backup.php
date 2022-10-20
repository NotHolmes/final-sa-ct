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
    return redirect()->to('/maintenance');
});

                        // Closure
Route::get('/about', function () {
    return "About Me";
});

Route::get('/pages', [\App\Http\Controllers\PageController::class, 'index']);

Route::get('/pages/{id}', [\App\Http\Controllers\PageController::class, 'show']);

Route::complaint('/maintenance/{complaint}/comments/store', [\App\Http\Controllers\ResidentController::class, 'storeComment'])
    ->name('maintenance.comments.store');

Route::resource('/maintenance', \App\Http\Controllers\ResidentController::class);

Route::resource('/tags', \App\Http\Controllers\TagController::class);

Route::resource('/organizations', \App\Http\Controllers\OrganizationController::class);

Route::resource('/statuses', \App\Http\Controllers\StatusController::class);
