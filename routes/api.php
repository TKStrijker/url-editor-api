<?php

use App\Http\Controllers\UrlDestroyController;
use App\Http\Controllers\UrlIndexController;
use App\Http\Controllers\UrlShowController;
use App\Http\Controllers\UrlStoreController;
use App\Http\Controllers\UrlUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('url')->group(function () {
    Route::get('/', [UrlIndexController::class, 'index'])->name('url.index');
    Route::get('/{id}', [UrlShowController::class, 'show'])->name('url.show');
    Route::post('/', [UrlStoreController::class, 'store'])->name('url.store');
    Route::put('/{id}', [UrlUpdateController::class, 'update'])->name('url.update');
    Route::delete('/{id}', [UrlDestroyController::class, 'delete'])->name('url.destroy');
});
