<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\DashboardController;

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

//Route::get('/', function () {    return view('welcome');});



Route::get('/', [FileUploadController::class, 'index']);
Route::get('/upload', [FileUploadController::class, 'create']);
Route::post('/upload', [FileUploadController::class, 'store']);


Route::prefix('service')->group(function () {
    Route::get('/', [FileUploadController::class, 'index'])->name('service.index');
    Route::get('/upload', [FileUploadController::class, 'create'])->name('service.upload');
    Route::post('/upload', [FileUploadController::class, 'store'])->name('service.store');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dash.index');
   
});

