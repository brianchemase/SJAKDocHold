<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersManagementController;

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

#https://cambotutorial.com/article/laravel-9-login-multiple-roles-using-custom-middleware

Route::get('/pagetest', function () {    return view('logs.login');});
//Route::get('/login', [DashboardController::class, 'dashboard'])->name('dash.index');

Route::post('/approverequest', [FileUploadController::class, 'approve'])->name('approve');
Route::post('/returnrequest', [FileUploadController::class, 'return'])->name('return');


Route::get('/', [FileUploadController::class, 'index']);
Route::get('/upload', [FileUploadController::class, 'create']);
Route::post('/upload', [FileUploadController::class, 'store']);


Route::prefix('service')->group(function () {
    Route::get('/', [FileUploadController::class, 'index'])->name('service.index');
    Route::get('/upload', [FileUploadController::class, 'create'])->name('service.upload');
    Route::post('/upload', [FileUploadController::class, 'store'])->name('service.store');
});

//Route::middleware(['auth', 'user-role:admin,approver,user'])->group(function () {
    Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dash.index');
    Route::get('/blank', [DashboardController::class, 'blank'])->name('blank');
    Route::get('/table', [DashboardController::class, 'table'])->name('table');
    Route::get('/form', [DashboardController::class, 'form'])->name('form');



    Route::get('/UploadDocForm', [DashboardController::class, 'uploaddoc'])->name('uploaddoc');
    Route::post('/upload-document', [DocumentController::class, 'store'])->name('document.upload');

    Route::get('/document/{id}', [DocumentController::class, 'show'])->name('document.show');

    Route::get('/UploadedTableIndex', [DocumentController::class, 'viewsuploads'])->name('document.uploaded');

    Route::get('/MyUploadedTableIndex', [DocumentController::class, 'viewmyuploads'])->name('document.myuploaded');


    //users management 
    Route::get('/UsersManagement', [UsersManagementController::class, 'index'])->name('ManageUsers');
    Route::post('/Registerusers', [UsersManagementController::class, 'store'])->name('users.store');

    Route::delete('/users/{id}', [UsersManagementController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}/reset-password', [UsersManagementController::class, 'resetPassword'])->name('users.reset-password');
    Route::put('/users/update', [UsersManagementController::class, 'update'])->name('users.update');



   
});
});


Auth::routes();
// Route User
Route::middleware(['auth','user-role:admin'])->group(function()
{ 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
} );


