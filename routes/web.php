<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\FinishingController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\SockController;
use App\Http\Controllers\ColorController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [Controller::class,'homeView'])->name('homeView');

//Order
Route::resources(['/order' => OrderController::class]);
Route::prefix('order')->group(function() {
    Route::get('/detail/1', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('/history/1', [OrderController::class, 'history'])->name('order.history');
    Route::post('/finish/{id}', [OrderController::class, 'finishOrder'])->name('order.finish');
});

//Production
Route::resources(['/production' => ProductionController::class]);
Route::prefix('production')->group(function() {
    Route::get('/get/detail', [ProductionController::class, 'getDetail'])->name('production.get.detail');
    Route::post('/detail/1', [ProductionController::class, 'detail'])->name('production.detail');
});

//Finishing
Route::resources(['/finishing' => FinishingController::class]);
Route::prefix('finishing')->group(function() {
    Route::get('/get/detail', [FinishingController::class, 'getDetail'])->name('finishing.get.detail');
    Route::post('/detail/1', [FinishingController::class, 'detail'])->name('finishing.detail');
});

//Employe
Route::resources(['/employe' => EmployeController::class]);

//Sock
Route::resources(['/sock' => SockController::class]);

//Employe
Route::resources(['/color' => ColorController::class]);

Route::get('/coba', [OrderController::class, 'coba' ]);