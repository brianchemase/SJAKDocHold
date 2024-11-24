<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;

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

Route::get('/pagetest', function () {    return view('logs.login');});
//Route::get('/login', [DashboardController::class, 'dashboard'])->name('dash.index');



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
    Route::get('/blank', [DashboardController::class, 'blank'])->name('blank');
    Route::get('/table', [DashboardController::class, 'table'])->name('table');
    Route::get('/form', [DashboardController::class, 'form'])->name('form');



    Route::get('/UploadDocForm', [DashboardController::class, 'uploaddoc'])->name('uploaddoc');
    Route::post('/upload-document', [DocumentController::class, 'store'])->name('document.upload');

    Route::get('/document/{id}', [DocumentController::class, 'show'])->name('document.show');
   
});

