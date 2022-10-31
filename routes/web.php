<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HistoryController;
use Illuminate\Auth\Events\Login;
use Illuminate\Bus\UpdatedBatchJobCounts;

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

Route::post('/login', [MainController::class, 'login']);
Route::post('/logout', [MainController::class, 'logout']);
Route::post('/register', [UserController::class, 'store']);

Route::get('/redirect', [MainController::class, 'redirectUrl']);
Route::get('/login', [MainController::class, 'tryUrl']);
Route::get('/logout', [MainController::class, 'tryUrl']);
Route::get('/user/add', [MainController::class, 'tryUrl']);


Route::group(['middleware' => ['guest']], function() 
{
      Route::get('/', [MainController::class, 'index'])->name('login');
      Route::get('/register', [MainController::class, 'signup']);
});

Route::group(['middleware' => ['auth', 'admin']], function() 
{
      Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [MainController::class, 'adminLogin']);
            Route::get('/list-anggota', [UserController::class, 'show']);
            Route::get('/list-buku', [BookController::class, 'show']);
            Route::get('/list-peminjaman', [HistoryController::class, 'show']);
            Route::get('/list-admin', [UserController::class, 'showAdmin']);
            Route::get('/settings', [UserController::class, 'adminSet']);
      });

      // User
      Route::get('/user/{id}', [UserController::class, 'index']);
      Route::post('/user/add', [UserController::class, 'store']);
      Route::post('/user/edit', [UserController::class, 'update']);
      Route::delete('/user/delete', [UserController::class, 'destroy']);

      // Book
      Route::get('/book/{id}', [BookController::class, 'index']);
      Route::post('/book/add', [BookController::class, 'store']);
      Route::post('/book/edit', [BookController::class, 'update']);
      Route::delete('/book/delete', [BookController::class, 'destroy']);

      // Circulation
      Route::get('/history/{id}', [HistoryController::class, 'index']);
      Route::post('/book/borrow', [HistoryController::class, 'borrow']);
      Route::post('/book/return', [HistoryController::class, 'return']);
});

Route::group(['middleware' => ['auth', 'user']], function() 
{
      // User
      Route::get('/dashboard', [MainController::class, 'userLogin']);
});


