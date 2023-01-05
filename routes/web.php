<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AppController,AuthController};


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
Route::get('/', [AppController::class, 'index'])->name('index');

Route::get('/loginpage', [AuthController::class, 'loginpage'])->name('loginpage');
Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');

Route::get('/registerpage', [AuthController::class, 'registerpage'])->name('registerpage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/forgotpassword', [AuthController::class, 'forgetpage'])->name('forgetpage');


Route::middleware(['haslogin'])->group(function () {

    Route::get('/myapp', [AppController::class, 'myapp'])->name('myapp');
    Route::get('/applications', [AppController::class, 'listapp'])->name('listapp');

    Route::get('/createapp', [AppController::class, 'createapp'])->name('createapp');
    Route::post('/store', [AppController::class, 'store'])->name('store');

    Route::get('/updateapp/{id}', [AppController::class, 'updateapp'])->name('updateapp');
    Route::post('/update/{id}', [AppController::class, 'update'])->name('update_app');

    Route::get('/delete/{id}', [AppController::class, 'delete'])->name('delete');

    Route::get('/managekeys/{id}', [AppController::class, 'managekeys'])->name('managekeys');
    Route::post('/generateappkey', [AppController::class, 'generateappkey'])->name('generateappkey');
    
    Route::get('/sandboxapikeys', [AppController::class, 'sandboxapi'])->name('sandboxapikeys');
    Route::get('/productionapikeys', [AppController::class, 'productionapi'])->name('productionapikeys');
    
    Route::get('/subscription/{id}', [AppController::class, 'subscription'])->name('subscription');
    Route::get('/addsubscription/{id}', [AppController::class, 'addsubs'])->name('addsubscription');
    Route::get('/deletesubs/{id}', [AppController::class, 'deletesubs'])->name('deletesubs');

    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');    
});





