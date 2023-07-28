<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Redirect;

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



Route::group(['middleware' => 'auth.basic'], function () {

    Route::redirect('/', '/items');

    Route::group(['middleware' => 'auth.basic'], function () {
        Route::group(['prefix' => 'items'], function () {
            Route::get('/', [ItemController::class, 'index'])->name('item.index');
            Route::post('/', [ItemController::class, 'store'])->name('item.store');
            Route::get('/{item}', [ItemController::class, 'show'])->name('item.show');
            Route::get('/{item}/transaction', [ItemController::class, 'transaction'])->name('item.transaction');
        });

        Route::group(['prefix' => 'transactions'], function () {
            Route::post('/', [TransactionController::class, 'create'])->name('transaction.create');
        });
    });
});
